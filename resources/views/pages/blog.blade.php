@extends('layouts.web_master')
@section('title', 'Blog')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endpush
@section('web-content')
<!-- blog start -->
<div class="blog">
    <h1>Blog</h1>
    <div class="full-blog">
        <div class="left-blog">
            @foreach ($blogs as $blog)
            <div class="left-full-blog">
                <img src="{{ asset($blog->image) }}" alt="">
                <div class="left-blog-content">
                    <div class="blog-name-date">
                        <a href="#">
                            <h1>{{ $blog->title }}</h1>
                        </a>
                        <p>{{ \Carbon\Carbon::createFromTimestamp(strtotime($blog->date))->format('F, d Y') }}</p>
                    </div>
                    <hr>
                    <div class="blog-desc">
                        {!! Str::limit($blog->description, 200) !!}
                    </div>
                    <div class="left-blog-footer">
                        <a href="#"><button>Read More</button></a>
                        {{-- <a href="#" class="blog-writing">WRITING</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <div class="right-blog">
            
            <input type="text" placeholder="Search...">
            @if ($book)
            <div class="right-blog-book">
                <div>
                    <a href="#">
                        <h4>{{ $book->name }}</h4>
                    </a>
                    @if ($book->discount > 0)
                        <span>${{ $book->price - $book->discount }}</span>
                        <del>${{ $book->price }}</del>
                    @else
                        <span>${{ $book->price }}</span>
                    @endif
                </div>
                <div>
                    <img src="{{ asset($book->image) }}" alt="book">
                </div>
            </div>
            @endif
            <div class="blog-twitter">
                {{-- <h1>Twitter</h1>
                <div class="blog-twitter-content">
                    <p><a href="#">@delimitedIT</a> Hello, Can you please write us through the Support tab on
                        ThremeForest and also include a link to you…</p>
                    <a href="#"> https://t.co/T8aUp6NSMb</a>
                    <a href="#">153 days ago</a>
                </div>
                <div class="blog-twitter-content">
                    <p><a href="#">@delimitedIT</a> Hello, Can you please write us through the Support tab on
                        ThremeForest and also include a link to you…</p>
                    <a href="#"> https://t.co/T8aUp6NSMb</a>
                    <a href="#">153 days ago</a>
                </div>
                <div class="blog-twitter-content">
                    <p><a href="#">@delimitedIT</a> Hello, Can you please write us through the Support tab on
                        ThremeForest and also include a link to you…</p>
                    <a href="#"> https://t.co/T8aUp6NSMb</a>
                    <a href="#">153 days ago</a>
                </div>
                <div class="blog-twitter-content">
                    <p><a href="#">@delimitedIT</a> Hello, Can you please write us through the Support tab on
                        ThremeForest and also include a link to you…</p>
                    <a href="#"> https://t.co/T8aUp6NSMb</a>
                    <a href="#">153 days ago</a>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- blog end -->
@endsection