<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Mail\PlaceOrderMailable;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;

class CheckoutDetail extends Component
{
    public $carts, $total = 0, $totalProductAmount = 0;
    public $fullname, $email, $phone, $pincode, $address, $payment_method = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value){
        $this->payment_id = $value;
        $this->payment_method = 'Paid by Paypal';
        $order = $this->placeOrder();
        if($order) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order successfully');
            $this->dispatchBrowserEvent('message', [
                'text'=>'Order Placed Successfully',
                'type'=>'success',
                'status' => 200
            ]);
            try{
                $orderr = Order::findOrFail($order->id);
                Mail::to("$orderr->email")->send(new PlaceOrderMailable($orderr));
            }catch(Exception $e){

            }
            return redirect()->to('thank-you');
        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Oops something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
    public function validationForAll(){
        $this->validate();
    }

    public function rules(){
        return [
            'fullname'=>'required|string|max:100',
            'email'=>'required|email|max:100',
            'phone'=>'required|string|max:11|min:10',
            'pincode'=>'required|string|max:6|min:6',
            'address'=>'required|string|max:255'
        ];
    }
    public function totalProductAmount(){
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach($this->carts as $cartItem) {
            $this->totalProductAmount += $cartItem->product->original_price * $cartItem->quantity;
        }
        return $this->totalProductAmount;
    }
    public function placeOrder(){
        $this->validate();
        foreach($this->carts as $cartItem) {
            $this->total += $cartItem->product->original_price * $cartItem->quantity;
        }
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'LC-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'In progress',
            'payment_mode' => $this->payment_method,
            'payment_id' => $this->payment_id,
            'total' => $this->total,
        ]);
        foreach($this->carts as $cartItem) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id'=> $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->original_price,
            ]);
            $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
        }
        return $order;
    }
    public function codOrder(){
        $this->payment_method = 'COD';
        $codOrder = $this->placeOrder();
        if($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order successfully');
            try{
                $order = Order::findOrFail($codOrder->id);
                Mail::to("$order->email")->send(new PlaceOrderMailable($order));
            }catch(Exception $e){
                //
            }
            return redirect()->to('thank-you');
        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Oops something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone ?? null;
        $this->pincode = auth()->user()->userDetail->zip_code ?? null ;
        $this->address = auth()->user()->userDetail->address ?? null;
        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-detail' , [
            'totalProductAmount' => $this->totalProductAmount,
        ]);
    }
}
