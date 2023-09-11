@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- carousel --}}
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $slider)
                <div class="carousel-item {{ $key == '0' ? 'active' : '' }}">
                    <img src="{{ asset($slider->image) }}" class="d-block w-100 " style="height: 700px; object-fit: cover"
                        alt="Carousel">
                    <div class="carousel-caption d-none d-md-block" style="top: 30%;">
                        <div class="float-start" style="">
                            <h2 class="text-white mb-4 text-start">{{ $slider->title }}</h2>
                            <p class="text-white mb-4 text-start fs-4">{{ $slider->description }}</p>
                            <a href="#" style="text-decoration: none;">
                                <button class="d-block  text-white"
                                    style="background-color: #76b900; font-size: 18px; border: 1px solid #76b900; padding: 10px 24px;">Khám
                                    phá ngay</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon text-lg" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon text-lg" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- trending products --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Trending
                        <a href="{{ url('trending-products') }}" class="btn btn-warning float-end">More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="carousel-product owl-carousel owl-theme">
                            @foreach ($trendingProducts as $product)
                                <div class="item" style="max-width: 230px;">
                                    <div class="product-card">
                                        <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                            <div class="product-card-img">
                                                <label class="stock bg-danger">Trending</label>
                                                @if ($product->productImages->count() > 0)
                                                    <img src="{{ asset($product->productImages[0]['image']) }}" alt="{{ $product->name }}" style="object-fit: cover;">
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
                                                <span
                                                    class="original-price text-secondary">${{ $product->selling_price }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <a href="" class="btn btn1">
                                                    <i class="fa fa-cart-shopping"></i>
                                                </a>
                                                <a class="btn btn1"><i class="fa fa-heart"></i></a>
                                                <a href="" class="btn btn1"> <i class="fa-solid fa-eye"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div>
                            <h4>No products available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- new product --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>New Products
                        <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                @if ($new)
                    <div class="col-md-12">
                        <div class="carousel-product owl-carousel owl-theme">
                            @foreach ($new as $product)
                                <div class="item" style="max-width: 230px;">
                                    <div class="product-card">
                                        <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                            <div class="product-card-img">
                                                <label class="stock bg-danger">New</label>
                                                @if ($product->productImages->count() > 0)
                                                    <img src="{{ asset($product->productImages[0]['image']) }}" alt="{{ $product->name }}" style=" object-fit: cover:">
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
                                                <span
                                                    class="original-price text-secondary">${{ $product->selling_price }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <a href="" class="btn btn1">
                                                    <i class="fa fa-cart-shopping"></i>
                                                </a>
                                                <a class="btn btn1"><i class="fa fa-heart"></i></a>
                                                <a href="" class="btn btn1"> <i class="fa-solid fa-eye"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div>
                            <h4>No products available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- featured product --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <h4>Featured Products
                        <a href="{{ url('featured-products') }}" class="btn btn-warning float-end">More</a>
                    </h4>
                    <div class="underline"></div>
                </div>
                @if ($new)
                    <div class="col-md-12">
                        <div class="carousel-product owl-carousel owl-theme">
                            @foreach ($featuredProducts as $product)
                                <div class="item" style="max-width: 230px;">
                                    <div class="product-card">
                                        <a href="{{ url('/collections/' . $product->category->slug . '/' . $product->slug) }}">
                                            <div class="product-card-img">
                                                <label class="stock bg-danger">New</label>
                                                @if ($product->productImages->count() > 0)
                                                    <img src="{{ asset($product->productImages[0]['image']) }}" alt="{{ $product->name }}" style=" object-fit: cover:">
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
                                                <span
                                                    class="original-price text-secondary">${{ $product->selling_price }}</span>
                                            </div>
                                            <div class="mt-3">
                                                <a href="" class="btn btn1">
                                                    <i class="fa fa-cart-shopping"></i>
                                                </a>
                                                <a class="btn btn1"><i class="fa fa-heart"></i></a>
                                                <a href="" class="btn btn1"> <i class="fa-solid fa-eye"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div>
                            <h4>No products available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.carousel-product').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
