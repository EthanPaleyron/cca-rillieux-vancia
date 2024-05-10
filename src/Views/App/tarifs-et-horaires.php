<?php
ob_start();
?>

<div class="tarifs_horaires_map">
    <div class="tarifs_horaires">
        <article class="tarifs">
            <h2 class="title">Les Tarifs et Horaires</h2>
            <p class="tarifs_p">TARIFS 2023 - 2024 (septembre à Juin) Cotisation et Licence CUN CBC 2024 (22€)</p>
            <table>
                <thead>
                    <tr>
                        <th colspan="4" class="title">Nos Tarifs</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>1er Chien</td>
                        <td>2 ème Chien</td>
                        <td>Licence par chien</td>
                    </tr>
                    <?php foreach ($tarifs as $tarif) { ?>
                        <tr>
                            <td>
                                <?= escape($tarif->getnom_tarif()) ?>
                            </td>
                            <td>
                                <?= escape($tarif->gettarif_premier_chien()) ?> €
                            </td>
                            <td>
                                <?= escape($tarif->gettarif_deuxieme_chien()) ?> €
                            </td>
                            <td>
                                <?= escape($tarif->gettarif_par_chien()) ?> €
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="content_detail">
                <p class="details">Pour les inscriptions en cours d'année, tarif dégressif.<br> Nous contacter pour
                    avoir les détails.<br><br>Documents à prévoir :</p>
                <ul class="list_document">
                    <li>Copie de la carte ICAD</li>
                    <li>Copie du carnet de santé (vaccination à jour)</li>
                    <li>Attestation d'assurance responsabilité civile</li>
                </ul>
            </div>
        </article>
        <article class="horaires">
            <h2 class="title">Nos Horaires</h2>
            <h3>Samedi</h3>
            <ul>
                <?php if (!empty($horairesMatin)) { ?>
                    <li>
                        <h4>Matin</h4>
                    </li>
                <?php } ?>
                <?php foreach ($horairesMatin as $horaire) { ?>
                    <li>
                        <p><i class="fa-solid fa-paw"></i><span class="heures"><?= $horaire->getheure_horaire() ?></span>
                            <?= $horaire->getnom_horaire() ?></p>
                    </li>
                <?php } ?>
                <?php if (!empty($horairesApresMidi)) { ?>
                    <li>
                        <h4>Après Midi</h4>
                    </li>
                <?php } ?>
                <?php foreach ($horairesApresMidi as $horaire) { ?>
                    <li>
                        <p><i class="fa-solid fa-paw"></i><span class="heures"><?= $horaire->getheure_horaire() ?></span>
                            <?= $horaire->getnom_horaire() ?></p>
                    </li>
                <?php } ?>
            </ul>
        </article>
    </div>
    <section class="map">
        <h2 class="title">Lieu</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2779.78012924726!2d4.896945999999999!3d45.835684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4bfcd131ca4c9%3A0xce32bfbd2714d803!2s1180%20Chem.%20de%20Sathonay%20Village%2C%2069140%20Rillieux-la-Pape!5e0!3m2!1sfr!2sfr!4v1704388453470!5m2!1sfr!2sfr"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade" title="Chemin de Sathonay Village, Rillieux-la-Pape"
            aria-label="Découvrez le charmant Chemin de Sathonay Village à Rillieux-la-Pape, un quartier pittoresque situé dans la région de Lyon, en France. Profitez de son atmosphère paisible et de ses rues bordées d'arbres tout en explorant ce quartier historique. Avec ses maisons traditionnelles et son ambiance conviviale, le Chemin de Sathonay Village est un lieu idéal pour une promenade relaxante ou pour découvrir l'histoire locale."></iframe>
        <div>
            <label>L'adresse du club :</label>
            <a href="https://maps.app.goo.gl/XK9MeULifXSRpfpeA" target="_blank"><i
                    class="fa-solid fa-location-dot"></i>1180 Chemin de Sathonay
                Village – Vancia</a>
        </div>
    </section>
    <section class="contactez_nous">
        <h2 class="title">Contactez nous dès maintenant !</h2>
        <div>
            <p>Contactez Jean-Jacques Gimaret par téléphone :</p>
            <a href="tel:0611130352"><i class="fa-solid fa-phone"></i>06 11 13 03 52</a>
        </div>
        <p class="ou">OU</p>
        <div>
            <p>Contactez nous par mail :</p>
            <a href="mailto:cca.vancia.secretariat@gmail.com"><i
                    class="fa-solid fa-envelope"></i>cca.vancia.secretariat@gmail.com</a>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>