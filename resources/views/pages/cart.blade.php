@extends('pages.customer.index')
@section('title', 'Cart')
@section('customer')
<div class="cart-section py-3">
    <div class="container mt-3">
        <div class="section-header">
            <h2>Your Cart</h2>
            <div class="line"></div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered text-center">
                    <thead class="">
                        <th>Sl</th>
                        <th colspan="2">Discription</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
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
                            <td class="text-center">${{ $total }}</td>
                        </tr>
                        <td colspan="7" class="text-end" style="padding:12px 10px !important">
                            <a href="{{ route('home') }}" class="continue_shopping btn-dark shadow-none"> < Continue Shopping</a>
                            @if (Auth::guard('customer')->check())
                                <a href="{{ route('checkout.cart') }}" class="checkout mx-2 shadow-none">Checkout</a>
                            @else
                                <a href="{{ route('customer.login') }}" class="checkout mx-2 shadow-none">Checkout</a>
                            @endif
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('partials.web_footer') 
@endsection
@push('customer-js')
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
    
    $("document").ready(function(){
        setTimeout(function(){
        $("div.alert").remove();
        }, 3000 ); // 5 secs
    });
</script>
@endpush