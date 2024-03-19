<?php
ob_start();
?>

<div class="tarifsManager">
    <h2>Gestion des tarifs</h2>
    <a href="/">Nouveau tarif</a>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>