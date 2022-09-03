@extends('layouts.web_master')
@section('title', 'Shopping Cart')
@push('web-css')
    <style>
        .cart-content {
            background-color: #fafafa;
            padding: 5% 20%;
        }
        .checkout {
            border: 1px solid #f66e5e;
            padding: 10px 26px;
            border-radius: 20px;
            text-decoration: none;
            margin: 10px;
            color: #f66e5e
        }
        
        .checkout:hover {
            background: #f66e5e;
            color: #fff;
            transition: 0.5 ease-in-out;
        }
        table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
        }

        table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
        }

        table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
        }

        table th,
        table td {
        padding: .625em;
        text-align: center;
        }

        table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
        }

        @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }
        
        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
        
        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }
        
        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
        }
        
        table td::before {
            /*
            * aria-label has no advantage, it won't be read inside a table
            content: attr(aria-label);
            */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        table td:last-child {
            border-bottom: 0;
        }
        }


    </style>
@endpush
@section('web-content')
<div class="Cart">
    <div class="cart-content">
        {{-- <h1>Your Cart!</h1> --}}
        <table>
            <thead>
                <tr>
                    <th>Sl</th>
                    <th colspan="2">Discription</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @if(session('cart'))
                @foreach(session('cart') as $id => $product)
                @php $total += $product['price'] * $product['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td class="text-center">{{ ++$id }}</td>
                        <td width="60">
                            <img height="30" src="{{ asset($product['image']) }}" class="cart-image">
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td class="text-right">{{ $product['price'] }}</td>
                        <td width="8%" class="text-center" data-th="Quantity">
                            <input style="height: 30px;"  type="number" value="{{ $product['quantity'] }}" class="form-control quantity update-cart" />
                        </td>
                        <td class="text-right">{{ $product['price'] * $product['quantity'] }}</td>
                        <td class="text-center">
                            <a href="" class=" btn-sm btn-danger btn-sm remove-from-cart"><i class="fa  fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan="6" class="text-end">Sub Total :</td>
                    <td class="text-center">{{ $total }} tk</td>
                </tr>
                <td colspan="7" class="text-end">
                    <a href="{{ route('home') }}" class="continue_shopping btn-dark"> < Continue Shopping</a>
                    @if (Auth::guard('customer')->check())
                        <a href="{{ route('checkout.cart') }}" class="checkout btn-dark mx-2">Checkout</a>
                    @else
                        <a href="{{ route('customer.login') }}" class="checkout btn-dark mx-2">Checkout</a>
                    @endif
                </td>
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('web-js')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
  
        var ele = $(this);
        
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endpush