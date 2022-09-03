@extends('layouts.master')
@section('title', 'Order List') 
@push('admin-css')
    <style>
        .nav-tabs .nav-item {
            background-color: #1C3C72;
            border-right: 1px solid #fff;
        }
        .nav-tabs .nav-link {
            color: #fff;
        }
        .nav-tabs .nav-link:hover {
            color: #fff;
        }
        .btn-order {
            padding: 3px 7px !important;
        }
    </style>
@endpush
@section('main-content')
<main>
    <div class="container-fluid mt-2" id="root">
        <div class="row justify-content-center">
            <div class="col-md-12 pl-0">
                        
                <div class="card card-table">
                    <div class="card-header d-flex justify-content-between">
                        <h5><i class="fas fa-list-alt mr-1"></i> All Order List</h5>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger mt-2 col-md-6">{{ session('error') }}</div>
                        @endif
                        
                        @if (session('success'))
                            <div class="alert alert-success mt-2 col-md-6">{{ session('success') }}</div>
                        @endif
                        <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="true">Pending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#confirm" type="button" role="tab" aria-controls="confirm" aria-selected="false">Confirm</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#process" type="button" role="tab" aria-controls="process" aria-selected="false">Process</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Shipping" type="button" role="tab" aria-controls="Shipping" aria-selected="false">Shipping</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Delivered" type="button" role="tab" aria-controls="Delivered" aria-selected="false">Delivered</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#Cancel" type="button" role="tab" aria-controls="Cancel" aria-selected="false">Cancel</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendingOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td><a class="badge badge-danger ">Pending</a></td>
                                                <td>
                                                    <a href="{{ route('confirm.order',$item->id) }}" class="btn btn-primary btn-order shadow-none" title="Confirm Order"><i class="fas fa-check-circle"></i></a>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm shadow-none"><i class="fa fa-file-pdf"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-none" onclick="deleteOrder({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                                    <form id="delete-form-{{$item->id}}" action="{{ route('order.cancel', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="confirm" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($confirmOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td><a class="badge badge-success">Confirm</a></td>
                                                <td>
                                                    <a href="{{ route('process.order',$item->id) }}" class="btn btn-success btn-order" title="Process Order"><i class="fas fa-check-circle"></i></a>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-file-pdf"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="deleteOrder({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                                    <form id="delete-form-{{$item->id}}" action="{{ route('order.cancel', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="process" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($processOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td><a class="badge badge-info">Process</a></td>
                                                <td>
                                                    <a href="{{ route('shipping.order',$item->id) }}" class="btn btn-warning btn-order shadow-none" title="Shipping Order"><i class="fas fa-dolly"></i></a>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm shadow-none"><i class="fa fa-file-pdf"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-none" onclick="deleteOrder({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                                    <form id="delete-form-{{$item->id}}" action="{{ route('order.cancel', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Shipping" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($shippingOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td><a class="badge badge-primary">Shipping</a></td>
                                                <td>
                                                    <a href="{{ route('delivered.order',$item->id) }}" class="btn btn-dark btn-order shadow-none" title="Delivered Order"><i class="fas fa-truck"></i></a>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm shadow-none"><i class="fa fa-file-pdf"></i></a>
                                                    <button type="submit" class="btn btn-danger btn-sm shadow-none" onclick="deleteOrder({{ $item->id }})"><i class="fa fa-trash"></i></button>
                                                    <form id="delete-form-{{$item->id}}" action="{{ route('order.cancel', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="Delivered" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($deliveredOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td><a class="badge badge-success">Delivered</a></td>
                                                <td>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm shadow-none"><i class="fa fa-file-pdf"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if (isset($cancelOrders))
                            <div class="tab-pane fade" id="Cancel" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Customer</th>
                                                <th>Address</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cancelOrders as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                                <td>{{ $item->customer->name }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->sub_total }}</td>
                                                <td>--</td>
                                                <td>
                                                    <a href="{{ route('invoice', $item->id) }}" class="btn btn-info btn-sm shadow-none"><i class="fa fa-file-pdf"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('admin-js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteOrder(id) {
        swal({
            title: 'Are you sure?',
            text: "You want to Cancel this Order!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Cancel it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            }
        })
    }
</script>
@endpush