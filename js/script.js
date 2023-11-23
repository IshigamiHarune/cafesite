function toggleMenu() {
    const menu = document.querySelector('.menu');
    menu.classList.toggle('show');
}

const menuToggle = document.querySelector('.menu-toggle');
menuToggle.style.display = 'block';

window.onscroll = function () {
    makeSticky();
};

const navbar = document.querySelector('.navbar');
const sticky = navbar.offsetTop;

function makeSticky() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add('sticky');
    } else {
        navbar.classList.remove('sticky');
    }
}
