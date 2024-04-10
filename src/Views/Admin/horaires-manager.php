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
                        <p>Gestion des horaires</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horaires as $horaire) { ?>
                    <tr>
                        <td>
                            <p>
                                <?= escape($horaire->getheure_horaire()) ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?= escape($horaire->getnom_horaire()) ?>
                            </p>
                        </td>
                        <td>
                            <a class="update"
                                href="/admin/horaire/update/<?= escape($horaire->getid_horaire()) ?>/">Modifier</a>
                        </td>
                        <td>
                            <button class="buttonsDelete delete" data-id="<?= escape($horaire->getid_horaire()) ?>"
                                data-nom="<?= escape($horaire->getnom_horaire()) ?>"
                                data-manager="horaire">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php if (count($horaires) >= 10) { ?>
        <p class="count error">
        <?php } else { ?>
        <p class="count">
        <?php } ?>
        <?= count($horaires) ?> sur 10
    </p>
</div>
<a class="create" href="/admin/horaires/nouvelle_horaire/"><i class="fa-solid fa-plus"></i></a>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer l'horaire "<span id="nom"></span>"</h2>
    <div>
        <a href="/admin/horaires/" id="annuler">Annuler</a>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>