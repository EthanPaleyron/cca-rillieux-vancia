<?php
ob_start();
?>

<div class="form">
    <a class="return" href="/admin/admins/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <h2>Modification d'un admin</h2>
        <form action="/updateAdmin/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_admin" value="<?= escape($adminSelectionner->getid_admin()) ?>">
            <input type="text" name="nom_admin" id="nom_admin" placeholder="Nom de l'admin"
                value="<?= escape($adminSelectionner->getnom_admin()) ?>" autocomplete="off">
            <label for="nom_admin" class="error">
                <?= error("nom_admin") ?>
            </label>
            <input name="mdp_admin" id="mdp_admin" placeholder="Réinitialiser le mot de passe">
            <label for="mdp_admin" class="error">
                <?= error("mdp_admin") ?>
            </label>
            <div class="content_checkbox">
                <?php if (escape($adminSelectionner->getrole_admin()) == 1) { ?>
                    <input type="checkbox" name="role_admin" id="role_admin" checked>
                <?php } else { ?>
                    <input type="checkbox" name="role_admin" id="role_admin">
                <?php } ?>
                <label for="role_admin">Ajouter au admin principaux</label>
            </div>
            <p>Si vous cochez cette option, il pourra supprimer des posts puis gérer les admins !</p>
            <button>Modifier l'admin</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>