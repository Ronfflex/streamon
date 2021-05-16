// Slide Navbar effect left and right
var menu_btn = document.querySelector("#menu-btn")
var sidebar = document.querySelector("#sidebar")
var container = document.querySelector("#active-cont")
var menu_btn_right = document.querySelector("#menu-btn-right")
var sidebar_right = document.querySelector("#sidebar-right")
var container_right = document.querySelector("#active-cont")
menu_btn.addEventListener("click", () => {
    sidebar.classList.toggle("active-nav");
    container.classList.toggle("active-cont");
});
menu_btn_right.addEventListener("click", () => {
    sidebar_right.classList.toggle("active-nav-right");
    container_right.classList.toggle("active-cont-right");
});

// Left Navbar animation .svg90 .svg-90
const svg90 = document.querySelector('.svg90');
let svgOpen = false;
svg90.addEventListener('click', () => {
    if(!svgOpen) {
        svg90.classList.add('open');
        svgOpen = true;
    } else {
        svg90.classList.remove('open');
        svgOpen = false;
    }
});

// Theme
const themeButton = document.querySelector('#theme');
let light = false;
themeButton.addEventListener('click', () => {
    console.log("gdik");
    if(!light) {
        themeButton.classList.add('light');
        light = true;
    } else {
        themeButton.classList.remove('light');
        light = false;
    }
});