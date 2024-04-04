<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/equipe/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un equipier</h2>
        <form action="/updateEquipier/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_equipier" value="<?= $equipierSelectionner->getid_equipier() ?>">
            <input type="hidden" name="position_equipier" value="<?= $equipierSelectionner->getordre_equipier() ?>">
            <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom de l'equipier"
                value="<?= $equipierSelectionner->getnom_equipier() ?>" autocomplete="off">
            <label for="nom_equipier" class="error">
                <?= error("nom_equipier") ?>
            </label>
            <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
                placeholder="Description de l'equipier"><?= $equipierSelectionner->getdescription_equipier() ?></textarea>
            <label for="description_equipier" class="error">
                <?= error("description_equipier") ?>
            </label>
            <label for="file" id="labelFile">
                <div class="logoUpdateFile"><i class="fa-solid fa-download"></i></div>
                <img src="/../assets/images/equipe/<?= $equipierSelectionner->getphoto_equipier() ?>"
                    alt="<?= $equipierSelectionner->getphoto_equipier() ?>">
            </label>
            <input type="file" name="photo_equipier" id="file" require>
            <label for="photo_equipier" class="error">
                <?= error("file") ?>
            </label>
            <div>
                <label for="ordre_equipier">Position de l'equipier : </label>
                <select name="ordre_equipier" id="ordre_equipier">
                    <option value="0">En premier</option>
                    <?php foreach ($equipe as $key => $equipier) {
                        if ($equipier->getordre_equipier() !== $equipierSelectionner->getordre_equipier()) { // Si il n'est pas egale a l'equipier qu'on modifie on l'affiche
                            if ($equipier->getordre_equipier() + 1 == $equipierSelectionner->getordre_equipier()) { ?>
                                <option selected value="<?= $equipier->getordre_equipier() + 1 ?>">
                                <?php } else { ?>
                                <option value="<?= $equipier->getordre_equipier() + 1 ?>">
                                <?php } ?>
                                Après
                                <?= $equipier->getnom_equipier() ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <button>Modifier l'equipier</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>