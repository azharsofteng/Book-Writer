@extends('layouts.web_master')
@section('title', 'Home')
@push('web-css')
    <style>
        header {
            background: url('{{ $banner->image }}') no-repeat center center;
            background-size: cover;
            height: 100vh;
        }
    </style>
@endpush
@section('web-content')
<!-- Nav-Bar End-->
<header>
    <!-- head-title start -->
    <div class="head-title">
        <h1>Hello <br> I'm <span>Dr. Iftekhar Ahmed Shams</span></h1>
        <h6>{{ $banner->title }}</h6>
        <p>{{ $banner->sub_title }}</p>
        <div class="head-btn">
            <button><a href="{{ $banner->btn_url }}" class="head-btn1">Latest Books</a></button>
            {{-- <button><a href="#" class="head-btn2">Buy Theme</a></button> --}}
        </div>
    </div>
    <!-- head-title end -->
</header>
<!-- midel-content-one start-->
<div class="midel-content-one">
    <img src="images/black-leaf.png" alt="black-leaf">
    <h5>"The best of you are those who gain and share knowledge with others."</h5>
    <p>“Dr. Shams”</p>
</div>
<!-- midel-content-one end -->

<!-- book-list start -->
<div class="book-list">
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
            <div class="container">
                <a href="{{ route('book.details', $book->slug) }}">
                    <div class="image image{{ $key }}" ></div>
                </a>
            </div>
            <h2>{{ $book->name }}</h2>
            <div class="span">
                @if ($book->discount > 0)
                <span>${{ $book->price - $book->discount }}</span>
                <del>${{ $book->price }}</del>
                @else
                <span>${{ $book->price }}</span>
                @endif
            </div>
            <a href="{{ route('add.to.cart', $book->id) }}">ADD TO CART</a>
        </div>
        @empty
        <div class="book-card">
            <div class="container">
                <div class="image image2"></div>
            </div>
            <h2>Little Explorers</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$13.00</del>
            </div>
            <a href="#">ADD TO CART</a>
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
            <a href="#">BUY PRODUCT</a>
        </div>
        @endforelse
    </div>
    @if ($new_book)
    <div class="books-library">
        <div>
            <p>{{ $new_book->name }}.</p>
            <h1>Newest Books in <br> Our Library</h1>
            <p>{{ Str::limit($new_book->short_details, 200, '...') }}</p>
            <button><a href="{{ route('shop') }}">View All Books</a></button>
        </div>
    </div>
    @endif
</div>
<!-- book-list end -->

<!-- best-sellers start -->
<div class="hr">
    <div class="hr2"></div>
</div>
<div class="best-sellers">
    <div>
        <h1>Shop Our <br> Best Sellers</h1>
        <p>See the Books People Read the Most</p>
    </div>
    <div>
        <p class="best-sellers-content">When the human being dies, his deeds end except for three: ongoing charity, beneficial knowledge, or a righteous child who prays for him.</p>
    </div>
</div>
<!-- best-sellers end -->

<!-- owl-carousel start -->
<div class="owl-carousel owl-theme">
    @forelse ($products as $key => $item)
    <div class="item">
    <style>
        .image{{ $key }},
        .image{{ $key }}::before {
            background-image: url("{{ $item->image }}");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
        <div class="container">
            <div class="image image{{ $key }}"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>{{ $item->name }}</h2>
            <div class="span">
                @if ($item->discount > 0)
                    <span>${{ $item->price -  $item->discount }}</span>
                    <del>${{ $item->price }}</del>
                @else
                    <span>${{ $item->price }}</span>
                @endif
            </div>
            <a href="{{ route('product.checkout', $item->id) }}">BUY PRODUCT</a>
        </div>
    </div>
    @empty
    <div class="item">
        <div class="container">
            <div class="image"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Glittering Stars</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image2"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Little Explorers</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    @endforelse
</div>
<!-- owl-carousel end -->

<!-- Featured Book start -->
@if (isset($featured))
<div class="featured-book">
    <style>
        .image7,
        .image7::before {
            background-image: url('{{ $featured->image }}');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <div class="featured-book-content">
        <p>{{ $featured->name }}</p>
        <h1>Featured Book</h1>
        <p>THE STORY</p>
        <p>{{ $featured->short_details }}</p>
        <p>ABOUT THE BOOK</p>
        <div>
            {!! Str::limit($featured->details, 350, '...') !!}
        </div>
        <button><a href="{{ route('book.details', $featured->slug) }}"> Learn More</a></button>
    </div>
    <div class="featured-book-img">
        
        <div class="featured-book-card">
            <div class="container featured-book-img-con">
                <div class="image image7"></div>
            </div>
            <h2>{{ $featured->name }}</h2>
            <div class="span">
                @if ($featured->discount > 0)
                <span>${{ $featured->price - $featured->discount }}</span>
                <del>${{ $featured->price }}</del>
                @else
                <span>${{ $featured->price }}</span>
                @endif
                
            </div>
            <div class="featured-book-img-con-btn">
                <a href="{{ route('book.details', $featured->slug) }}" class="featured-book-img-con-btn1">Read the Book</a>
                <a href="{{ route('add.to.cart', $featured->id) }}" class="featured-book-img-con-btn2">ADD TO CART</a>
            </div>
        </div>
    </div>
</div>
@endif
<!-- Featured Book end -->

<!-- Product-content start -->
{{-- <div class="product-content">
    <div class="product-card shipping">
        <p class="head-p">FREE SHIPPING</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
    <div class="product-card delivery">
        <p class="head-p">48 HOURS DELIVERY</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
    <div class="product-card returns">
        <p class="head-p">FREE RETURNS</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
</div> --}}
<!-- Product-content end -->

<!-- Fantasy-Reading-Adventure start -->
<div class="fantasy-reading-adventure">
    @foreach ($categories as $category)
    <div class="fantasy">
        <a href="{{ route('shop', $category->id) }}">
            <div class="fantasy-img">
                <img src="{{ asset($category->image) }}" alt="">
            </div>
            <div class="fantasy-img-content">
                <h1>{{ $category->name }}</h1>
                <p>{{ $category->products->count(); }} Items</p>
            </div>
        </a>
    </div>
    @endforeach
    {{-- <div class="reading">
        <a href="#">
            <div class="reading-img">
                <img src="images/reading.jpg" alt="">
            </div>
            <div class="reading-img-content">
                <h1>Reading on The Move</h1>
                <p>Tips and Tricks</p>
            </div>
        </a>
    </div> --}}
    
</div>
<!-- Fantasy-Reading-Adventure end -->


<!-- signature start -->
{{-- <div class="signature start">
    <p>Created with only one goal in mind.To be your <b> <u> only choice </u> </b> <br> for the web presence of your
        book.</p>
    <img src="images/signature.png" alt="">
</div> --}}
<!-- signature end -->
@endsection