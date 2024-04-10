<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/tarifs/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Création d'un nouveau tarif</h2>
        <form action="/newTarif/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_tarif" id="nom_tarif" placeholder="Nom du tarif" autocomplete="off"
                value="<?= old("nom_tarif") ?>">
            <label for="nom_tarif" class="error">
                <?= error("nom_tarif") ?>
            </label>
            <input type="number" name="premier_chien" id="premier_chien" placeholder="Tarif du premier chien"
                value="<?= old("premier_chien") ?>">
            <label for="premier_chien" class="error">
                <?= error("premier_chien") ?>
            </label>
            <input type="number" name="deuxieme_chien" id="deuxieme_chien" placeholder="Tarif du deuxieme chien"
                value="<?= old("deuxieme_chien") ?>">
            <label for="deuxieme_chien" class="error">
                <?= error("deuxieme_chien") ?>
            </label>
            <input type="number" name="par_chien" id="par_chien" placeholder="Tarif par chien"
                value="<?= old("par_chien") ?>">
            <label for="par_chien" class="error">
                <?= error("par_chien") ?>
            </label>
            <div>
                <label for="ordre_tarif">Position du tarif : </label>
                <select name="ordre_tarif" id="ordre_tarif">
                    <option value="0">En premier</option>
                    <?php foreach ($tarifs as $key => $tarif) {
                        if ($tarif->getordre_tarif() + 1 === sizeof($tarifs)) { // Si c'est le dernier de la liste on le select              ?>
                            <option selected value="<?= $tarif->getordre_tarif() + 1 ?>">
                                Après
                                <?= $tarif->getnom_tarif() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $tarif->getordre_tarif() + 1 ?>">
                                Après
                                <?= $tarif->getnom_tarif() ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </div>
            <button>Créer le tarif</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>