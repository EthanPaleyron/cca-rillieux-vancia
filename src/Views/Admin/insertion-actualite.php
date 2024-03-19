<?php
ob_start();
?>

<div class="insert">
    <h2>Creation d'un nouvelle actualité</h2>
    <form action="newActualite" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" id="nom" placeholder="nom de l'actualité" value="<?= old("nom") ?>">
        <label for="nom">
            <?= error("nom") ?>
        </label>
        <textarea name="description" id="description" cols="30" rows="10"
            placeholder="Description de l'actualité"><?= old("description") ?></textarea>
        <label for="description">
            <?= error("description") ?>
        </label>
        <input type="file" name="image" id="image">
        <button>Ajouter l'actualité</button>
        <small>(L'ancienne actualité sera remplacée par la nouvelle et elle sera toujours visible dans les anciennes
            actualités)</small>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>