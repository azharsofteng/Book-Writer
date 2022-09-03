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
                <div class="book-card">
                    <div class="container">
                        <div class="image image2"></div>
                    </div>
                    <h2>Little Explorers</h2>
                    <div class="span">
                        <span>$11.00</span>
                        <del>$13.00</del>
                    </div>
                    <a class="add-to-cart" href="#">ADD TO CART</a>
                </div>
                <div class="book-card">
                    <div class="container">
                        <div class="image image3"></div>
                    </div>
                    <h2>Magic Corner</h2>
                    <div class="span">
                        <span>$15.00</span>
                        <del>$16.00</del>
                    </div>
                    <a class="add-to-cart" href="#">BUY PRODUCT</a>
                </div>
    
                <div class="book-card">
                    <div class="container">
                        <div class="image image4"></div>
                    </div>
                    <h2>Back Home</h2>
                    <div class="span">
                        <span>$12.00</span>
                        <del>$18.00</del>
                    </div>
                    <a class="add-to-cart" href="#">BUY PRODUCT</a>
                </div>
                <div class="book-card">
                    <div class="container">
                        <div class="image image5"></div>
                    </div>
                    <h2>Bright Skies</h2>
                    <div class="span">
                        <span>$14.00</span>
                        <del>$17.00</del>
                    </div>
                    <a class="add-to-cart" href="#">ADD TO CART</a>
                </div>
                <div class="book-card">
                    <div class="container">
                        <div class="image image6"></div>
                    </div>
                    <h2>Fairy Journey</h2>
                    <div class="span">
                        <span>$11.00</span>
                        <del>$16.00</del>
                    </div>
                    <a class="add-to-cart" href="#">BUY PRODUCT</a>
                </div>
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