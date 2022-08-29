@extends('layouts.web_master')
@section('title', 'Book Details')
@section('web-content')
 <!-- full-book-details-page start -->
 <div class="full-book-details-page">
    <!-- book-details-head start -->
    <div class="book-details-head">
        <div class="book-details-head-img">
            <img src="./Image/book-1.jpg" alt="book-1">
            <div class="book-details-head-icon">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
            </div>
        </div>
        <div class="book-details-head-content">
            <h1>Glittering Stars</h1>
            <p>The Caterpillar and Alice looked at each other for some time in silence: at last the Caterpillar took
                the hookah out of its mouth, and addressed her in a languid, sleepy voice.There seemed to be no use
                in waiting by the little door, so she went back to the table, half hoping she might find another key
                on it, or at any rate a book of rules for shutting people up like telescopes: this time she found a
                little bottle on it.</p>
            <div class="book-details-head-price">
                <span>$12.00</span>
                <del>$15.00</del>
            </div>
            <div class="full-inc-dec">
                <div class="inc-dec">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                </div>
                <div class="add-to-cart-btn">
                    <button>Add to Cart</button>
                </div>
            </div>
            <button class="read-book">Read the Book</button>
        </div>
    </div>
    <!-- book-details-head end -->

    <!-- book-details-middle-content start -->
    <div class="book-details-middle-content">
        <div class="book-details-middle-content-1">
            <p><span class="frist-span"><span class="last-span">T</span></span>he Caterpillar and Alice looked at
                each other for some time in silence: at last the Caterpillar took the hookah out of its mouth, and
                addressed her in a languid, sleepy voice.There seemed to be no use in waiting by the little door, so
                she went back to the table, half hoping she might find another key on it, or at any rate a book of
                rules for shutting people up like telescopes: this time she found a little bottle on it.

                Alice did not quite know what to say to this: so she helped herself to some tea and
                bread-and-butter, and then turned to the Dormouse, and repeated her question. “Why did they live at
                the bottom of a well?”</p>
            <img src="./Image//img_trans.png" alt="img_trans">
        </div>
    </div>
    <div class="book-details-middle-content">
        <div class="book-details-middle-content-2">
            <img src="./Image/trans_img2.png" alt="img_trans">
            <p><span class="frist-span2"><span class="last-span2">A</span></span>lice did not quite know what to say
                to this: so she helped herself to some tea and bread-and-butter, and then turned to the Dormouse,
                and repeated her question. “Why did they live at the bottom of a well?”

                The Caterpillar and Alice looked at each other for some time in silence: at last the Caterpillar
                took the hookah out of its mouth, and addressed her in a languid, sleepy voice.There seemed to be no
                use in waiting by the little door, so she went back to the table, half hoping she might find another
                key on it, or at any rate a book of rules for shutting people up like telescopes: this time she
                found a little bottle on it.</p>
        </div>
    </div>
    <!-- book-details-middle-content end -->

    <!-- writer start  -->
    <div class="writer">
        <div class="writer-img">
            <h1>Joyful and beautiful adventure. It will take you to landscapes never seen before!</h1>

            <div class="writer-content">
                <img src="./Image/kareya-saleh-239146-unsplash.jpg" alt="">
                <div>
                    <h3>Tiffany James</h3>
                    <p>Writer</p>
                </div>
            </div>
        </div>
    </div>
    <!-- writer end  -->

    <!-- more book start -->
    <div class="more-book">
        <h1>More From <span>Home, Sweet Home</span></h1>
        <div class="more-book-section">
            <div class="book-card">
                <div class="container">
                    <div class="image image1"></div>
                </div>
                <h2>Bright Skies</h2>
                <div class="span">
                    <span>$14.00</span>
                    <del>$17.00</del>
                </div>
                <a class="add-to-cart" href="#">ADD TO CART</a>
            </div>
            <div class="book-card">
                <div class="container">
                    <div class="image image2"></div>
                </div>
                <h2>Fairy Journey</h2>
                <div class="span">
                    <span>$11.00</span>
                    <del>$16.00</del>
                </div>
                <a class="add-to-cart" href="#">BUY PRODUCT</a>
            </div>
        </div>
    </div>
    <!-- more book end -->

    <!-- Reviews start -->
    <div class="reviews">
        <h1>Reviews</h1>
        <p>There are no reviews yet.</p>
    </div>
    <!-- Reviews end -->

    <!-- add Reviews start -->
    <div class="add-reviews">
        <h1>Add a review</h1>
        <p>Your email address will not be published. Required fields are marked *</p>
    </div>
    <div class="rating">
        <p>Your rating</p>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
        <i class="fa-regular fa-star"></i>
    </div>
    <div class="rate">
        <select id="rate">
            <option value="rate" selected>Rate...</option>
            <option value="Perfect">Perfect</option>
            <option value="Good">Good</option>
            <option value="Average">Average</option>
            <option value="bad">Not that bad</option>
            <option value="poor">Very poor</option>
        </select>
    </div>
    <div class="review-details">
        <p>Your review *</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <p>Name *</p>
        <input type="text" name="" id="">
        <p>Email *</p>
        <input type="text" name="" id="">
    </div>
    <div class="checkbox">
        <input type="checkbox" name="" id="checkbox">
        <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</p>
    </div>
    <div class="sub-btn"><button>Submit</button></div>
    <!--add Reviews end -->

    <!-- Related products start -->
    <div class="related-products">
        <h1>Related products</h1>
        <div class="related-products-section">
            <div class="book-card">
                <div class="container">
                    <div class="image image1"></div>
                </div>
                <h2>Bright Skies</h2>
                <div class="span">
                    <span>$14.00</span>
                    <del>$17.00</del>
                </div>
                <a class="add-to-cart" href="#">ADD TO CART</a>
            </div>
            <div class="book-card">
                <div class="container">
                    <div class="image image2"></div>
                </div>
                <h2>Fairy Journey</h2>
                <div class="span">
                    <span>$11.00</span>
                    <del>$16.00</del>
                </div>
                <a class="add-to-cart" href="#">BUY PRODUCT</a>
            </div>
        </div>
    </div>
    <!-- related products end -->
</div>
<!-- full-book-details-page end -->
@endsection