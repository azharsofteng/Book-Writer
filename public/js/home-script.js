//responsiv nav icon toggol
const btn = document.querySelector(".checkbtn");
const icon = document.querySelector(".fa-bars");

btn.onclick = function () {
    if (icon.classList.contains("fa-bars")) {
        icon.classList.replace("fa-bars", "fa-times");
    } else {
        icon.classList.replace("fa-times", "fa-bars");
    }
}




// scroll-active
const nav = document.querySelector("nav");

window.addEventListener("scroll", () => {
    if (window.scrollY >= 50) {
        nav.classList.add('scroll-active');
    }
    else {
        nav.classList.remove('scroll-active');
    }
});


// nav bar active class
$(document).on('click', 'ul li', function () {
    $(this).addClass('active-color').siblings().removeClass('active-color')
})



// Owl Carousel
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})