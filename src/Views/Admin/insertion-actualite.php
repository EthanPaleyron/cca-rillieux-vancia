<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/actualites/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Creation d'une nouvelle actualité</h2>
        <form action="/newActualite/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_actualite" id="nom_actualite" placeholder="Nom de l'actualité"
                autocomplete="off" value="<?= old("nom_actualite") ?>">
            <label for="nom_actualite" class="error">
                <?= error("nom_actualite") ?>
            </label>
            <textarea name="description_actualite" id="description_actualite"
                placeholder="Description de l'actualité"><?= old("description_actualite") ?></textarea>
            <label for="description_actualite" class="error">
                <?= error("description_actualite") ?>
            </label>
            <label for="file" id="labelFile">
                <div class="logoInsertFile"><i class="fa-solid fa-download"></i></div>
                <div class="insertFile"></div>
            </label>
            <input type="file" name="image_actualite" id="file" require>
            <label for="image_actualite" class="error">
                <?= error("file") ?>
            </label>
            <small>(L'ancienne actualité sera remplacée par la nouvelle et elle sera toujours visible dans les anciennes
                actualités)</small>
            <button>Ajouter l'actualité</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>