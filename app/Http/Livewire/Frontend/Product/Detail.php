<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $category, $product, $quantityCount = 1;

    public function decrementQuantity(){
        if($this->quantityCount > 1)
            $this->quantityCount--;
        return false;
    }
    public function incrementQuantity(){
        $this->quantityCount++;
    }
    public function addToWishlist($productId){
        if(Auth::check()) {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'Already in wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already in wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            }else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistUpdated');
                session()->flash('message', 'Added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }

        }else {
            session()->flash('message', 'Login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function addToCart(int $productId){
        if(!Auth::check()){
            $this->dispatchBrowserEvent('message', [
                'text' => 'Login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
        if(!$this->product->where('id', $productId)->where('status', '0')->exists()) {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Product doesn\'t exists',
                'type' => 'warning',
                'status' => 404
            ]);
            return false;
        }else {
            if($this->product->quantity <= 0) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product out of Stock',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return false;
            }
            if($this->product->quantity < $this->quantityCount) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Only '.$this->product->quantity. ' available right now',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return false;
            }
            $cart = Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->first();
            if($cart) {
                $cart->update([
                    'quantity' => $cart->quantity += $this->quantityCount,
                ]);
                $this->emit('cartUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Cart',
                    'type' => 'success',
                    'status' => 200
                ]);
            }else {
                Cart::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                    'quantity' => $this->quantityCount
                ]);
                $this->emit('cartUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to Cart',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
    }
    public function mount($category, $product) {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
