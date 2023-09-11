@extends('layouts.admin')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="cart-header mx-4 mt-4">
                    <h3 class="align-middle">Add Users
                        <a href="{{ url('admin/users') }}" class="btn btn-primary float-end text-white px-5">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Select Role</label>
                                <select name="role_as" class="form-control" size="1">
                                    <option value="">Select Role</option>
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
