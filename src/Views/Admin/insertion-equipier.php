<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/equipe/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Creation d'un nouvelle équipier</h2>
        <form action="/newEquipier/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_equipier" id="nom_equipier" placeholder="Nom de l'equipier" autocomplete="off"
                value="<?= old("nom_equipier") ?>">
            <label for="nom_equipier" class="error">
                <?= error("nom_equipier") ?>
            </label>
            <textarea name="description_equipier" id="description_equipier" cols="30" rows="10"
                placeholder="Description de l'equipier"><?= old("description_equipier") ?></textarea>
            <label for="description_equipier" class="error">
                <?= error("description_equipier") ?>
            </label>
            <label for="file" id="labelFile">
                <div class="logoInsertFile"><i class="fa-solid fa-download"></i></div>
                <div class="insertFile"></div>
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
                        if ($equipier->getordre_equipier() + 1 === sizeof($equipe)) { // Si c'est le dernier de la liste on le select           ?>
                            <option selected value="<?= $equipier->getordre_equipier() + 1 ?>">
                                Après
                                <?= $equipier->getnom_equipier() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $equipier->getordre_equipier() + 1 ?>">
                                Après
                                <?= $equipier->getnom_equipier() ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <button>Ajouter</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>