<?php
ob_start();
?>

<div class="insert">
    <h2>Creation d'un nouvelle équipier</h2>
    <form action="newEquipier" method="post" enctype="multipart/form-data">
        <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom equipier de l'equipier"
            value="<?= old("nom_equipier") ?>">
        <label for="nom_equipier">
            <?= error("nom_equipier") ?>
        </label>
        <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
            placeholder="Description de l'equipier"><?= old("description_equipier") ?></textarea>
        <label for="description_equipier">
            <?= error("description_equipier") ?>
        </label>
        <input type="file" name="photo" id="photo">
        <button>Ajouter</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>