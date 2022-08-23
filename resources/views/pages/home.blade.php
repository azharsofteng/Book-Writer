@extends('layouts.web_master')
@section('title', 'Home')
@section('web-content')
<!-- midel-content-one start-->
<div class="midel-content-one">
    <img src="images/black-leaf.png" alt="black-leaf">
    <h5>"Every day is a journey and the journey itself is home."</h5>
    <p>MATSU BASHIO</p>
</div>
<!-- midel-content-one end -->

<!-- book-list start -->
<div class="book-list">
    <div class="books">
        <div class="book-card">
            <div class="container">
                <div class="image"></div>
            </div>
            <h2>Glittering Stars</h2>
            <div class="span">
                <span>$12.00</span>
                <del>$15.00</del>
            </div>
            <a href="#">ADD TO CART</a>
        </div>
        <div class="book-card">
            <div class="container">
                <div class="image image2"></div>
            </div>
            <h2>Little Explorers</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$13.00</del>
            </div>
            <a href="#">ADD TO CART</a>
        </div>
        <div class="book-card">
            <div class="container">
                <div class="image image3"></div>
            </div>
            <h2>Magic Corner</h2>
            <div class="span">
                <span>$15.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>

        <div class="book-card">
            <div class="container">
                <div class="image image4"></div>
            </div>
            <h2>Back Home</h2>
            <div class="span">
                <span>$12.00</span>
                <del>$18.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
        <div class="book-card">
            <div class="container">
                <div class="image image5"></div>
            </div>
            <h2>Bright Skies</h2>
            <div class="span">
                <span>$14.00</span>
                <del>$17.00</del>
            </div>
            <a href="#">ADD TO CART</a>
        </div>
        <div class="book-card">
            <div class="container">
                <div class="image image6"></div>
            </div>
            <h2>Fairy Journey</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="books-library">
        <div>
            <p>Hand Picked Additions.</p>
            <h1>Newest Books in <br> Our Library</h1>
            <p>Its a neighborly day in this beautywood a neighborly day for a beauty. Would you be mine? Could you
                be
                mine. So get a witch’s shawl on a broomstick you can crawl on. Were gonna pay a call on the Addams
                Family? Michael Knight a young loner on a crusade to champion the cause of the innocent.</p>
            <button><a href="#">View All Books</a></button>
        </div>
    </div>
</div>
<!-- book-list end -->

<!-- best-sellers start -->
<div class="hr">
    <div class="hr2"></div>
</div>
<div class="best-sellers">
    <div>
        <h1>Shop Our <br> Best Sellers</h1>
        <p>See the Books People Read the Most</p>
    </div>
    <div>
        <p class="best-sellers-content">Wouldn’t you like to get away? Sometimes you want to go where everybody
            knows your name. And they’re always glad you came. Makin their way the only way they know how.</p>
    </div>
</div>
<!-- best-sellers end -->

<!-- owl-carousel start -->
<div class="owl-carousel owl-theme">
    <div class="item">
        <div class="container">
            <div class="image"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Glittering Stars</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image2"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Little Explorers</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image3"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Magic Corner</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image4"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Back Home</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image5"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Bright Skies</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
    <div class="item">
        <div class="container">
            <div class="image image6"></div>
        </div>
        <div class="owl-carousel-content">
            <h2>Fairy Journey</h2>
            <div class="span">
                <span>$11.00</span>
                <del>$16.00</del>
            </div>
            <a href="#">BUY PRODUCT</a>
        </div>
    </div>
</div>
<!-- owl-carousel end -->

<!-- Featured Book start -->
<div class="featured-book">
    <div class="featured-book-content">
        <p>Hand Picked Additions</p>
        <h1>Featured Book</h1>
        <p>THE STORY</p>
        <p>Wouldn’t you like to get away? Sometimes you want to go where everybody knows your name. And they’re
            always glad you came. Makin their way the only way they know how</p>
        <p>ABOUT SKY KINGDOM</p>
        <p>Love exciting and new. Come aboard were expecting them. Love life’s sweetest reward Let it flow back to
            you. These Happy Days are yours and mine Happy Days. “Movin’ on up to the east side.”</p>
        <button><a href="#"> Learn More</a></button>
    </div>
    <div class="featured-book-img">
        <div class="featured-book-card">
            <div class="container featured-book-img-con">
                <div class="image image7"></div>
            </div>
            <h2>Sky Kingdom</h2>
            <div class="span">
                <span>$12.00</span>
                <del>$18.00</del>
            </div>
            <div class="featured-book-img-con-btn">
                <a href="#" class="featured-book-img-con-btn1">Read the Book</a>
                <a href="#" class="featured-book-img-con-btn2">ADD TO CART</a>
            </div>
        </div>
    </div>
</div>
<!-- Featured Book end -->

<!-- Product-content start -->
<div class="product-content">
    <div class="product-card shipping">
        <p class="head-p">FREE SHIPPING</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
    <div class="product-card delivery">
        <p class="head-p">24 HOURS DELIVERY</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
    <div class="product-card returns">
        <p class="head-p">FREE RETURNS</p>
        <p class="content-p">Check out free shipping options and benefits for the holidays</p>
    </div>
</div>
<!-- Product-content end -->

<!-- Fantasy-Reading-Adventure start -->
<div class="fantasy-reading-adventure">
    <div class="fantasy">
        <a href="#">
            <div class="fantasy-img">
                <img src="images/category_fantasy.jpg" alt="">
            </div>
            <div class="fantasy-img-content">
                <h1>Fantasy</h1>
                <p>3 Items</p>
            </div>
        </a>
    </div>
    <div class="reading">
        <a href="#">
            <div class="reading-img">
                <img src="images/reading.jpg" alt="">
            </div>
            <div class="reading-img-content">
                <h1>Reading on The Move</h1>
                <p>Tips and Tricks</p>
            </div>
        </a>
    </div>
    <div class="adventure">
        <a href="#">
            <div class="adventure-img">
                <img src="images/category_adventure.jpg" alt="">
            </div>
            <div class="adventure-img-content">
                <h1>Adventure</h1>
                <p>4 Items</p>
            </div>
        </a>
    </div>
</div>
<!-- Fantasy-Reading-Adventure end -->


<!-- signature start -->
<div class="signature start">
    <p>Created with only one goal in mind.To be your <b> <u> only choice </u> </b> <br> for the web presence of your
        book.</p>
    <img src="images/signature.png" alt="">
</div>
<!-- signature end -->
@endsection