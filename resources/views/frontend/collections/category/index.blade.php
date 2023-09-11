@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Categories</h4>
                </div>
                @forelse ( $cats as $cat )
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('/collections/'.$cat->slug) }}"">
                                <div class="category-card-img py-2">
                                    <img src="{{ asset('uploads/category/'.$cat->image) }}" class="w-100" alt="{{ $cat->name }}">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{ $cat->name }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>No categories...</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
