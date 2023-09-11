<div>
   <div class="row">
        <div class="col-md-3" style="max-width: 280px;">
            @if($category->brands)
                <div class="mb-5">
                    <div class="mb-3">
                        <h5>Brands</h5>
                    </div>
                    <div class="">
                        @foreach ($category->brands as $brand)
                            <lable class="d-block">
                                <input class="mx-2" type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}"> {{ $brand->name }}
                            </lable>
                        @endforeach
                    </div>
                </div>
            @endif
            <hr style="max-width: 180px;">
            <div class="mt-4">
                <div class="mb-3">
                    <h5>Price</h5>
                </div>
                <div class="">
                    <lable class="d-block">
                        <input class="mx-2" type="radio" name="priceSort" wire:model="priceInput" value="high-to-low">High to Low
                    </lable>
                    <lable class="d-block">
                        <input class="mx-2" type="radio" name="priceSort" wire:model="priceInput" value="low-to-high">Low to High
                    </lable>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-3">
                        <div class="product-card">
                            <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                <div class="product-card-img">
                                    @if ($product->quantity > 0)
                                        <label class="stock bg-success">In Stock</label>
                                    @else
                                        <label class="stock bg-danger">Out of Stock</label>
                                    @endif
                                    @if($product->trending)
                                        <label class="trending bg-danger">Trending</label>
                                    @endif
                                    @if ($product->productImages->count() > 0)
                                        <img src="{{ asset($product->productImages[0]['image']) }}" alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </a>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name py-1">
                                    <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}" class="text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price text-red">${{ $product->original_price }}</span>
                                    <span class="original-price text-secondary">${{ $product->selling_price }}</span>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn1">Add to Cart</a>
                                    <a class="btn btn1"><i class="fa fa-heart"></i></a>
                                    <a href="" class="btn btn1"> View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>
                        <h4>No products available for {{ $category->name }}</h4>
                    </div>
                @endforelse
            </div>
        </div>
   </div>
</div>
