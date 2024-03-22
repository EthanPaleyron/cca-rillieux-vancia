<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/equipe/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un equipier</h2>
        <form action="/updateEquipier/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_equipier" value="<?= $equipier->getid_equipier() ?>">
            <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom de l'equipier"
                value="<?= $equipier->getnom_equipier() ?>">
            <label for="nom_equipier">
                <?= error("nom_equipier") ?>
            </label>
            <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
                placeholder="Description de l'equipier"><?= $equipier->getdescription_equipier() ?></textarea>
            <label for="description_equipier">
                <?= error("description_equipier") ?>
            </label>
            <input type="file" name="photo_equipier" id="photo_equipier">
            <img src="/../assets/images/equipe/<?= $equipier->getphoto_equipier() ?>"
                alt="<?= $equipier->getphoto_equipier() ?>">
            <button>Modifier l'equipier</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>