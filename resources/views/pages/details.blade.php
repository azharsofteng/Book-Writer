@extends('layouts.web_master')
@section('title', 'Book Details')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endpush
@section('web-content')
 <!-- full-book-details-page start -->
<div class="full-book-details-page">
    <!-- book-details-head start -->
    <div class="book-details-head">
        <div class="book-details-head-img">
            <img src="{{ asset($product->image) }}" alt="book-1">
            {{-- <div class="book-details-head-icon">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
            </div> --}}
        </div>
        <div class="book-details-head-content">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->short_details }}</p>
            <div class="book-details-head-price">
                @if ($product->discount > 0)
                    <span>${{ $product->price - $product->discount }}</span>
                    <del>${{ $product->price }}</del>
                @else
                    <span>${{ $product->price }}</span>
                @endif
            </div>
            <div class="full-inc-dec">
                <div class="inc-dec">
                    <button onclick="IncrementDecrement(-1)">-</button>
                    <span>1</span>
                    <button onclick="IncrementDecrement(1)">+</button>
                    @php
                        $qty = '<input type="text" id="qty" value="1"/>';
                    @endphp
                </div>
                <div class="add-to-cart-btn">
                    {{-- <a href="{{ url("add-to-cart/{$product->id}/2") }}">Add to Cart</a> --}}
                    <a href="{{ route('add.to.cart', $product->id) }}">Add to Cart</a>
                </div>
            </div>
            <a href="{{ $product->read_more_url }}"><button class="read-book">Read the Book</button></a>
        </div>
    </div>
    <!-- book-details-head end -->

    <!-- book-details-middle-content start -->
    <div class="book-details-middle-content">
        <div class="book-details-middle-content-1" style="text-align: justify;">
            {!! $product->details !!}
        </div>
    </div>
    <!-- book-details-middle-content end -->

    <!-- writer start  -->
    <div class="writer">
        <div class="writer-img">
            <h1>Joyful and beautiful adventure. It will take you to landscapes never seen before!</h1>

            <div class="writer-content">
                <img src="{{ asset($product->writer_image) }}" alt="">
                <div>
                    <h3>{{ $product->writer }}</h3>
                    <p>Writer</p>
                </div>
            </div>
        </div>
    </div>
    <!-- writer end  -->

    <!-- more book start -->
    <div class="more-book">
        <h1>More From <span>{{ $product->writer }}</span></h1>
        <div class="more-book-section">
            @foreach ($more_products as $ind => $book)
            <style>
                .image-{{ $ind }},
                .image-{{ $ind }}::before {
                    background-image: url("{{ asset($book->image) }}");
                    background-size: cover;
                    background-repeat: no-repeat;
                }
            </style>
            <div class="book-card">
                <a href="{{ route('book.details', $book->slug) }}">
                    <div class="container">
                        <div class="image image-{{ $ind }}"></div>
                    </div>
                </a>
                <a href="{{ route('book.details', $book->slug) }}">
                    <h2>{{ $book->name }}</h2>
                </a>
                <div class="span">
                    @if ($book->discount > 0)
                        <span>${{ $book->price - $book->discount }}</span>
                        <del>${{ $book->price }}</del>
                    @else
                        <span>${{ $book->price }}</span>
                    @endif
                </div>
                <a class="add-to-cart" href="{{ route('add.to.cart', $book->id) }}">ADD TO CART</a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- more book end -->

    <!-- Reviews start -->
    <div class="reviews">
        <h1>Reviews</h1>
        <p>There are no reviews yet.</p>
    </div>
    <!-- Reviews end -->

    <!-- add Reviews start -->
    <div class="add-reviews">
        <h1>Add a review</h1>
        <p>Your email address will not be published. Required fields are marked *</p>
    </div>
    {{-- <div class="rating">
        <p>Your rating</p>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
    </div> --}}
    <div class="rate">
        <select id="rate">
            <option value="rate" selected>Rate...</option>
            <option value="Perfect">Perfect</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="bad">Not that bad</option>
            <option value="poor">Very poor</option>
        </select>
    </div>
    <div class="review-details">
        <p>Your review *</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <p>Name *</p>
        <input type="text" name="" id="">
        <p>Email *</p>
        <input type="text" name="" id="">
    </div>
    <div class="checkbox">
        <input type="checkbox" name="" id="checkbox">
        <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</p>
    </div>
    <div class="sub-btn"><button>Submit</button></div>
    <!--add Reviews end -->

    <!-- Related products start -->
    <div class="related-products">
        <h1>Related products</h1>
        <div class="related-products-section">
            @foreach ($cat_products as $key => $item)
            <style>
                .image{{ $key }},
                .image{{ $key }}::before {
                    background-image: url("{{ asset($item->image) }}");
                    background-size: cover;
                    background-repeat: no-repeat;
                }
            </style>
            <div class="book-card">
                <a href="{{ route('book.details', $item->slug) }}">
                    <div class="container">
                        <div class="image image{{ $key }}"></div>
                    </div>
                </a>
                <a href="{{ route('book.details', $item->slug) }}">
                    <h2>{{ $item->name }}</h2>
                </a>
                <div class="span">
                    @if ($item->discount > 0)
                        <span>${{ $item->price - $item->discount }}</span>
                        <del>${{ $item->price }}</del>
                    @else
                        <span>${{ $item->price }}</span>
                    @endif
                </div>
                <a class="add-to-cart" href="{{ route('add.to.cart', $item->id) }}">ADD TO CART</a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- related products end -->
</div>
<!-- full-book-details-page end -->
@endsection

@push("web-js")

<script>
    function IncrementDecrement(value){
       var val = $(".inc-dec").find("span").text()
       if((+val+value) !=  0){
           $(".inc-dec").find("span").text(+val+value)
           $("#qty").val(+val+value)
       } 
    }
</script>

@endpush