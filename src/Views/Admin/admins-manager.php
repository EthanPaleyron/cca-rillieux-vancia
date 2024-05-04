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
                        <p>Gestion de l'admins</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admins as $admin) { ?>
                    <tr>
                        <td>
                            <p>
                                <?= escape($admin->getnom_admin()) ?>
                                <?php if (escape($admin->getrole_admin()) == 1) { ?>
                                    👑
                                <?php } ?>
                            </p>
                        </td>
                        <td>
                            <a class="update" href="/admin/admins/update/<?= escape($admin->getid_admin()) ?>/">Modifier</a>
                        </td>
                        <td>
                            <button class="buttonsDelete delete" data-id="<?= escape($admin->getid_admin()) ?>"
                                data-nom="<?= escape($admin->getnom_admin()) ?>" data-manager="admin">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <p class="count">
        <?= count($admins) ?>
        <?php if (count($admins) <= 1) { ?>
            admin
        <?php } else { ?>
            admins
        <?php } ?>
    </p>
</div>
<a class="create" href="/admin/admins/nouvelle_admin/"><i class="fa-solid fa-plus"></i></a>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer l'actualité "<span id="nom"></span>"</h2>
    <div>
        <a href="/admin/admins/" id="annuler">Annuler</a>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>