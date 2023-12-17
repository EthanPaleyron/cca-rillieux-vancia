const aside = document.querySelector("aside");
let moveSizeAside;
function mediaQueryAside() {
  if (window.matchMedia("(min-width: 1040px)").matches) {
    moveSizeAside = 19;
  } else if (window.matchMedia("(max-width: 1040px)").matches) {
    moveSizeAside = 15;
  }
}
mediaQueryAside();
document.querySelector("#closeAside").addEventListener("click", () => {
  aside.style.transform = `translateX(${moveSizeAside}rem)`;
});
document.querySelector("#openAside").addEventListener("click", () => {
  if (aside.style.transform === `translateX(${moveSizeAside}rem)`) {
    aside.style.transform = "translateX(0)";
  } else {
    aside.style.transform = `translateX(${moveSizeAside}rem)`;
  }
});
addEventListener("resize", () => {
  if (window.matchMedia("(min-width: 1040px)").matches) {
    moveSizeAside = 19;
    aside.style.transform = `translateX(${moveSizeAside}rem)`;
  } else if (window.matchMedia("(max-width: 1040px)").matches) {
    moveSizeAside = 15;
    aside.style.transform = `translateX(${moveSizeAside}rem)`;
  }
});
let i = parseInt(localStorage.getItem("newPerson"));
if (!i) {
  localStorage.setItem("newPerson", 1);
  aside.style.transform = "translateX(0)";
} else {
  aside.style.transform = `translateX(${moveSizeAside}rem)`;
}
