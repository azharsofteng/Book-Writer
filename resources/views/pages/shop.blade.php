@extends('layouts.web_master')
@section('title', 'About Us')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endpush
@section('web-content')
 <!-- shop start -->
 <div class="shop">
    <!-- shop-head start -->
    <div class="shop-head">
        <div class="shop-head-content">
            <h1>Shop</h1>
            <p>Browse Our Fine Book Collection</p>
        </div>
    </div>
    <!-- shop-head end -->
    <div class="shop-main-content">
        <ul>
            <li>Default</li>
            <li>Popular</li>
            <li>Rating</li>
            <li>Newest</li>
        </ul>
        <div class="shop-book">
            <div class="books">
                @forelse ($products as $key => $book)
                <style>
                    .image{{ $key }},
                    .image{{ $key }}::before {
                        background-image: url("{{ $book->image }}");
                        background-size: cover;
                        background-repeat: no-repeat;
                    }
                </style>
                <div class="book-card">
                    <a href="{{ route('book.details', $book->slug) }}">
                        <div class="container">
                            <div class="image image{{ $key }}"></div>
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
                @empty
                <div class="book-card">
                    <a href="./bookDetailsPage.html">
                        <div class="container">
                            <div class="image"></div>
                        </div>
                    </a>
                    <a href="./bookDetailsPage.html">
                        <h2>Glittering Stars</h2>
                    </a>
                    <div class="span">
                        <span>$12.00</span>
                        <del>$15.00</del>
                    </div>
                    <a class="add-to-cart" href="#">ADD TO CART</a>
                </div>
                @endforelse
            </div>
        </div>
        <div class="next-prev">
            <ul>
                <li><a href="#"><i class="fa-solid fa-angles-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#"><i class="fa-solid fa-angles-right"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- shop end -->
@endsection