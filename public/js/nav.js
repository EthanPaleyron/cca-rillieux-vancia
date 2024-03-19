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
