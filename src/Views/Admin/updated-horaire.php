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
            <div>
                <input type="number" name="heures1" id="heures1" placeholder="heures"
                    value="<?= escape($heuresMinutes[0]) ?>">
                <p> H </p>
                <input type="number" name="minutes1" id="minutes1" placeholder="minutes"
                    value="<?= escape($heuresMinutes[1]) ?>">
                <p> ET </p>
                <?php if (isset($heuresMinutes[2])) { ?>
                    <input type="number" name="heures2" id="heures2" placeholder="heures"
                        value="<?= escape($heuresMinutes[2]) ?>">
                <?php } else { ?>
                    <input type="number" name="heures2" id="heures2" placeholder="heures">
                <?php } ?>
                <p> H </p>
                <?php if (isset($heuresMinutes[3])) { ?>
                    <input type="number" name="minutes2" id="minutes2" placeholder="minutes"
                        value="<?= escape($heuresMinutes[3]) ?>">
                <?php } else { ?>
                    <input type="number" name="minutes2" id="minutes2" placeholder="minutes">
                <?php } ?>
            </div>
            <label for="heures1" class="error">
                <?= error("message") ?>
            </label>
            <p>Une 2 ème heure n'est pas obligatoire!</p>
            <button>Modifier l'horaire</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>