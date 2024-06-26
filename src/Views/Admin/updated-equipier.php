<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/equipe/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un équipié</h2>
        <form action="/updateEquipier/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_equipier" value="<?= escape($equipierSelectionner->getid_equipier()) ?>">
            <input type="hidden" name="position_equipier"
                value="<?= escape($equipierSelectionner->getordre_equipier()) ?>">
            <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom de l'équipié"
                value="<?= escape($equipierSelectionner->getnom_equipier()) ?>" autocomplete="off">
            <label for="nom_equipier" class="error">
                <?= error("nom_equipier") ?>
            </label>
            <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
                placeholder="Description de l'équipié"><?= escape($equipierSelectionner->getdescription_equipier()) ?></textarea>
            <label for="description_equipier" class="error">
                <?= error("description_equipier") ?>
            </label>
            <label for="file" id="labelFile">
                <div class="logoUpdateFile"><i class="fa-solid fa-download"></i></div>
                <img src="/../assets/images/equipe/<?= escape($equipierSelectionner->getphoto_equipier()) ?>"
                    alt="<?= escape($equipierSelectionner->getphoto_equipier()) ?>">
            </label>
            <input type="file" name="photo_equipier" id="file" require>
            <div>
                <label for="ordre_equipier">Position de l'équipié : </label>
                <select name="ordre_equipier" id="ordre_equipier">
                    <option value="0">En premier</option>
                    <?php foreach ($equipe as $key => $equipier) {
                        if ($equipier->getordre_equipier() !== escape($equipierSelectionner->getordre_equipier())) { // Si il n'est pas egale a l'equipier qu'on modifie on l'affiche
                            if ($equipier->getordre_equipier() + 1 == escape($equipierSelectionner->getordre_equipier())) { ?>
                                <option selected value="<?= escape($equipier->getordre_equipier()) + 1 ?>">
                                <?php } else { ?>
                                <option value="<?= escape($equipier->getordre_equipier()) + 1 ?>">
                                <?php } ?>
                                Après
                                <?= escape($equipier->getnom_equipier()) ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <button>Modifier l'équipié</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>