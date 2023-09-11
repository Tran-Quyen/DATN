@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h4>User Profile
                </h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-10">
                @if (session('message'))
                    <p class="alert alert-success">
                        {{ session('message') }}
                    </p>
                @endif
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error )
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="card shadow">
                    <div class="card-header bg-success">
                        <h4 class="mb-0 text-white">
                            User Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Email Address</label>
                                        <input type="text" name="email" readonly value="{{ Auth::user()->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Zip Code</label>
                                        <input type="text" name="zip_code" value="{{ Auth::user()->userDetail->zip_code ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="">Address</label>
                                        <textarea name="address" class="form-control" rows="3">
                                            {{ Auth::user()->userDetail->address ?? ''}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Save Data</button>
                                    <a href="{{ url('change-password') }}" class="float-end">Change Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
