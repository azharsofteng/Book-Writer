@extends('layouts.web_master')
@section('title', 'About Us')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush
@section('web-content')
<!-- about-head start -->
<div class="about-head">
    <div class="about-head-img">
        <img src="{{ asset($about->image) }}" alt="about_me-girl">
    </div>
    <div class="about-head-content">
        <h1>hello.</h1>
        <h2>I'm {{ $about->name }}</h2>
        <p>{{ $about->cover_letter }}</p>
        <div class="about-head-so-icon">
            <a href="{{ $about->facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="{{ $about->twitter }}"><i class="fa-brands fa-twitter"></i></a>
            <a href="{{ $about->instagram }}"><i class="fa-brands fa-instagram"></i></a>
            <a href="{{ $about->google }}"><i class="fa-brands fa-google-plus-g"></i></a>
        </div>
    </div>
</div>
<!-- about-head end -->

<!-- about mid start -->
<div class="about-mid">
    <img src="./Image/black-leaf.png" alt="">
    <h2>"You usually have to wait for that which is worth <br /> waiting for."</h2>
    <h3>CRAIG BRUCE</h3>
</div>
<!-- about mid end -->

<!-- Biography start -->
<div class="biography">
    <div class="biography-content">
        <h1>Biography</h1>
        <p>{{ $about->biography }}</p>
        <img src="{{ asset($about->signature) }}" alt="gloria_signature">
    </div>
    <div class="biography-faq">
        <div class="accordion" onclick="myFunction1()">
            <h2>About My Books</h2>
            <i class="fa-solid fa-chevron-right rotate1"></i>
        </div>
        <div class="panel">
            <p>{{ $about->about_books }}</p>
        </div>
        <div class="accordion" onclick="myFunction2()">
            <h2>Want to Meet Me?</h2>
            <i class="fa-solid fa-chevron-right rotate2"></i>
        </div>
        <div class="panel">
            <p>{{ $about->want_meet }}</p>
        </div>
        <div class="accordion" onclick="myFunction3()">
            <h2>Inspirations</h2>
            <i class="fa-solid fa-chevron-right rotate3"></i>
        </div>
        <div class="panel">
            <p>{{ $about->inspiration }}</p>
        </div>
    </div>
</div>
<!-- Biography end -->
@endsection