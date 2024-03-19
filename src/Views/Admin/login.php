<?php
ob_start();
?>

<div class="loginAdmin">
    <h2>Connexion Admin</h2>
    <form action="/adminLogin/" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" id="nom" placeholder="Nom de admin" value="<?= old("nom") ?>">
        <label for="nom">
            <?= error("nom") ?>
        </label>
        <input type="password" name="mdp" id="mdp" placeholder="Mots de passe" value="<?= old("mdp") ?>">
        <button type="button" id="lookThePassword"><i class="fa-solid fa-eye-slash"></i></button>
        <label for="mdp">
            <?= error("mdp") ?>
        </label>
        <button>Connexion</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>