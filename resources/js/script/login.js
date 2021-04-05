// Perloader
const fadeTarget = document.querySelector(".preloader");
const baseLoad = document.querySelector(".base-load");
window.addEventListener("load", function () {
    this.scrollTo(0, 0);
    fadeOutEffect(baseLoad, fadeTarget);
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
