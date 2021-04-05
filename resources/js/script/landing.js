// Perloader
const fadeTarget = document.querySelector(".preloader");
const baseLoad = document.querySelector(".base-load");
window.addEventListener("load", function () {
    this.scrollTo(0, 0);
    fadeOutEffect(baseLoad, fadeTarget);
});
// Navbar Shrink
const navbar = document.querySelector(".navbar");
window.addEventListener("scroll", function () {
    if (this.scrollY > 0) {
        navbar.classList.add("navbar-shrink");
    } else {
        navbar.classList.remove("navbar-shrink");
    }
});

/*--------------------
Responsive
 ---------------------*/
// Navbar Collapse When link was clicked
const nav = document.querySelectorAll(".nav-link");
const navCollapse = document.querySelector(".navbar-collapse");
nav.forEach((element) => {
    element.addEventListener("click", function () {
        navCollapse.classList.remove("show");
        navCollapse.classList.add("hide");
    });
});
/*--------------------
Functions
 ---------------------*/
function fadeOutEffect(baseLoad, fadeTarget) {
    let fadeEffect = setInterval(() => {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }

        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.1;
        } else {
            clearInterval(fadeEffect);
            baseLoad.classList.remove("preloader");
        }
    }, 80);
}
