<?php
ob_start();
?>

<div class="equipeManager">
    <h2>Gestion de l'équipe</h2>
    <a href="/admin/equipe/nouvelle_equipier">Nouveau membres de l'équipe</a>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>