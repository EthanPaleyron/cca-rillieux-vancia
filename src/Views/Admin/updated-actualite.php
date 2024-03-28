<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/actualites/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un actualité</h2>
        <form action="/updateActualite/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_actualite" value="<?= escape($actualite->getid_actualite()) ?>">
            <input type="text" name="nom_actualite" id="nom_actualite" placeholder="Nom de l'actualité"
                value="<?= escape($actualite->getnom_actualite()) ?>" autocomplete="off">
            <label for="nom_actualite" class="error">
                <?= error("nom_actualite") ?>
            </label>
            <textarea name="description_actualite" id="description_actualite" cols="30" rows="10"
                placeholder="Description de l'actualité"><?= escape($actualite->getdescription_actualite()) ?></textarea>
            <label for="description_actualite" class="error">
                <?= error("description_actualite") ?>
            </label>
            <label for="file" id="labelFile">
                <div class="logoUpdateFile"><i class="fa-solid fa-download"></i></div>
                <img src="/../assets/images/actualites/<?= escape($actualite->getimage_actualite()) ?>"
                    alt="<?= escape(strtotime($actualite->getimage_actualite())) ?>">
            </label>
            <input type="file" name="image_actualite" id="file">
            <?php $date = new DateTime($actualite->getdate_actualite()) ?>
            <input type="date" name="date_actualite" id="date_actualite" placeholder="Nom de l'actualité"
                value="<?= escape($date->format("Y-m-d")) ?>">
            <label for="date_actualite" class="error">
                <?= error("date_actualite") ?>
            </label>
            <button>Modifier l'actualité</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>