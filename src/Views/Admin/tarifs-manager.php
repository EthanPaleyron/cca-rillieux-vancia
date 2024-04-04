<?php
ob_start();
?>

<div class="manager">
    <a class="return" href="/admin/dashboard/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th colspan="6">
                        <p>Nos Tarifs</p>
                    </th>
                </tr>
                <tr>
                    <th>
                        <p>Nom du tarif</p>
                    </th>
                    <th>
                        <p>Premier Chien / Deuxieme Chien / Licence par chien</p>
                    </th>
                    <th colspan="2">
                        <p>Modification et suppression</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarifs as $tarif) { ?>
                    <tr>
                        <td>
                            <p>
                                <?= $tarif->getnom_tarif() ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?= $tarif->gettarif_premier_chien() ?> € /
                                <?= $tarif->gettarif_deuxieme_chien() ?> € /
                                <?= $tarif->gettarif_par_chien() ?> €
                            </p>
                        </td>
                        <td>
                            <a class="update" href="/admin/tarif/update/<?= $tarif->getid_tarif() ?>/">Modifier</a>
                        </td>
                        <td><button class="buttonsDelete delete" data-id="<?= $tarif->getid_tarif() ?>"
                                data-nom="<?= $tarif->getnom_tarif() ?>" data-manager="tarif">Supprimer</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<a class="create" href="/admin/tarifs/nouveau_tarif/"><i class="fa-solid fa-plus"></i></a>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer l'actualité "<span id="nom"></span>"</h2>
    <div>
        <a href="/admin/tarifs/" id="annuler">Annuler</a>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>