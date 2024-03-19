<?php
ob_start();
?>

<div class="actualitesManager">
    <h2>Gestion des actualités</h2>
    <a href="/">Nouvelle actualités</a>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>