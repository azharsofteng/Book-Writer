@extends('layouts.master')
@section('title', 'Order Invoice') 
@push('admin-css')
    <style>
        #printable{
            display: none !important;
        }
        @media print{
            #non-printable { display: none; }
            #printable { display: block !important; } 
            .card-border{
                border:none !important;
            }
        }
    </style>
@endpush
@section('main-content')
<main>
    <div class="container-fluid" id="root">
        <div class="heading-title p-2 my-2">
            <span class="my-3 heading "><i class="fa fa-file-pdf"></i> Customer Oreder Invoice</span>
        </div>
        <div class="row" id="printableArea">
            <div class="col-md-12">
                <div class="card card-border">
                    <div class="card-body">
                        <div id="printable">
                            <div class="border-bottom mb-3 d-flex pe-1" style="align-items: center;">
                                <div class="pr-2 mb-3"><img style="height: 70px; border: 1px solid #ccc;" src="{{ asset($content->image) }}" alt="" /></div>
                                <div>
                                    <p>
                                        <strong>{{ $content->name }}</strong>,<br />
                                        <strong>Hotline:&nbsp; </strong>{{ $content->phone }}<br />
                                        <strong>Address:&nbsp; </strong> {{ $content->address }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                                {{--
                                <p class=""><b>{{ Auth::user()->name }}</b></p>
                                --}}
                                <p class="">
                                    <b>Customer Name:</b> {{ $order->name }}<br />
                                    <b>Customer Mobile: </b>{{ $order->mobile }},<br />
                                    <b>Customer Address: </b>{{ $order->address }}.
                                </p>
                            </div>
                            <div class="col-lg-3 pr-0">
                                <p class="mb-0 text-right"><strong>Invoice Date :</strong> {{$order->created_at->format('j F Y')}}</p>
                                <p class="text-right mb-0"><strong>Invoice No&nbsp;&nbsp;#{{ $order->invoice_no }}</strong></p>
                                <p class="text-right mb-0"><strong>Order Id&nbsp;&nbsp;#{{ $order->id }} </strong></p>
                            </div>
                        </div>
                        {{-- <div class="container-fluid d-flex">
                            <div class="col-lg-3 pl-0">
                                
                            </div>
                        </div> --}}
                        <div class="container-fluid d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr class="bg-dark text-white">
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">Unit cost</th>
                                            <th class="text-right">Discount</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_details as $key=> $item)
                                        <tr class="text-right">
                                            <td class="text-left">{{ ++$key }}</td>
                                            <td class="text-left">{{ $item->product ? $item->product->name : '' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->product ? $item->product->discount : 0 }}</td>
                                            <td>{{ $item->total }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            <div class="row">
                                <div class="col-md-8">
                                    <p>{{ $order->note }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-right mb-0">Shipping Cost : {{ $order->shipping_cost }}</p>
                                    <h4 class="text-right">Total : {{ $order->sub_total + $order->shipping_cost }} $</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid w-100">
            <button href="#" id="hide" onclick="printDiv('printableArea')" class="btn btn-primary float-right mt-2 ml-2 shadow-none"><i class="fa fa-print mr-1"></i>Print</button>
        </div>
    </div>
</main>
@endsection
@push('script')
    <script>
        function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    </script>
@endpush