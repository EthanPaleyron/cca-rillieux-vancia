<?php
ob_start();
?>

<div class="manager">
    <a class="return" href="/admin/dashboard/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th colspan="4">
                        <p>Gestion des actualités</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actualites as $actualite) {
                    $date = new DateTime($actualite->getdate_actualite()) ?>
                    <tr>
                        <td>
                            <p>
                                <?= escape($actualite->getnom_actualite()) ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?= escape($date->format("d/m/Y")) ?>
                            </p>
                        </td>
                        <td>
                            <a class="update"
                                href="/admin/actualites/update/<?= escape($actualite->getid_actualite()) ?>/">Modifier</a>
                        </td>
                        <td>
                            <a class="delete"
                                href="/admin/actualites/delete/<?= escape($actualite->getid_actualite()) ?>/">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <a class="create" href="/admin/actualites/nouvelle_actualite"><i class="fa-solid fa-plus"></i></a>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>