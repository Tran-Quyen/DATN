@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total orders</label>
                        <h1>
                            {{ $totalOrders }}
                        </h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for="">Today orders</label>
                        <h1>
                            {{ $todayOrders }}
                        </h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for="">This Month orders</label>
                        <h1>
                            {{ $thisMonthOrders }}
                        </h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label for="">This Year orders</label>
                        <h1>
                            {{ $thisYearOrders }}
                        </h1>
                        <a href="{{ url('admin/orders') }}" class="text-white">view</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">Total products</label>
                        <h1>
                            {{ $totalProducts }}
                        </h1>
                        <a href="{{ url('admin/products') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for="">Total Categories</label>
                        <h1>
                            {{ $totalCategories }}
                        </h1>
                        <a href="{{ url('admin/categories') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for="">Total brands</label>
                        <h1>
                            {{ $totalBrands }}
                        </h1>
                        <a href="{{ url('admin/brands') }}" class="text-white">view</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label for="">All Users</label>
                        <h1>
                            {{ $totalAllUsers }}
                        </h1>
                        <a href="{{ url('admin/products') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label for="">Total Users</label>
                        <h1>
                            {{ $totalUser }}
                        </h1>
                        <a href="{{ url('admin/categories') }}" class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3">
                        <label for="">Total Admins</label>
                        <h1>
                            {{ $totalAdmin }}
                        </h1>
                        <a href="{{ url('admin/brands') }}" class="text-white">view</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
