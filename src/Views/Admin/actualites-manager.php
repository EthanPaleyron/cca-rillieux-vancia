<?php
ob_start();
?>

<div class="actualitesManager">
    <h2>Gestion des actualités</h2>
    <a href="/admin/actualites/nouvelle_actualite">Nouvelle actualités</a>
    <table>
        <tbody>
            <?php foreach ($actualites as $actualite) { ?>
                <tr>
                    <td>
                        <?= escape($actualite->getnom_actualite()) ?>
                    </td>
                    <td>
                        <?= escape($actualite->getdate_actualite()) ?>
                    </td>
                    <td>
                        <a href="/admin/actualites/show"></a>
                        <a href="/admin/actualites/delete"></a>
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