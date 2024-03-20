<?php
ob_start();
?>

<div class="actualitesManager">
    <h2>Gestion des actualités</h2>
    <a href="/admin/actualites/nouvelle_actualite">Nouvelle actualités</a>
    <table>
        <tbody>
            <?php foreach ($actualites as $actualite) {
                $date = new DateTime($actualite->getdate_actualite()) ?>
                <tr>
                    <td>
                        <?= escape($actualite->getnom_actualite()) ?>
                    </td>
                    <td>
                        <?= escape($date->format("d/m/Y")) ?>
                    </td>
                    <td>
                        <a href="/admin/actualites/update/<?= escape($actualite->getid_actualite()) ?>/">Modifier</a>
                    </td>
                    <td>
                        <a href="/admin/actualites/delete/<?= escape($actualite->getid_actualite()) ?>/">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>