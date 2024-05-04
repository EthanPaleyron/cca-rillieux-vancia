<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/admins/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Création d'un nouvelle admin</h2>
        <form action="/newAdmin/" method="post" enctype="multipart/form-data">
            <input type="text" name="nom_admin" id="nom_admin" placeholder="Nom de l'admin" autocomplete="off"
                value="<?= old("nom_admin") ?>">
            <label for="nom_admin" class="error">
                <?= error("nom_admin") ?>
            </label>
            <input type="text" name="mdp_admin" id="mdp_admin" placeholder="Mots de passe de l'admin" autocomplete="off"
                value="<?= old("mdp_admin") ?>">
            <label for="mdp_admin" class="error">
                <?= error("mdp_admin") ?>
            </label>
            <div class="content_checkbox">
                <input type="checkbox" name="role_admin" id="role_admin">
                <label for="role_admin">L'ajouter dans le group des super admin</label>
            </div>
            <p>Si vous cochez cette option, il pourra supprimer des posts puis gérer les admins du club !</p>
            <button>Créer l'admin</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>