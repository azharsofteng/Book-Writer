@extends('pages.customer.index')
@section('title', 'Pending Order')
@section('customer')
<!-- Customer Dashboard Section here -->
<section style="margin: 40px 0px" id="app">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('pages.customer.sidebar')
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item text-center bg-dark text-white">Shipping Information</li>
                            
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->mobile }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                {{ $order->email }}
                            </li>
                            
                            <li class="list-group-item">
                                <strong>Order Date:</strong>
                                {{ $order->created_at->format('j F Y') }}
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item text-center bg-info text-white">Order Information</li>
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $order->customer->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong>
                                {{ $order->customer->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Payment By:</strong>
                                {{ $order->payment_type }}
                            </li>
                            <li class="list-group-item">
                                <strong>Invoice No:</strong>
                                {{ $order->invoice_no }}
                            </li>
                            <li class="list-group-item">
                                <strong>Order Total:</strong>
                                ${{ number_format($order->sub_total, 2) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Order Status:</strong>
                                @if ($order->status == 1)
                                    <span class="badge bg-primary">Confirm</span>
                                @elseif($order->status == 2)
                                    <span class="badge bg-info">Process</span>
                                @elseif($order->status == 3)
                                    <span class="badge bg-warning">Shipping</span>
                                @elseif($order->status == 4)
                                    <span class="badge bg-success">Delivered</span>
                                @else
                                    <span class="badge bg-danger">Cancel</span>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="customer_profile table-responsive mt-2">
                
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($orderItem as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($item->product->image) }}" height="30px;" width="30px;" alt="imga"></td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->category->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                </tr>
                                
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-end"><strong>Sub Total:</strong></td>
                                    <td><strong>${{ number_format($order->sub_total, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end"><strong>Shipping Charge:</strong></td>
                                    <td><strong>${{ number_format($order->shipping_cost, 2) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="text-end"><strong>Total Amount:</strong></td>
                                    <td><strong>${{ number_format($order->sub_total + $order->shipping_cost, 2) }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection