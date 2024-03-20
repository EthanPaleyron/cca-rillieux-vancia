<?php
ob_start();
?>

<div class="insertion">
    <h2>Creation d'un nouvelle actualité</h2>
    <form action="/newActualite/" method="post" enctype="multipart/form-data">
        <input type="text" name="nom_actualite" id="nom_actualite" placeholder="Nom de l'actualité">
        <label for="nom_actualite">
            <?= error("nom_actualite") ?>
        </label>
        <textarea name="description_actualite" id="description_actualite"
            placeholder="Description de l'actualité"></textarea>
        <label for="description_actualite">
            <?= error("description_actualite") ?>
        </label>
        <input type="file" name="image_actualite" id="image_actualite">
        <button>Ajouter l'actualité</button>
        <small>(L'ancienne actualité sera remplacée par la nouvelle et elle sera toujours visible dans les anciennes
            actualités)</small>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>