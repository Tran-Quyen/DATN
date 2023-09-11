@extends('layouts.admin')
@section('title', 'Order Details')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="cart-header mx-4 mt-4">
                    <h3 class="align-middle">
                        Order Details
                    </h3>
                </div>
                <div class="card-body">
                    <div class="p-4 shadow bg-white">
                        <h4 class="text-primary mb-5">
                            <i class="fa fa-shopping-cart text-dark">
                            </i>
                            Order {{ $order->tracking_no }}
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-md float-end"
                                style="color: white">
                                <span class="fa fa-arrow-right">

                                </span>
                                Back
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" class="btn btn-warning btn-md float-end"
                                style="color: white; margin-right: 5px;">
                                <span class="fa fa-download">
                                </span>
                                Download Invoice
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id) }}" target="_blank" class="btn btn-success btn-md float-end"
                                style="color: white; margin-right: 5px;">
                                <span class="fa fa-eye">
                                </span>
                                View Invoice
                            </a>
                            <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" class="btn btn-info float-end mx-1">
                                <span class="fa fa-envelope">
                                </span>
                                Send Mail
                            </a>
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order ID: {{ $order->id }}</h6>
                                <h6>Tracking No: {{ $order->tracking_no }}</h6>
                                <h6>Order created date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                                <h6>Payment method: {{ $order->payment_mode }}</h6>
                                <h6 class="border p-2 text-success">
                                    Order status message: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details</h5>
                                <hr>
                                <h6>Full Name: {{ $order->fullname }}</h6>
                                <h6>Email Id: {{ $order->email }}</h6>
                                <h6>Phone: {{ $order->phone }}</h6>
                                <h6>Address: {{ $order->address }}</h6>
                                <h6>Pin code: {{ $order->pincode }}</h6>
                            </div>
                        </div>
                        <br>
                        <h5>Order Items</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalPrice = 0 @endphp
                                    @foreach ($order->orderItems as $orderItem)
                                        <tr>
                                            <td width="10%">{{ $orderItem->id }}</td>
                                            <td>
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 100px; height: 100px; border-radius: 0;" alt="">
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}
                                            </td>
                                            <td width="10%">${{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%" class="fw-bold">${{ $orderItem->quantity * $orderItem->price }}</td>
                                        </tr>
                                        @php $totalPrice += $orderItem->quantity * $orderItem->price @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" class="fw-bold fs-5" style="color: red">Total Amount</td>
                                        <td colspan="1" class="fw-bold fs-5" style="color: red">${{ $totalPrice }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            {{-- <div class="mt-4 float-end">
                                {{ $orders->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h4 class="text-primary">Update status</h4>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Status</option>
                                        <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="cancel" {{ Request::get('status') == 'cancel' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-7">
                            <h5 class="mt-3 text-success">Current Order Status:
                                <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
