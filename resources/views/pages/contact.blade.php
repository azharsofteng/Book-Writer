@extends('layouts.web_master')
@section('title', 'Contact Us')
@push('web-css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush
@section('web-content')
<div class="contacts">
    <!-- contact-us start -->
    <div class="contact-us">
        <div class="contact-head">
            <div class="contact-head-left">
                <h1>Contact Us</h1>
                <p>Have a question? Please ask!</p>
            </div>
            <div class="contact-head-right">
                <p>Wouldn’t you like to get away? Sometimes you want to go where everybody knows your name. And they’re
                    always glad you came. Makin their way the only way they know how.</p>
            </div>
        </div>
    </div>
   
   <!-- contact-us end -->


   <!-- map start -->
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.816328213419!2d90.42271981744385!3d23.789554000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5f5f7d97fad%3A0xd3727da1315796d4!2sZealtechBD!5e0!3m2!1sen!2sbd!4v1661670617386!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   <!-- map end -->


    <!-- address-phone-email start -->
    <div class="contact-address-phone-email">
        <div class="contact-address">
            <i class="fa-solid fa-location-dot"></i>
            <h1>Address</h1>
            <p>{{ $content->address }}</p>
        </div>
        <div class="contact-phone">
            <i class="fa-solid fa-mobile-screen-button"></i>
            <h1>Phone</h1>
            <p>{{ $content->phone }}</p>
        </div>
        <div class="contact-email">
            <i class="fa-solid fa-envelope"></i>
            <h1>Email</h1>
            <p>{{ $content->email }}</p>
        </div>
    </div>
   <!-- address-phone-email end -->

    <!-- leaf start -->
    <div class="leaf">
        <img src="./Image//leaf-1_2.png" alt="">
        <hr>
    </div>
    <!-- leaf end -->

    <!-- us-now start -->
    <div class="us-now">
        <h1>write to us now.</h1>
        <p>We are replying in the next 24 hours. Yes, we do!</p>
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="us-now-input">
                <label for="name">Your Name (required)</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Your Email (required)</label>
                <input type="email" name="email" id="email" required>
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject">
                <label for="message">Your Message</label>
                <textarea id="message" name="message"></textarea>
                <button type="submit">Send</button>
            </div>
        </form>
    </div>
    <!-- us-now end -->
</div>
@endsection