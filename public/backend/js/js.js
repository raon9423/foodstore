// modal form help
// get the modal help
var modalhelp = document.getElementById('modalhelp');
// get the that opens the mmodal help
// var a = document.getElementById('helpcenter')
function openhelp() {
    modalhelp.style.display = "block"
};
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modalhelp) {
        modalhelp.style.display = "none";
    }
};
// close modal help
function closehelp() {
    modalhelp.style.display = "none"
};
// modal products on mobile 
var nav = document.getElementById("sidenav");
function openNav() {
    nav.style.display = "block";
}
function closeNav() {
    nav.style.display = "none";
}
// go to top
let gototop = document.getElementById("gototop");
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        gototop.style.display = "block";
    } else {
        gototop.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// carousel-br 
const carousel = document.querySelector(".carousel-br"),
    firstImg = document.querySelectorAll(".carousel-br img")[0];
arrowIcons = document.querySelectorAll(".wrapper-img i");

let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth + 14;
let scrollWidth = carousel.scrollWidth - carousel.clientWidth;
// const showHideIcons = () => 
// {
//   arrowIcons[0].style.display=carousel.scrollLeft ==0 ? "none" : "block";
//   arrowIcons[1].style.display=carousel.scrollLeft == scrollWidth? "none" : "block";
// }
arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        carousel.scrollLeft += icon.id == "btn-left" ? -firstImgWidth : firstImgWidth;
        // setTimeout(() => showHideIcons(),60);
    });
});

const autoSlide = () => {
    if (carousel.scrollLeft == (carousel.scrollWidth - carousel.clientWidth))
        return;
    positionDiff = Math.abs(positionDiff);
    let firstImgWidth = firstImg.clientWidth + 14;
    let valDifference = firstImgWidth - positionDiff;
    if (carousel.scrollLeft > prevScrollLeft) {
        return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;

    }
    carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff;

}
const dragStart = (e) => {
    isDragStart = true;
    prevPageX = e.pageX || e.touches[0].pageX;
    prevScrollLeft = carousel.scrollLeft;
}
const dragging = (e) => {
    if (!isDragStart) return;
    e.preventDefault();
    isDragging = true;
    carousel.classList.add("dragging");
    let positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff;
    showHideIcons();
}
const dragStop = () => {
    isDragStart = false;
    carousel.classList.remove("dragging");

    if (!isDragging) return;
    isDragging = false;
    autoSlide();
}


carousel.addEventListener("mousdown", dragStart)
carousel.addEventListener("touchstart", dragStart);

carousel.addEventListener("mousemove", dragging)
carousel.addEventListener("touchmove", dragging);

carousel.addEventListener("mouseup", dragStop)
carousel.addEventListener("mouseleave", dragStop)
carousel.addEventListener("touchend", dragStop);
// hide and show faq
var x = document.getElementsByClassName("btn-acc");
var i;
for (i = 0; i < x.length; i++) {
    x[i].addEventListener("click", function () {
        this.classList.toggle("activeplus");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
    )
}
// animation scroll
function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        var elementVisible = 150;

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
        }
    }
}
window.addEventListener("scroll", reveal);
// 
var modal = document.getElementById("tutorial");
function open() {
    modal.style.display = "block";
}
function close() {
    modal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}