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
const mediaQuery = window.matchMedia("(min-width: 768px)");
function handleMediaQueryChange(mediaQuery) {
  if (mediaQuery.matches) {
    lists.style.display = "flex";
    menu.classList.add("opened");
  }
}
handleMediaQueryChange(mediaQuery);
mediaQuery.addListener(handleMediaQueryChange);
