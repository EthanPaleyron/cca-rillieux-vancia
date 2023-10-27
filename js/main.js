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
const carrousel = document.querySelector("#carrousel");
const titleCarrousel = document.querySelector("#titleCarrousel");
const description = document.querySelector("#description");
const infosCarrousel = [
  {
    img: "public/tree.jpg",
    titre: "Activité 1",
    description:
      "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, deleniti animi, quidem suscipit tempora sequi dicta excepturi, alias neque inventore doloremque enim voluptate at modi aliquid molestias odio consequuntur? Recusandae?",
  },
  {
    img: "public/image-attractive.jpg",
    titre: "Activité 2",
    description:
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum provident officiis magni odio consequuntur inventore sequi suscipit. Praesentium atque, quibusdam ipsa explicabo iure dolore maxime fugit amet, nostrum itaque exercitationem.",
  },
  {
    img: "public/digital_camera.jpg",
    titre: "Activité 3",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor explicabo modi quidem iusto excepturi magnam tempora, eos culpa repellat aspernatur sint incidunt neque deleniti tenetur, nemo laboriosam? Aliquam, explicabo deserunt.",
  },
];

let index = 0;
document.querySelector("#arrowLeft").addEventListener("click", () => {
  index--;
  if (index < 0) {
    index = infosCarrousel.length - 1;
  }
  carrousel.src = infosCarrousel[index].img;
  titleCarrousel.textContent = infosCarrousel[index].titre;
  description.textContent = infosCarrousel[index].description;
});
document.querySelector("#arrowRight").addEventListener("click", () => {
  index++;
  if (index > infosCarrousel.length - 1) {
    index = 0;
  }
  carrousel.src = infosCarrousel[index].img;
  titleCarrousel.textContent = infosCarrousel[index].titre;
  description.textContent = infosCarrousel[index].description;
});
