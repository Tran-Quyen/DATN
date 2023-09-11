<div class="card-body show-product">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td class="col-md-3">{{ $product->name }}</td>
                    @if ($product->category->name)
                        <td>{{ $product->category->name }}</td>
                    @else
                        <div>No category</div>
                    @endif
                    <td>{{ $product->selling_price }}$</td>
                    <td>{{ $product->quantity }}</td>
                    @if ($product->status)
                        <td>
                            <div class="btn btn-danger disabled text-white">Not Ready</div>
                        </td>
                    @else
                        <td>
                            <div class="btn btn-success disabled text-white">Ready</div>
                        </td>
                    @endif
                    <td class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset($product->productImages[0]['image']) }}" alt="product img"
                            style="height: 120px; width: 120px; object-fit: cover; overflow: hidden; border-radius: 0;">
                    </td>
                    <td>
                        <a href="{{ url('admin/products/' . $product->id . '/edit') }}" class="btn btn-primary text-white">Edit</a>
                        <a href="" class="btn btn-danger delete_product text-white" data-id="{{ $product->id }}"
                            data-name="{{ $product->name }}">
                            Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">
                        No product found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="float-end mt-5">{{ $products->links() }}</div>
</div>
