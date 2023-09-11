@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="msg">
        </div>
        @if (session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="cart-header mx-4 mt-4 d-flex justify-content-between align-items-center">
                <h3 class="align-self-center">Products</h3>
                <div class="col-md-6">
                    <input type="text" class="form-control align-self-center" placeholder="Search Here..." id="search_product" name="search">
                </div>
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end text-white px-5 align-self-center">
                    Add Product
                </a>
            </div>
            @include('admin.products.show')
        </div>
    </div>
</div>
@endsection
@include('admin.product_js')
