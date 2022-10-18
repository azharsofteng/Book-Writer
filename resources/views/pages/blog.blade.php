@extends('layouts.web_master')
@section('title', 'Blog')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endpush
@section('web-content')
<!-- blog start -->
<div class="blog">
    <h1>Blog</h1>
    <div class="main-blog">
        @forelse ($blogs as $blog)
        <div class="main-full-blog">
            <img src="{{ asset($blog->image) }}" alt="">
            <div class="main-blog-content">
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
                <div class="main-blog-footer">
                    <a href="{{ route('blog.details', $blog->slug) }}"><button>Read More</button></a>
                    {{-- <a href="#" class="blog-writing">WRITING</a> --}}
                </div>
            </div>
        </div>
        @empty
        <div class="main-full-blog">
            <img src="./Image/happy_leaf__commission__by_nieris_dazqyfb-fullview-1000x600.jpg" alt="">
            <div class="main-blog-content">
                <div class="blog-name-date">
                    <a href="#">
                        <h1>The Most Interesting Book Characters</h1>
                    </a>
                    <p>JANUARY 28, 2019</p>
                </div>
                <hr>
                <p class="blog-desc">Shores of the cosmic ocean. Hearts of the stars. Vanquish the impossible
                    Sea of
                    Tranquility sed quia
                    non numquam eius modi tempora incidunt ut labore…</p>
                <div class="main-blog-footer">
                    <a href="#"><button>Read More</button></a>
                    <a href="#" class="blog-writing">WRITING</a>
                </div>
            </div>
        </div>
        <div class="main-full-blog">
            <img src="./Image/all-categories.jpg" alt="">
            <div class="main-blog-content">
                <div class="blog-name-date">
                    <a href="#">
                        <h1>The Most Interesting Book Characters</h1>
                    </a>
                    <p>JANUARY 28, 2019</p>
                </div>
                <hr>
                <p class="blog-desc">Shores of the cosmic ocean. Hearts of the stars. Vanquish the impossible
                    Sea of
                    Tranquility sed quia
                    non numquam eius modi tempora incidunt ut labore…</p>
                <div class="main-blog-footer">
                    <a href="#"><button>Read More</button></a>
                    <a href="#" class="blog-writing">WRITING</a>
                </div>
            </div>
        </div>
        <div class="main-full-blog">
            <img src="./Image/autumn_dragon_by_nieris_dbi0nbw-fullview-1000x600.jpg" alt="">
            <div class="main-blog-content">
                <div class="blog-name-date">
                    <a href="#">
                        <h1>The Most Interesting Book Characters</h1>
                    </a>
                    <p>JANUARY 28, 2019</p>
                </div>
                <hr>
                <p class="blog-desc">Shores of the cosmic ocean. Hearts of the stars. Vanquish the impossible
                    Sea of
                    Tranquility sed quia
                    non numquam eius modi tempora incidunt ut labore…</p>
                <div class="main-blog-footer">
                    <a href="./bookDetailsPage.html"><button>Read More</button></a>
                    <a href="#" class="blog-writing">WRITING</a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    {{ $blogs->links('partials.custom-pagination') }}
</div>
<!-- blog end -->
@endsection