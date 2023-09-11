@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="cart-header mx-4 mt-4">
                    <h3 class="align-middle">Add Slider
                        <a href="{{ url('admin/sliders') }}" class="btn btn-primary float-end text-white px-5">
                            Back
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/sliders/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="mb-3" for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3" for="description">Description</label>
                                <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3" for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="mb-3" for="status" class="">Status</label>
                                <br>
                                <input type="checkbox" name="status" id="status"> Not Ready to Show
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-success float-end">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
