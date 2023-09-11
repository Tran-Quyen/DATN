@extends('layouts.admin')
@section('title', 'Users')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="msg">
            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
        </div>
        <div class="card">
            <div class="cart-header mx-4 mt-4 d-flex justify-content-between align-items-center">
                <h3 class="align-self-center">Users</h3>
                <div class="col-md-6">
                    <input type="text" class="form-control align-self-center" placeholder="Search Here..." id="search_user" name="search">
                </div>
                <a href="{{ url('admin/users/create') }}" class="btn btn-primary float-end text-white px-5 align-self-center">
                    Add User
                </a>
            </div>
            @include('admin.users.show')
        </div>
    </div>
</div>
@endsection

@include('admin.search_js')
@include('admin.delete_js')
