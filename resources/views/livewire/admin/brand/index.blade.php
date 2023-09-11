<div>
    @include('livewire.admin.brand.modal')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="col-md-12">
                    <h2 class="alert alert-success">{{ session('message') }}</h2>
                </div>
            @endif
            <div class="card">
                <div class="bg-white mx-4 mt-5">
                    <h3 class="align-middle">
                        Brands List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal"
                            class="btn btn-primary float-end text-white">
                            Add Brand
                        </a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    @if ($brand->status)
                                        <td>
                                            <div class="btn btn-danger disabled text-white">Not Ready</div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="btn btn-success disabled text-white">Ready</div>
                                        </td>
                                    @endif
                                    @if ($brand->category)
                                        <td>{{ $brand->category->name }}</td>
                                    @else
                                        <td>No category</td>
                                    @endif
                                    <td>
                                        <a href="#" wire:click="editBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-success text-white">
                                            Edit
                                        </a>
                                        <a href="#" wire:click="deleteBrand({{ $brand->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-danger text-white">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Brand Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-end mt-4">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        window.addEventListener('close-modal', () => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
    </script>
@endpush
