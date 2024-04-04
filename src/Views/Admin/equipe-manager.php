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
                            <button class="buttonsDelete delete" data-id="<?= escape($equipier->getid_equipier()) ?>"
                                data-nom="<?= escape($equipier->getnom_equipier()) ?>"
                                data-manager="equipier">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if (count($equipe) >= 50) { ?>
        <p class="count error">
        <?php } else { ?>
        <p class="count">
        <?php } ?>
        <?= count($equipe) ?> sur 50
    </p>
</div>
<a class="create" href="/admin/equipe/nouvelle_equipier/"><i class="fa-solid fa-plus"></i></a>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer l'actualité "<span id="nom"></span>"</h2>
    <div>
        <a href="/admin/equipe/" id="annuler">Annuler</a>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>