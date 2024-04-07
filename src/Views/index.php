<?php
ob_start();
?>

<aside class="asideAccueil">
    <button id="openAside"><i class="fa-solid fa-circle-info"></i></button>
    <div>
        <h2>Salut toi!</h2>
        <button id="closeAside"><i class="fa-regular fa-circle-xmark"></i></button>
    </div>
    <p>Viens chercher tes renseignements plus rapidement en passant directement par ici 😁</p>
    <ul class="contact">
        <li><a href="mailto:cca.vancia.secretariat@gmail.com" title="cca.vancia.secretariat@gmail.com"><i
                    class="fa-solid fa-envelope"></i></a></li>
        <li><a href="tel:0611130352" title="06 11 13 03 52"><i class="fa-solid fa-phone"></i></a></li>
    </ul>
</aside>

<main id="mainContent">
    <div class="accueil">
        <section class="actualite">
            <h2 class="title">Actualités</h2>
            <article>
                <div class="content_article">
                    <img src="../assets/images/actualites/<?= escape($actualite->getimage_actualite()) ?>"
                        alt="<?= escape($actualite->getimage_actualite()) ?>">
                    <div class="title_time">
                        <h2>
                            <?= escape($actualite->getnom_actualite()) ?>
                        </h2>
                        <?php $date = new DateTime($actualite->getdate_actualite()) ?>
                        <time datetime="<?= escape($date->format("d/m/Y")) ?>">
                            <?= escape($date->format("d/m/Y")) ?>
                        </time>
                    </div>
                </div>
                <p>
                    <?= escape($actualite->getdescription_actualite()) ?>
                </p>
            </article>
            <a href="/actualites/page/1/">Voir les anciennes actualités</a>
        </section>

        <section class="activiter">
            <h2 class="title">Nos Activités</h2>
            <article>
                <div class="content_carrousel">
                    <img id="carrousel" src="../assets/images/activites/education.jpg" alt="Activiter">
                    <div class="arrows">
                        <button id="arrowLeft"><i class="fa-solid fa-chevron-left"></i></button>
                        <button id="arrowRight"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <div class="content_title_description">
                    <h2 id="titleCarrousel"></h2>
                    <div id="contenues"></div>
                </div>
            </article>
        </section>
        <div class="more_info">
            <a href="/tarifs_horaires/">Obtenir plus d'infos ?</a>
        </div>
    </div>
</main>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>