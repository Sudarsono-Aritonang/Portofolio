// togle responsive
const navSlide = () => {
  const burger = document.querySelector(".burger");
  const navList = document.querySelector("nav");

  burger.addEventListener("click", () => {
    navList.classList.toggle("nav-active");
    burger.classList.toString("toggle-burger");
  });
};
navSlide();
// function addPaddingToMenu(home) {
//   var home = document.getElementById(home);
//   if (home) {
//     home.style.padding = "20px";
//   }
// }

//active
let sections = document.querySelectorAll("section");
let navLinks = document.querySelectorAll(".right-nav a");

window.onscroll = () => {
  sections.forEach((sec) => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 50;
    let height = sec.offsetHeight;
    let id = sec.getAttribute("id");

    if (top >= offset && top < offset + height) {
      navLinks.forEach((links) => {
        links.classList.remove("active");
        document.querySelector(".right-nav a[href*=" + id + "]").classList.add("active");
      });
    }
  });
};
