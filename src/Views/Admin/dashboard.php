<?php
ob_start();
?>

<div class="dashboard">
    <h2>Tableau de bord</h2>
    <ul>
        <li><a href="/admin/actualites/">Gestion des actualités</a></li>
        <li><a href="/admin/tarifs/">Gestion des tarifs</a></li>
        <li><a href="/admin/equipe/">Gestion de l'équipe</a></li>
    </ul>
    <a class="logout" href="/admin/logout/">Déconnexion</a>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>