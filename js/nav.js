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
addEventListener("resize", () => {
  if (window.matchMedia("(min-width: 768px)").matches) {
    lists.style.display = "flex";
    menu.classList.add("opened");
  } else {
    lists.style.display = "none";
    menu.classList.remove("opened");
  }
});

const liElements = document.querySelectorAll(".other_page.no_selected");
liElements.forEach((li) => {
  li.addEventListener("click", function () {
    const selectedElement = document.querySelector(".other_page.selected");
    if (selectedElement) {
      selectedElement.classList.remove("selected");
      selectedElement.classList.add("no_selected");
    }
    this.classList.remove("no_selected");
    this.classList.add("selected");
  });
});
// document.querySelector("#anciennesActualites").addEventListener("click", () => {
//   const selectedElement = document.querySelector(".other_page.selected");
//   selectedElement.classList.remove("selected");
//   selectedElement.classList.add("no_selected");
// });
document.querySelector("#moreInfo").addEventListener("click", () => {
  const selectedElementMoreInfo = document.querySelector(
    ".other_page.selected"
  );
  selectedElementMoreInfo.classList.remove("selected");
  selectedElementMoreInfo.classList.add("no_selected");
  liElements[0].classList.remove("no_selected");
  liElements[0].classList.add("selected");
  console.log(liElements);
});
