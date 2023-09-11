@extends('layouts.app')

@section('title', 'New arrival')

@section('content')
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>New Arrivals
                        
                    </h4>
                    <div class="underline"></div>
                </div>
                @forelse ($trendingProducts as $product)
                    <div class="col-md-2" style="min-width: 264px;">
                        <div class="product-card">
                            <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                <div class="product-card-img">
                                    <label class="stock bg-danger">New</label>
                                    @if ($product->productImages->count() > 0)
                                        <img src="{{ asset($product->productImages[0]['image']) }}"
                                            alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </a>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $product->brand }}</p>
                                <h5 class="product-name py-1">
                                    <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}"
                                        class="text-dark">
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
                    <div class="col-md-12">
                        <div>
                            <h4>No products available</h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
