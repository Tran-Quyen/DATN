@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="cart-header mx-4 mt-4">
                <h3 class="align-middle">Update Product
                    <a href="{{ url('admin/products') }}" class="btn btn-primary float-end text-white px-5">
                        Back
                    </a>
                </h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning">
                        @foreach ( $errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab"
                                data-bs-target="#seotag-tab-pane" type="button" role="tab"
                                aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab"
                                aria-controls="image-tab-pane" aria-selected="false">
                                Image
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active border p-3 mb-4" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                            <div class="mb-4 mt-3">
                                <label for="">Category</label>
                                <select name="category_id" class="form-select mt-1">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="name">Product name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="mb-4">
                                <label for="">Product SLug</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $product->slug }}">
                            </div>
                            <div class="mb-4">
                                <label for="">Brand</label>
                                <select name="brand" class="form-select">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ? 'selected':'' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="">Small description</label>
                                <textarea name="small_description" rows="3" class="form-control">
                                    {{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" class="form-control">
                                    {{ $product->description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 mb-4" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab"
                        tabindex="0">
                            <div class="mb-4 mt-3">
                                <label for="">Meta title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                            </div>
                            <div class="mb-4">
                                <label for="">Meta keyword</label>
                                <textarea name="meta_keyword" rows="3" class="form-control">
                                    {{ $product->meta_keyword }}
                                </textarea>
                            </div>
                            <div class="mb-4">
                                <label for="">Meta description</label>
                                <textarea name="meta_description" rows="3" class="form-control">
                                    {{ $product->meta_description }}
                                </textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3 mb-4" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                        tabindex="0">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    {{-- <div class="mb-4">
                                        <label for="">$ Original price</label>
                                        <input type="text" name="original_price" class="form-control" value="{{ $product->original_price }}">
                                    </div> --}}
                                    <label for="">Original price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Original price" name="original_price" value="{{ $product->original_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    {{-- <div class="mb-4">
                                        <label for="">$ Selling price</label>
                                        <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                                    </div> --}}
                                    <label for="">Selling price</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="Selling price" name="selling_price" value="{{ $product->selling_price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="">Trending</label>
                                        <input type="checkbox" name="trending" style="height: 16px; width: 16px" {{ $product->trending == '1' ? 'checked':'' }}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="">Featured</label>
                                        <input type="checkbox" name="featured" style="height: 16px; width: 16px" {{ $product->featured == '1' ? 'checked':'' }}>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="">Status - Not Ready</label>
                                        <input type="checkbox" name="status" style="height: 16px; width: 16px" {{ $product->status == '1' ? 'checked':'' }}>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade mb-4 border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                        tabindex="0">
                            <div class="mb-4 mt-3">
                                <label for="">Upload Images</label>
                                <input type="file" name="image[]" multiple class="form-control mt-3">
                            </div>
                            <div id="img_div">
                                @if($product->productImages)
                                    @forelse ( $product->productImages as $image )
                                        <div class="d-inline position-relative">
                                            <img src="{{ asset($image->image) }}" style="object-fit: cover;width: 100%; height: 140px; width: 140px;" class="border me-3" alt="">
                                            <a href="" class="btn-sm btn-close position-absolute top--100 start-0 z-999 delete_img" aria-label="Close" data-id="{{ $image->id }}">
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <h5>No Image</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@include('admin.product_js')

