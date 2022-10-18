 <!-- Nav-Bar Start-->
 <div class="main m-0">
    <nav>
        <!-- Logo Start-->
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset($content->logo) }}" alt="nav-logo">
            </a>
        </div>
        <!-- Logo End-->

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
        </label>
        <ul class="main-ul mb-0">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="sub-item">
                <a href="#" onclick="myFunction()">Pages</a><i class="fa fa-chevron-down"></i>
                <div class="sub-menu">
                    <ul>
                        <li><a href="{{ route('category') }}">Categories</a></li>
                        <li><a href="{{ route('about.me') }}">About Me</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('shop') }}">Shop</a></li>
            <li><a href="{{ route('blogs') }}">Blog</a></li>
            <li><a href="{{ route('gallery') }}">Gallery</a></li>
            <li class="contact"><a href="{{ route('contact') }}">Contact</a></li>
            @guest('customer')
            <li class="nav-right-icon nav-right1 sub-item">
                <a href="#" onclick="myFunction2()">
                    <i class="fa-regular fa-user"></i>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <div class="sub-menu sub-menu2">
                    <ul>
                        <li><a href="{{ route('customer.login') }}">Log In</a></li>
                    </ul>
                </div>
            </li>
            @endguest
            @auth('customer')
            <li class="nav-right-icon nav-right1 sub-item">
                <a href="#" onclick="myFunction2()">
                    <i class="fa-regular fa-user"></i> &nbsp; {{ Auth::guard('customer')->user()->name }}
                    <i class="fa fa-chevron-down"></i>
                </a>
                <div class="sub-menu sub-menu2">
                    <ul>
                        <li><a href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('customer.logout') }}">Log Out</a></li>
                    </ul>
                </div>
            </li>
            @endauth
            <li class="nav-right-icon">
                <a href="{{ Route('shopping.cart') }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>{{ count((array) session('cart')) }}</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- Nav-Bar End-->