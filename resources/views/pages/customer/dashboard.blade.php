@extends('pages.customer.index')
@section('title', 'Dashboard')
@section('customer')
<section id="dashboard">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.customer.sidebar')
            </div>
            <div class="col-md-9">
                <div class="top_card">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('customer.pending.order') }}">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-spinner fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Pending Order</h4>
                                </div>
                            </a>

                        </div>

                        <div class="col-md-4 mb-2">
                            <a href="{{ route('customer.approved.order') }}">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-thumbs-up fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Delivered Order</h4>
                                </div>
                            </a>

                        </div>

                        <div class="col-md-4 mb-2">
                            <a href="{{ route('customer.canceled.order') }}">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-ban text-danger fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Canceled Order</h4>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="order_list py-2 table-responsive">

                    <h4 class="text-black fw-bold"><i class="fa fa-list-alt" aria-hidden="true"></i> Latest Order</h4>

                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Invoice No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $order->created_at->format('j F Y') }}</td>
                                <td>{{ $order->invoice_no }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->mobile }}</td>
                                <td>${{ number_format($order->sub_total, 2) }}</td>
                                @if ($order->status == 1)
                                    <td class="badge bg-primary mt-1">Confirm</td>
                                @elseif($order->status == 2)
                                    <td class="badge bg-info mt-1">Process</td>
                                @elseif($order->status == 3)
                                    <td class="badge bg-warning mt-1">Shipping</td>
                                @elseif($order->status == 4)
                                    <td class="badge bg-success mt-1">Delivered</td>
                                @else
                                    <td class="badge bg-danger mt-1">Cancel</td>
                                @endif
                                <td>
                                    <a href="{{ route('customer.order.show', $order->id) }}"
                                        class="btn-sm btn-info"><i class="fa fa-eye text-white"></i></a>
                                    <a href="{{ route('customer.order.print', $order->id) }}"
                                        class="btn-sm btn-success"><i class="fa fa-download"
                                            aria-hidden="true"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection