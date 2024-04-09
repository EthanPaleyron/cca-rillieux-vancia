<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="/scss/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords"
        content="vancia, rillieux-la-pape, rillieux, sathonay, Rhône Alpes, 1180, 69140, 0611130352, cca.vancia.secretariat@gmail.com, 1959, association, club de chien, club, association, activités, activités canines, canines, activités sauvetage, sauvetage, obéissance, chien, chienne, chiens, chiots, cca, education">
    <meta name="description"
        content="Bienvenue au Club du chien d'accompagnement de Rillieux la pape. Nous pratiquons l'éducation canine toutes races, notre club est labélisé Ecole du Chiot. Vous pourrez également pratiquer le sauvetage et l'obéissance en compétition.">
    <meta name="author" content="Paleyron Ethan">
    <meta name="robots" content="index, follow">
    <script src="https://kit.fontawesome.com/2621df78fc.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="/assets/logo.ico" type="image/x-icon">
    <title>Club du chien d'accompagnement</title>
</head>

<body>

    <header>
        <nav>
            <a href="/"><img class="logo" src="/assets/logo.svg" alt="Logo"></a>
            <button id="menu" aria-label="Main Menu">
                <svg width="40" height="40" viewBox="0 0 100 100">
                    <path class="line"
                        d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line" d="M 20,50 H 80" />
                    <path class="line"
                        d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
            <ul class="lists">
                <?php
                class Link
                {
                    public $name;
                    public $url;
                    function __construct($name, $url)
                    {
                        $this->name = $name;
                        $this->url = $url;
                    }
                }
                $links = array(
                    new Link("Accueil", "/"),
                    new Link("Tarifs & Horaires", "/tarifs_horaires/"),
                    new Link("Histoire du club", "/histoire_du_club/"),
                    new Link("L'equipe", "/equipe/"),
                );
                if (isset($page)) {
                    foreach ($links as $link) {
                        if ($link->name === $page) { ?>
                            <li class="other_page selected"><a href="<?= $link->url ?>">
                                    <?= $link->name ?>
                                </a></li>
                        <?php } else { ?>
                            <li class="other_page no_selected"><a href="<?= $link->url ?>">
                                    <?= $link->name ?>
                                </a></li>
                        <?php }
                    }
                } else {
                    foreach ($links as $link) { ?>
                        <li class="other_page no_selected"><a href="<?= $link->url ?>">
                                <?= $link->name ?>
                            </a></li>
                    <?php }
                } ?>
                <li>
                    <ul class="contact">
                        <li><a href="mailto:cca.vancia.secretariat@gmail.com"
                                title="cca.vancia.secretariat@gmail.com"><i class="fa-solid fa-envelope"></i></a>
                        </li>
                        <li><a href="tel:0611130352" title="06 11 13 03 52"><i class="fa-solid fa-phone"></i></a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <?php if (isset($page) && $page === "Accueil") { ?>
            <div class="header">
                <h1>Club du chien d'accompagnement</h1>
                <p>Education Canine et Chiens de Sauvetage<br>Ecole du chiot</p>
            </div>
        <?php } ?>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <?php if ($page === "Accueil" || $page === "Tarifs & Horaires" || $page === "Histoire du club" || $page === "L'equipe") { ?>
        <footer>
            <img class="logo logo_white" src="/assets/logo.svg" alt="Logo">
            <div>
                <!-- <section class="networks">
                <h2>Suivez nous!</h2>
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook"></i>Notre Facebook</a></li>
                    <li><a href=""><i class="fa-brands fa-instagram"></i>Notre Instagram</a></li>
                </ul>
            </section> -->
                <section class="contacts">
                    <h2>Contactez nous!</h2>
                    <ul>
                        <li><a href="tel:0611130352"><i class="fa-solid fa-phone"></i>06 11 13 03
                                52</a></li>
                        <li><a href="mailto:cca.vancia.secretariat@gmail.com"><i
                                    class="fa-solid fa-envelope"></i>cca.vancia.secretariat@gmail.com</a>
                        </li>
                    </ul>
                </section>
            </div>
        </footer>
    <?php } ?>

    <script type="module" src="/js/nav.js"></script>
    <?php if ($page === "Accueil") { ?>
        <script type="module" src="/js/carrousel.js"></script>
        <script type="module" src="/js/aside.js"></script>
    <?php } ?>
    <?php if ($page === "Login") { ?>
        <script type="module" src="/js/password.js"></script>
    <?php } ?>
    <?php if ($page === "Manager") { ?>
        <script type="module" src="/js/confirmDeletion.js"></script>
    <?php } ?>
    <?php if ($page === "Insertion" || $page === "Updated") { ?>
        <script type="module" src="/js/previewImage.js"></script>
    <?php } ?>
</body>

</html>
<?php
unset($_SESSION["error"]);
unset($_SESSION["old"]);