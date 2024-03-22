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
                        <p>Gestion de l'équipe</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($equipe as $equipier) { ?>
                    <tr>
                        <td>
                            <p>
                                <?= escape($equipier->getnom_equipier()) ?>
                            </p>
                        </td>
                        <td>
                            <a class="update"
                                href="/admin/equipier/update/<?= escape($equipier->getid_equipier()) ?>/">Modifier</a>
                        </td>
                        <td>
                            <a class="delete"
                                href="/admin/equipier/delete/<?= escape($equipier->getid_equipier()) ?>/">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="create" href="/admin/equipe/nouvelle_equipier"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>