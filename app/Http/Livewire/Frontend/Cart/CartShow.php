<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0, $cart_id;
    public function decrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData) {
            if($cartData->quantity == 1) {
                $this->deleteCartItem($cartId);
                $this->dispatchBrowserEvent('delete');
            }else {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Oops something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity(int $cartId){
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData) {
            if($cartData->product->quantity <= $cartData->quantity) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only '.$cartData->product->quantity.' '.$cartData->product->name.' left',
                    'type' => 'warning',
                    'status' => 200
                ]);
                return false;
            }else {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
            ]);
            }

        }else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Oops something went wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function deleteCartItem($cart_id) {
        $this->cart_id = $cart_id;
    }

    public function removeCartItem() {
        $cartRemove = Cart::where('user_id', auth()->user()->id)->where('id', $this->cart_id)->first();
        if($cartRemove){
            $cartRemove->delete();
            $this->dispatchBrowserEvent('close-modal');
            $this->emit('cartUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Remove',
                'type' => 'success',
                'status' => 200
            ]);
            return true;
        }
        $this->dispatchBrowserEvent('message', [
            'text' => 'Oops something went wrong',
            'type' => 'error',
            'status' => 500
        ]);
        return false;
    }
    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
            'totalPrice' => $this->totalPrice
        ]);
    }
}
