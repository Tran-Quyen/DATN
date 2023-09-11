@extends('layouts.admin')
@section('content')
    <!--Show-->
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="msg"></div>
            <div class="card">
                <div class="cart-header mx-4 mt-4">
                    <h3 class="align-middle">Sliders
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary float-end text-white">
                            Add Sliders
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="col-md-2">{{ $slider->title }}</td>
                                    <td class="col-md-3">{{ $slider->description }}</td>
                                    <td>
                                        <img src="{{ asset($slider->image) }}" alt=""
                                            style="width: 200px; height: 120px; border-radius: 0%;">
                                    </td>
                                    @if ($slider->status)
                                        <td>
                                            <div class="btn btn-danger disabled text-white">Not Ready</div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="btn btn-success disabled text-white">Ready</div>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success text-white">Edit</a>
                                        <a href="" class="btn btn-danger delete-slider text-white" data-id="{{ $slider->id }}"
                                        data-title="{{ $slider->title }}"
                                        >
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="float-end mt-5"></div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            window.addEventListener('close-modal', () => {
                $('#deleteModal').modal('hide');
            })
        </script>
    @endpush
@endsection

@include('admin.delete_js')
