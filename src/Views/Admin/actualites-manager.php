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
                                href="/admin/actualite/update/<?= escape($actualite->getid_actualite()) ?>/">Modifier</a>
                        </td>
                        <td>
                            <button class="buttonsDelete delete" data-id="<?= escape($actualite->getid_actualite()) ?>"
                                data-nom="<?= escape($actualite->getnom_actualite()) ?>"
                                data-manager="actualite">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<a class="create" href="/admin/actualites/nouvelle_actualite/"><i class="fa-solid fa-plus"></i></a>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer l'actualité "<span id="nom"></span>"</h2>
    <div>
        <a href="/admin/actualites/" id="annuler">Annuler</a>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>