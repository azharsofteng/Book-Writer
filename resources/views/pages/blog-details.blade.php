@extends('layouts.web_master')
@section('title', 'Blog Details')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
@endpush
@section('web-content')
<div class="full-book-details-page">
    <!-- book-details-head start -->
    <div class="book-details-head">
        <div class="book-details-head-img">
            <img src="{{ asset($blog->image) }}" alt="book-1">
        </div>
        <div class="book-details-head-content">
           
        </div>
    </div>
    <!-- book-details-head end -->

    <!-- book-details-middle-content start -->
    <div class="book-details-middle-content">
        <div class="blog-title">
            <h1>{{ $blog->title }}</h1>
            <p>{{ \Carbon\Carbon::createFromTimestamp(strtotime($blog->date))->format('F, d Y') }}</p>
        </div>
        <div class="book-details-middle-content-1" style="text-align: justify;">
            {!! $blog->description !!}
        </div>
    </div>
    <!-- book-details-middle-content end -->
</div>
@endsection