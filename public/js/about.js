
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
function myAbout() {
    var element = document.querySelector(".rotate1");
    element.classList.toggle("fa-chevron-right-rotate1");
 }
function wantToMeet() {
    var element = document.querySelector(".rotate2");
    element.classList.toggle("fa-chevron-right-rotate2");
 }
function Inspirations() {
    var element = document.querySelector(".rotate3");
    element.classList.toggle("fa-chevron-right-rotate3");
 }