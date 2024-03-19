<?php
ob_start();
?>

<div class="actualitesManager">
    <h2>Gestion des actualités</h2>
    <a href="/admin/actualites/nouvelle_actualite">Nouvelle actualités</a>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>