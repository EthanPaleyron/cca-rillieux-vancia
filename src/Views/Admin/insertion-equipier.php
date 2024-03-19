<?php
ob_start();
?>

<div class="insert">
    <h2>Creation d'un nouvelle équipier</h2>
    <form action="newActualite" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" id="nom" placeholder="Nom de la personne" value="<?= old("nom") ?>">
        <label for="nom">
            <?= error("nom") ?>
        </label>
        <textarea name="description" id="description" cols="30" rows="10"
            placeholder="Description de la personne"><?= old("description") ?></textarea>
        <label for="description">
            <?= error("description") ?>
        </label>
        <input type="file" name="photo" id="photo">
        <button>Ajouter</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>