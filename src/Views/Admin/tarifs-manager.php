<?php
ob_start();
?>

<div class="manager">
    <a class="return" href="/admin/dashboard/"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th colspan="5">
                        <p>Nos Tarifs</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>Nom du tarif</p>
                    </td>
                    <td>
                        <p>Premier Chien</p>
                    </td>
                    <td>
                        <p>Deuxieme Chien</p>
                    </td>
                    <td>
                        <p>Licence par chien</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Sociétaire 1<span class="suffixes">ère</span> année</p>
                    </td>
                    <td>
                        <p>170€
                    </td>
                    <td>
                        <p>85€
                    </td>
                    <td>
                        <p>22€
                    </td>
                    <td><button class="buttonsDelete delete" data-id="" data-nom=""
                            data-manager="tarifs">Supprimer</button></td>
                </tr>
            </tbody>
        </table>
        <a class="create" href="/admin/tarifs/nouveau_tarif"><i class="fa-solid fa-plus"></i></a>
    </div>
</div>
<div class="confirmDeletion">
    <h2>Voulez-vous vraiment supprimer le tarif "<span id="nom"></span>"</h2>
    <div>
        <button id="annuler">Annuler</button>
        <a id="confirme" class="delete">Confirmer</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>