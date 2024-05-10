<?php
ob_start();
?>

<div class="login">
    <h2>Connexion Admin</h2>
    <form action="/adminLogin/" method="post" enctype="multipart/form-data">
        <input type="text" name="nom" id="nom" placeholder="Nom de admin" value="<?= old("nom") ?>">
        <label for="nom" class="error">
            <?= error("nom") ?>
        </label>
        <div>
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" value="<?= old("mdp") ?>">
            <button type="button" id="lookThePassword" title="Voir le mot de passe"><i
                    class="fa-solid fa-eye-slash"></i></button>
        </div>
        <label for="mdp" class="error">
            <?= error("mdp") ?>
        </label>
        <button class="submit">Connexion</button>
    </form>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>