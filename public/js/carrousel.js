const carrousel = document.querySelector("#carrousel");
const titleCarrousel = document.querySelector("#titleCarrousel");
const sousTitre = document.querySelector("#sousTitre");
const contenues = document.querySelector("#contenues");
const infosCarrousel = [
  {
    img: "education.jpg",
    titre: "Les cours d’éducation Canine",
    contenues: `<h3><i class="fa-solid fa-paw"></i>école du chiot :</h3>
    <p>L'éducation du chiot est la clé de son évolution de ses 3 mois à ses 12 mois. Un petit toutou bien éduqué fera un chien adulte obéissant et agréable à vivre. 
    Il est indispensable de lui apprendre les bonnes bases dès son plus jeune âge, mais à la condition d'employer les bonnes méthodes. Comment éduquer un chiot ? Quand commencer et quels gestes lui enseigner ?</p>
    <h3><i class="fa-solid fa-paw"></i>éducation des chiots :</h3>
    <p>Bonne nouvelle : les chiens apprennent toute leur vie ! Comme nous, ils n'arrêtent pour ainsi dire jamais d'apprendre. Même vieillissants, ils sont en mesure d'apprendre des ordres, des règles et certains comportements, tout comme ils sont capables de prendre des mauvaises habitudes, même à l'âge adulte. 
    Leur éducation ne s'arrête jamais, et il n'est jamais trop tard pour les réeduquer !

    PARTENARIAT AVEC LA SPA : Nous sommes partenaires de la SPA pour les gens qui adoptent un chien chez eux (n'oubliez pas de le précisez lors de votre prise de contact).</p>`,
  },
  {
    img: "sauvetage.jpg",
    titre: "Le Chien de Sauvetage",
    contenues: `<h3><i class="fa-solid fa-paw"></i>Recherche de personnes (soumis à un test d'entrée) :</h3>
    <p>C'est une activité agréee par la Société centrale canine que nous pratiquons en loisir et en compétition. Le principe est simple, une ou plusieurs personnes s'égarent volontairement sur une certaine distance. 
    Après un certain délai le chien grâce à son flair devra, en suivant les indications de son maître, retrouver et identifier la ou les victimes. Cette discipline qui se veut ludique, comprend des épreuves de recherche mais aussi de dextérité telles que porter son chien, passage de passerelles, tunnels... 
    Le sauvetage reste avant tout une des rares disciplines cynophiles qui procure autant pour le conducteur que pour le chien beaucoup d'émotions. 
    Découvrir une personne disparue est l'aboutissement d'une étroite relation patiemment tissée entre le maitre et le chien. 
    Nous avons la chance d'avoir un partenariat avec la Mairie de Rillieux la Pape qui nous permet de bénéficier du fort de Vancia pour les formations et concours.</p>`,
  },
  {
    img: "obeissance.jpg",
    titre: "Obéissance",
    contenues: `<h3><i class="fa-solid fa-paw"></i>Obeissance en compétition (soumis à un test d'entrée) :</h3>
    <p>L'Obéissance peut-être pratiquée par toute personne possédant un chien sociable, quelle que soit sa race ou ses origines.
    Elle révèle la complicité du chien avec son maître et met en valeur ses qualités naturelles. La plupart des races canines y ont accès, l'âge minimum des chiens pour la présentation est de 12 mois.
    Tous les exercices du programme des concours d'Obéissance sont réalisés naturellement par le chien dans la vie de tous tes jours. Il s'assoit, se couche, se lève, se porte en avant, trouve un objet etc... de manière innée et quand bon lui semble !
    La difficulté pour le maître sera de les lui faire faire sur ordre ou commandement en fonction du programme.</p>`,
  },
];
contenues;

let index = 0;
carrousel.src = "../assets/images/activites/" + infosCarrousel[index].img;
titleCarrousel.textContent = infosCarrousel[index].titre;
contenues.innerHTML = infosCarrousel[index].contenues;
document.querySelector("#arrowLeft").addEventListener("click", () => {
  index--;
  if (index < 0) {
    index = infosCarrousel.length - 1;
  }
  contentactivite();
});
document.querySelector("#arrowRight").addEventListener("click", () => {
  index++;
  if (index > infosCarrousel.length - 1) {
    index = 0;
  }
  contentactivite();
});

function contentactivite() {
  carrousel.src = "../assets/images/activites/" + infosCarrousel[index].img;
  titleCarrousel.textContent = infosCarrousel[index].titre;
  contenues.innerHTML = infosCarrousel[index].contenues;
  contenues.scrollTo(0, 0);
}
