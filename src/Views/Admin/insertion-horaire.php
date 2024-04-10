<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/horaires/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Création d'un nouvelle horaire</h2>
        <form action="/newHoraire/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_horaire" id="nom_horaire" placeholder="Nom de l'horaire" autocomplete="off"
                value="<?= old("nom_horaire") ?>">
            <label for="nom_horaire" class="error">
                <?= error("nom_horaire") ?>
            </label>
            <div>
                <input type="number" name="heures1" id="heures1" placeholder="heures" value="<?= old("heures1") ?>">
                <p> H </p>
                <input type="number" name="minutes1" id="minutes1" placeholder="minutes" value="<?= old("minutes1") ?>">
                <p> ET </p>
                <input type="number" name="heures2" id="heures2" placeholder="heures" value="<?= old("heures2") ?>">
                <p> H </p>
                <input type="number" name="minutes2" id="minutes2" placeholder="minutes" value="<?= old("minutes2") ?>">
            </div>
            <label for="heures1" class="error">
                <?= error("message") ?>
            </label>
            <p>Une 2 ème heure n'est pas obligatoire!</p>
            <button>Créer l'horaire</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>