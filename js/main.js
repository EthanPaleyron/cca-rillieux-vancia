const menu = document.querySelector("#menu");
const lists = document.querySelector(".lists");
menu.addEventListener("click", () => {
  if (lists.style.display === "flex") {
    lists.style.display = "none";
  } else {
    lists.style.display = "flex";
  }
  menu.classList.toggle("opened");
  menu.setAttribute("aria-expanded", menu.classList.contains("opened"));
});
const aside = document.querySelector("aside");
let moveSizeAside;
let itClosed = false;
function mediaQueryAside() {
  if (window.matchMedia("(min-width: 1040px)").matches) {
    moveSizeAside = 19;
  } else {
    moveSizeAside = 15;
  }
}
document.querySelector("#closeAside").addEventListener("click", () => {
  mediaQueryAside();
  itClosed = true;
  aside.style.transform = `translateX(${moveSizeAside}rem)`;
});
document.querySelector("#openAside").addEventListener("click", () => {
  mediaQueryAside();
  if (itClosed) {
    aside.style.transform = "translateX(0)";
    itClosed = false;
  } else {
    aside.style.transform = `translateX(${moveSizeAside}rem)`;
    itClosed = true;
  }
});
const mediaQuery = addEventListener("resize", () => {
  if (window.matchMedia("(min-width: 768px)").matches) {
    lists.style.display = "flex";
    menu.classList.add("opened");
  } else {
    lists.style.display = "none";
    menu.classList.remove("opened");
  }
  if (window.matchMedia("(min-width: 1040px)").matches && itClosed == true) {
    aside.style.transform = `translateX(19rem)`;
  } else if (
    !window.matchMedia("(min-width: 1040px)").matches &&
    itClosed == true
  ) {
    aside.style.transform = `translateX(15rem)`;
  }
});
let i = parseInt(localStorage.getItem("newPerson"));
if (!i) {
  localStorage.setItem("newPerson", 1);
  aside.style.transform = "translateX(0)";
} else {
  mediaQueryAside();
  aside.style.transform = `translateX(${moveSizeAside}rem)`;
}
console.log(localStorage.getItem("newPerson"));
