<?php

namespace App\Http\Livewire\Frontend\Wishlist;

use App\Models\Wishlist;
use Livewire\Component;

class Show extends Component
{
    public function removeWishlist(int $wishListId){
        Wishlist::where('user_id', auth()->user()->id)->where('id', $wishListId)->delete();
        $this->emit('wishlistUpdated');
        $this->dispatchBrowserEvent('message', [
            'text' => 'Removed',
            'type' => 'success',
            'status' => 200
        ]);
    }
    public function render()
    {   $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist.show', [
            'wishlist' => $wishlist
        ]);
    }
}
