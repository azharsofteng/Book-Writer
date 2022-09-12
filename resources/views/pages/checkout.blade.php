@extends('pages.customer.index')
@section('title', 'Checkout')
@section('customer')
<div class="checkout-section py-3">
    <div class="container mt-3">
        <div class="section-header">
            <h2>Checkout</h2>
            <div class="line"></div>
        </div>
        <form action="{{ route('place.order') }}" method="POST">
            @csrf
            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col-md-6">
                    <div class="billing p-3 border mb-4">
                        <h5>BILLING DETAILS</h5>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control shadow-none" id="name" value="{{ Auth::guard('customer')->user()->name }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control shadow-none" id="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email">E-mail </label>
                                <input type="email" name="email" class="form-control shadow-none" id="email" value="{{ Auth::guard('customer')->user()->email }}">
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="address">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control shadow-none" id="address" value="{{ Auth::guard('customer')->user()->address }}" required>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="order_note">Order Notes </label>
                                <textarea name="order_note" class="form-control shadow-none" id="order_note" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="shipping-head py-3 d-flex justify-content-between">
                            <h5>SHIPPING DETAILS</h5>
                            <label for="shipping" class="user-select-none ">
                                <input type="checkbox" id="shipping" onclick="SameAsBilling()" checked> Same as billing
                            </label>
                        </div>
                        <div class="shapping-form" id="same_as_billing" style="display: none;">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control shadow-none" id="name" value="{{ Auth::guard('customer')->user()->name }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control shadow-none" id="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email">E-mail </label>
                                    <input type="email" name="email" class="form-control shadow-none" id="email" value="{{ Auth::guard('customer')->user()->email }}">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="shipping_address" class="form-control shadow-none" id="address" value="{{ Auth::guard('customer')->user()->address }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="order p-3 border">
                        <h5 class="pb-1">YOUR ORDER</h5>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @php $total = 0; $cartData = session('cart'); @endphp
                                <input type="hidden" name="cart" value="{{ json_encode($cartData) }}">
                                @if($cartData)
                                    @foreach($cartData as $id => $product)
                                    @php $total += $product['price'] * $product['quantity'] @endphp
                                        <tr>
                                            <td>{{ $product['name'] }}</td>
                                            <td>{{ $product['price'] }}</td>
                                            <td>{{ $product['quantity'] }}</td>
                                            <td class="text-end">{{ $product['price'] * $product['quantity'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td colspan="3" class="text-end">Total:</td>
                                    <td class="text-end">${{ $total }}</td>
                                    <input type="hidden" name="sub_total" value="{{ $total }}">
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-end">
                            <a href="{{ route('home') }}" class="continue_shopping btn-dark  mx-2 shadow-none"> < Continue Shopping</a>
                            @if (Auth::guard('customer')->check())
                                <button type="submit" class="checkout mx-2 shadow-none border-none">Place Order</button>
                            @else
                                <a href="#" class="checkout mx-2 shadow-none">Place Order</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@include('partials.web_footer') 
@endsection
@push('customer-js')
    <script>
        function SameAsBilling() {
            let shipping = document.getElementById('shipping').checked;
            var x = document.getElementById("same_as_billing");
            if(shipping == true){
                x.style.display = "none";
            }
            else{
                x.style.display = "block";
            }
        }
    </script>
@endpush