<?php
ob_start();
?>

<div class="equipe">
    <h2 class="title">Membres du bureau et moniteurs</h2>
    <div>
        <?php foreach ($equipe as $equipier) { ?>
            <article>
                <img src="../assets/images/equipe/<?= escape($equipier->getphoto_equipier()) ?>"
                    alt="<?= escape($equipier->getphoto_equipier()) ?>">
                <h2>
                    <?= escape($equipier->getnom_equipier()) ?>
                </h2>
                <p>
                    <?= escape($equipier->getdescription_equipier()) ?>
                </p>
            </article>
        <?php } ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>