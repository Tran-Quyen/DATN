@extends('layouts.app')

@section('title', 'Thank you')

@section('content')
    <div class="py-3 pyt-md-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="p-4 shadow bg-white">
                        @if(session('message'))
                            <h5 class="alert alert-success">{{ session('message') }}</h5>
                        @endif
                        <h2></h2>
                        <h4 class="mb-4">Thank You for Shopping on QComputer</h4>
                        <a href="{{ url('collections') }}" class = "btn btn-warning">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

