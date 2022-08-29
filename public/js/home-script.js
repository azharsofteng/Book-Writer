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


// faq hide show
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}



// faq-icon-toggle
function myFunction1() {
    var element = document.querySelector(".rotate1");
    element.classList.toggle("fa-chevron-right-rotate1");
 }
function myFunction2() {
    var element = document.querySelector(".rotate2");
    element.classList.toggle("fa-chevron-right-rotate2");
 }
function myFunction3() {
    var element = document.querySelector(".rotate3");
    element.classList.toggle("fa-chevron-right-rotate3");
 }