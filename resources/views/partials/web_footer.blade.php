<!-- footer start -->
<div class="footer">
    <div class="footer-one">
        <h1>{{ $content->name }}</h1>
        <p>{{ $content->short_details }}</p>
    </div>
    <div class="footer-two">
        <h3>Pages</h3>
        <p><a href="{{ route('about.me') }}">About</a></p>
        <p><a href="{{ route('category') }}">Categories</a></p>
        <p><a href="{{ route('shop') }}">Shop</a></p>
        <p><a href="{{ route('blogs') }}">Blog</a></p>
        <p><a href="{{ route('faq') }}">FAQ</a></p>
        <p><a href="{{ route('contact') }}">Contact</a></p>
    </div>
    <div class="footer-three">
        <h3>Newsletter</h3>
        <input type="text" placeholder="Your email address">
        <button><a href="#">Sing up</a></button>
    </div>
</div>
<!-- footer end -->
