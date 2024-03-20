<?php
ob_start();
?>

<div class="updated">
    <h2>Modification d'un actualité</h2>
    <form action="/updateActualite/" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_actualite" value="<?= $actualite->getid_actualite() ?>">
        <input type="text" name="nom_actualite" id="nom_actualite" placeholder="Nom de l'actualité"
            value="<?= $actualite->getnom_actualite() ?>">
        <label for="nom_actualite">
            <?= error("nom_actualite") ?>
        </label>
        <textarea name="description_actualite" id="description_actualite" cols="30" rows="10"
            placeholder="Description de l'actualité"><?= $actualite->getdescription_actualite() ?></textarea>
        <label for="description_actualite">
            <?= error("description_actualite") ?>
        </label>
        <input type="file" name="image_actualite" id="image_actualite">
        <img src="/../assets/images/actualites/<?= $actualite->getimage_actualite() ?>"
            alt="<?= $actualite->getimage_actualite() ?>">
        <button>Modifier l'actualité</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>