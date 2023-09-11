<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Product?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="removeCartItem">
                    <div class="modal-body">
                        <h6>Are you sure?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>My Cart</h4>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartItem)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a
                                            href="{{ '/collections/' . $cartItem->product->category->slug . '/' . $cartItem->product->slug }}">
                                            <label class="product-name">
                                                <img src="{{ asset($cartItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                                {{ $cartItem->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">${{ $cartItem->product->original_price }} </label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span
                                                    wire:click="decrementQuantity({{ $cartItem->id }})"
                                                    wire:loading.attr="disabled"
                                                    class="btn btn1"
                                                >
                                                    <i class="fa fa-minus"></i>
                                                </span>
                                                <input type="text" value="{{ $cartItem->quantity }}" class="input-quantity"/>
                                                <span
                                                    wire:loading.attr="disabled"
                                                    wire:click="incrementQuantity({{ $cartItem->id }})"
                                                    class="btn btn1"
                                                >
                                                    <i class="fa fa-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label
                                            class="price">${{ $cartItem->product->original_price * $cartItem->quantity }}
                                        </label>
                                        @php $totalPrice += $cartItem->product->original_price * $cartItem->quantity @endphp
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <btn wire:loading.attr="disabled" type="button"
                                                class="btn btn-danger btn-sm"
                                                wire:click="deleteCartItem({{ $cartItem->id }})"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                >
                                                <span>
                                                    <i class="fa fa-trash"></i> Remove
                                                </span>
                                            </btn>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h4>You haven't added anything yet...</h4>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h4>
                        <a href="{{ url('/collections') }}">
                            <button class="btn" style="background-color: rgb(255, 0, 0); color: white;">Continue to
                                Shop</button>
                        </a>
                    </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h5>Total:
                            <span class="float-end">{{ $totalPrice }}$</span>
                        </h5>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', () => {
            $('#deleteModal').modal('hide');
        })
    </script>
    <script>
        window.addEventListener('delete', ()=> {
            $('#deleteModal').modal('toggle')
        })
    </script>
@endpush
