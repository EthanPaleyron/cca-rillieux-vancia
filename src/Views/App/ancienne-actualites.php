<?php
ob_start();
?>

<div class="nos_actualites">
    <section>
        <h2 class="title">Nos actualités</h2>
        <div class="actualites">
            <?php foreach ($actualites as $actualite) {
                $date = new DateTime($actualite->getdate_actualite()) ?>
                <article>
                    <div class="content_article">
                        <img src="../assets/images/actualites/<?= escape($actualite->getimage_actualite()) ?>"
                            alt="<?= escape($actualite->getimage_actualite()) ?>">
                        <div class="title_time">
                            <h2>
                                <?= escape($actualite->getnom_actualite()) ?>
                            </h2>
                            <time datetime="<?= escape($date->format("d/m/Y")) ?>">
                                <?= escape($date->format("d/m/Y")) ?>
                            </time>
                        </div>
                    </div>
                    <p>
                        <?= escape($actualite->getdescription_actualite()) ?>
                    </p>
                </article>
            <?php } ?>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>