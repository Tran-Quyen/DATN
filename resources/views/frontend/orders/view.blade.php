@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4 shadow bg-white">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark">
                            </i>
                            My order details
                            <a href="{{ url('orders') }}" class="btn btn-danger btn-md float-end">Back</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order Id: {{ $order->id }}</h6>
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
                                                <img src="{{ asset($orderItem->product->productImages[0]->image ) }}" style="width: 100px; height: 100px" alt="">
                                            </td>
                                            <td>
                                                {{ $orderItem->product->name }}
                                            </td>
                                            <td width="10%">{{ $orderItem->price }}</td>
                                            <td width="10%">{{ $orderItem->quantity }}</td>
                                            <td width="10%">{{ $orderItem->quantity * $orderItem->price }}</td>
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
        </div>
    </div>
@endsection
