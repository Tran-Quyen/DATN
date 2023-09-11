@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="cart-header mx-4 mt-4">
                    <h3 class="align-middle">Edit Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-primary float-end text-white px-5">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $slider->title }}" autofocus>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if($slider->image)
                                    <img src="{{ asset($slider->image) }}" alt="Category Image" width="200px" height="120px" class="object-cover mt-3 mb-4">
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="status" class="mb-2">Status</label>
                                <br>
                                <input type="checkbox" name="status" id="status" {{ $slider->status == '1' ? 'checked' : '' }}> Not Ready to Show
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
