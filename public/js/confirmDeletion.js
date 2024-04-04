const buttonsDelete = document.querySelectorAll(".buttonsDelete");
const nom = document.querySelector("#nom");
const confirme = document.querySelector("#confirme");
const confirmDeletion = document.querySelector(".confirmDeletion");
const manager = document.querySelector(".manager");
const create = document.querySelector(".create");

buttonsDelete.forEach((buttonDelete) => {
  buttonDelete.addEventListener("click", () => {
    confirme.setAttribute(
      "href",
      `/admin/${buttonDelete.dataset.manager}/delete/${buttonDelete.dataset.id}/`
    );
    nom.textContent = buttonDelete.dataset.nom;
    confirmDeletion.style.display = "flex";
    manager.style.filter = "blur(0.3rem)";
    create.style.display = "none";
    document.querySelectorAll("a").forEach((a) => {
      if (a.id !== "confirme" && a.id !== "annuler") {
        a.addEventListener("click", (e) => {
          e.preventDefault();
        });
      }
    });
  });
});
