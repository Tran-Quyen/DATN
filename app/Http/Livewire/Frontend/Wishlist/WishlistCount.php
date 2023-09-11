<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    protected $count;
    //wishlistUpdated
    protected $listeners = ['wishlistUpdated' => 'checkWishlistCount'];

    public function checkWishlistCount(){
        if(Auth::check()){
            return $this->count = Wishlist::where('user_id', auth()->user()->id)->count();
        }else {
            return $this->count = 0;
        }

    }
    public function render()
    {
        $this->count = $this->checkWishlistCount();
        return view('livewire.frontend.wishlist.wishlist-count', [
            'count' => $this->count,
        ]);
    }
}
