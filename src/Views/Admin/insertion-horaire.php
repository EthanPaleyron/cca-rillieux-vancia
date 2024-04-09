<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/horaires/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Creation d'un nouvelle horaire</h2>
        <form action="/newHoraire/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_horaire" id="nom_horaire" placeholder="Nom de l'horaire" autocomplete="off"
                value="<?= old("nom_horaire") ?>">
            <label for="nom_horaire" class="error">
                <?= error("nom_horaire") ?>
            </label>
            <input type="time" name="heure_horaire" id="heure_horaire" value="<?= old("heure_horaire") ?>">
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