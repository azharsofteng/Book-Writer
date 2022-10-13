@extends('layouts.web_master')
@section('title', 'Home')
@push('web-css')
    
@endpush
@section('web-content')
<!-- all categories start -->
<div class="allcategories">
    <div class="categories-top">
        <h1>Book Shelves <span>with</span> Our Categories </h1>
    </div>
    <div class="categorise-content">
        @foreach($categories as $category)
        
        <div class="categorise-blog">
            @if($loop->odd) 
            <div>
                <h1>{{ $category->name }}</h1>
                <span>{{ $category->title }}</span>
                <p>{{ $category->description }}</p>
                <button class="cat-btn"><a href="{{ route('shop', $category->id) }}">View Books</a></button>
            </div>
            @else 
            <div>
                <img src="{{ $category->image }}" alt="">
            </div>
            @endif

            @if($loop->odd) 
            <div>
                <img src="{{ $category->image }}" alt="">
            </div>
            @else 
            <div>
                <h1>{{ $category->name }}</h1>
                <span>{{ $category->title }}</span>
                <p>{{ $category->description }}</p>
                <button class="cat-btn"><a href="{{ route('shop', $category->id) }}">View Books</a></button>
            </div>
            @endif
     
        </div>
        @endforeach
    </div>
</div>
<!-- all categories end -->
@endsection