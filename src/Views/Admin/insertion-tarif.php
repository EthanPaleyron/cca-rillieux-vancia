<?php
ob_start();
?>

<div class="insert">
    <h2>Creation d'un nouveau tarif</h2>
    <form action="newTarif" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" id="nom" placeholder="nom de l'actualité" value="<?= old("nom") ?>">
        <label for="nom">
            <?= error("nom") ?>
        </label>
        <input type="number" name="premier_chien" id="premier_chien" placeholder="premier_chien de l'actualité"
            value="<?= old("premier_chien") ?>">
        <label for="premier_chien">
            <?= error("premier_chien") ?>
        </label>
        <input type="number" name="deuxieme_chien" id="deuxieme_chien" placeholder="deuxieme_chien de l'actualité"
            value="<?= old("deuxieme_chien") ?>">
        <label for="deuxieme_chien">
            <?= error("deuxieme_chien") ?>
        </label>
        <input type="number" name="par_chien" id="par_chien" placeholder="par_chien de l'actualité"
            value="<?= old("par_chien") ?>">
        <label for="par_chien">
            <?= error("par_chien") ?>
        </label>
        <button>Créer</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>