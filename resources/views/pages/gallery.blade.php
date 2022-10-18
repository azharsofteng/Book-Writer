@extends('layouts.web_master')
@section('title', 'Gallery')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://web7b.com/demo/colorbox.css"> --}}
@endpush
@section('web-content')
<div class="gallery">
    <div class="gallery-top">
        <h1>Our Gallery </h1>
    </div>
    <div class="gallery-container">
        @forelse ($galleries as $gallery)
        <div class="container__img-holder">
            <img src="{{ asset($gallery->image) }}" alt="Image" />
        </div>
        @empty
        <div class="container__img-holder">
            <img src="./image/happy_leaf__commission__by_nieris_dazqyfb-fullview-1000x600.jpg" alt="Image" />
        </div>
        <div class="container__img-holder">
            <img src="./image/nieris_db2yeph-fullview-1300x753_62ffd9ec3b4e7.jpg" alt="Image" />
        </div>
        <div class="container__img-holder">
            <img src="./image/autumn_dragon_by_nieris_dbi0nbw-fullview-1000x600.jpg" alt="Image" />
        </div>
        <div class="container__img-holder">
            <img src="./image/happy_leaf__commission__by_nieris_dazqyfb-fullview-1000x600.jpg" alt="Image" />
        </div>
        <div class="container__img-holder">
            <img src="./image/nieris_db2yeph-fullview-1300x753_62ffd9ec3b4e7.jpg" alt="Image" />
        </div>
        @endforelse
    </div>
    
    <div class="img-popup">
        <img src="" alt="Popup Image" />
        <div class="close-btn">
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
</div>
@endsection
@push('web-js')
<script src="{{ asset('js/gallery.js') }}"></script>
@endpush