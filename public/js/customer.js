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




// toggol sub-menu
function myFunction() {
    var element = document.querySelector(".sub-menu");
    element.classList.toggle("sub-menu-resp");
 }
// toggol sub-menu
function myFunction2() {
    var element = document.querySelector(".sub-menu2");
    element.classList.toggle("sub-menu-resp");
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
