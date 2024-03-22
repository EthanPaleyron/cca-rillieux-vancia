<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/tarifs/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Creation d'un nouveau tarif</h2>
        <form action="newTarif" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_tarif" id="nom_tarif" placeholder="Nom du tarif">
            <label for="nom_tarif">
                <?= error("nom_tarif") ?>
            </label>
            <input type="number" name="premier_chien" id="premier_chien" placeholder="Tarif du premier chien">
            <label for="premier_chien">
                <?= error("premier_chien") ?>
            </label>
            <input type="number" name="deuxieme_chien" id="deuxieme_chien" placeholder="Tarif du peuxieme chien">
            <label for="deuxieme_chien">
                <?= error("deuxieme_chien") ?>
            </label>
            <input type="number" name="par_chien" id="par_chien" placeholder="Tarif par chien">
            <label for="par_chien">
                <?= error("par_chien") ?>
            </label>
            <button>Créer</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>