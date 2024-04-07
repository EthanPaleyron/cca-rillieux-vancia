<?php
ob_start();
?>

<div class="nos_actualites">
    <section>
        <h2 class="title">Nos actualités</h2>
        <div class="actualites">
            <?php if (count($actualites) === 0) { ?>
                <p>Aucune actualités trouvé.</p>
            <?php } ?>
            <?php foreach ($actualites as $actualite) {
                $date = new DateTime($actualite->getdate_actualite()) ?>
                <article>
                    <div class="content_article">
                        <img src="/assets/images/actualites/<?= escape($actualite->getimage_actualite()) ?>"
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
    <?php $n_boucle = 0 ?>
    <ul>
        <?php if ($n_page !== 1) { ?>
            <li><a href="/actualites/page/<?= $n_page - 1 ?>/"><i class="fa-solid fa-chevron-left"></i></i></a></li>
        <?php } else { ?>
            <li><a href="/actualites/page/<?= $n_pages ?>/"><i class="fa-solid fa-chevron-left"></i></a></li>
        <?php } ?>
        <?php $maxPagination = 3;
        if ($n_page >= $maxPagination && $n_page == $n_pages) {
            $start = $n_page - 2;
        } else if ($n_page >= $maxPagination) {
            $start = $n_page - 1;
        } else {
            $start = 1;
        }
        for ($i = $start; $i <= $n_pages; $i++) {
            $n_boucle++ ?>
            <?php if ($n_boucle <= $maxPagination) { ?>
                <?php if ($i === $n_page) { ?>
                    <li><a href="/actualites/page/<?= $i ?>/" class="selected">
                            <?= $i ?>
                        </a></li>
                <?php } else { ?>
                    <li><a href="/actualites/page/<?= $i ?>/">
                            <?= $i ?>
                        </a></li>
                <?php } ?>
            <?php } ?>
            <?php if ($n_page <= $n_pages - 2 && $n_boucle === 3) { ?>
                <li>
                    <p>...</p>
                </li>
            <?php } ?>
        <?php } ?>
        <?php if ($n_page <= $n_pages - 2 && $n_boucle >= 3) { ?>
            <?php if ($n_pages === $n_page) { ?>
                <li><a href="/actualites/page/<?= $n_pages ?>/" class="selected">
                        <?= $n_pages ?>
                    </a></li>
            <?php } else { ?>
                <li><a href="/actualites/page/<?= $n_pages ?>/">
                        <?= $n_pages ?>
                    </a></li>
            <?php } ?>
        <?php } ?>
        <?php if ($n_page != $n_pages) { ?>
            <li><a href="/actualites/page/<?= $n_page + 1 ?>/"><i class="fa-solid fa-chevron-right"></i></a></li>
        <?php } else { ?>
            <li><a href="/actualites/page/<?= 1 ?>/"><i class="fa-solid fa-chevron-right"></i></a></li>
        <?php } ?>
    </ul>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>