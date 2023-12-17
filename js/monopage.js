function hideElements() {
  document.querySelector(".asideAccueil").style.display = "none";
  document.querySelector(".accueil").style.display = "none";
  document.querySelector(".header").style.display = "none";
}

document
  .getElementById("tarifsHoraires")
  .addEventListener("click", function (e) {
    e.preventDefault();
    loadContent("pages/tarifs-et-horaires.html");
    hideElements();
  });
document.getElementById("moreInfo").addEventListener("click", function (e) {
  e.preventDefault();
  loadContent("pages/tarifs-et-horaires.html");
  hideElements();
});

document.getElementById("HistoireClub").addEventListener("click", function (e) {
  e.preventDefault();
  loadContent("pages/histoire-du-club.html");
  hideElements();
});

document.getElementById("equipe").addEventListener("click", function (e) {
  e.preventDefault();
  loadContent("pages/equipe.html");
  hideElements();
});

document
  .getElementById("anciennesActualites")
  .addEventListener("click", function (e) {
    e.preventDefault();
    loadContent("pages/nos-actualites.html");
    hideElements();
  });

function loadContent(page) {
  fetch(page)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById("mainContent").innerHTML = data;
    })
    .catch((error) => {
      console.error("Erreur : ", error);
    });
}
