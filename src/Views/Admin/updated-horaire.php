<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/horaires/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un horaire</h2>
        <form action="/updateHoraire/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_horaire" value="<?= escape($horaireSelectionner->getid_horaire()) ?>">
            <input type="text" name="nom_horaire" id="nom_horaire" placeholder="Nom de l'horaire" autocomplete="off"
                value="<?= escape($horaireSelectionner->getnom_horaire()) ?>">
            <label for="nom_horaire" class="error">
                <?= error("nom_horaire") ?>
            </label>
            <input type="time" name="heure_horaire" id="heure_horaire"
                value="<?= escape($horaireSelectionner->getheure_horaire()) ?>">
            <label for="heure_horaire" class="error">
                <?= error("heure_horaire") ?>
            </label>
            <button>Créer</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>