<header>
    <!-- Nav-Bar Start-->
    <div class="main">
        <nav>
            <!-- Logo Start-->
            <div class="logo">
                <img src="{{ asset($content->logo) }}" alt="nav-logo">
            </div>
            <!-- Logo End-->

            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fa-solid fa-bars"></i>
            </label>
            <ul class="main-ul">
                <li><a href="#">Home</a></li>
                <li class="sub-item">
                    <a href="#">Pages</a><i class="fa fa-chevron-down"></i>
                    <div class="sub-menu">
                        <ul>
                            <li><a href="#">Workshop</a></li>
                            <li><a href="#">Books Presentation</a></li>
                            <li><a href="#">All Categories</a></li>
                            <li><a href="#">Coming Soon</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="{{ route('about.me') }}">About Me</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Blog</a></li>
                <li class="contact"><a href="#">Content</a></li>
                <li class="nav-right-icon nav-right1 sub-item">
                    <a href="#">
                        <i class="fa-regular fa-user"></i>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="sub-menu sub-menu2">
                        <ul>
                            <li><a href="#">Log In</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-right-icon">
                    <a href="#">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>0</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Nav-Bar End-->

    <!-- head-title start -->
    <div class="head-title">
        <h1>Hello <br> I'm <span>Leona</span></h1>
        <h6>GET THE LATEST BESTSELLERS</h6>
        <p>Leona is a modern and flexible <b> WordPress </b> theme for <b> book writers </b> and authors, featuring
            WooCommerce support</p>
        <div class="head-btn">
            <button><a href="#" class="head-btn1">Latest Books</a></button>
            {{-- <button><a href="#" class="head-btn2">Buy Theme</a></button> --}}
        </div>
    </div>
    <!-- head-title end -->
</header>