<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;

    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],
        'priceInput' => ['except' => '', 'as' => 'price'],
    ];

    public function mount($category) {
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)
                                    ->when($this->brandInputs, function($query){
                                        $query->whereIn('brand', $this->brandInputs);
                                    })
                                    ->when($this->priceInput, function($query){
                                        $query->when($this->priceInput == 'high-to-low', function($query1){
                                            $query1->orderBy('original_price', 'desc');
                                        })->when($this->priceInput == 'low-to-high', function($query1){
                                            $query1->orderBy('original_price', 'asc');
                                        });
                                    })
                                    ->where('status', '0')
                                    ->get();

        return view('livewire.frontend.product.index', [
            'products' =>  $this->products,
            'category' =>  $this->category,
        ]);
    }
}
