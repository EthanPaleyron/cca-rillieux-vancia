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
                        <td>1<span class="suffixes">er</span> Chien</td>
                        <td>2<span class="suffixes">ème</span> Chien</td>
                        <td>Licence par chien</td>
                    </tr>
                    <tr>
                        <td>Sociétaire 1<span class="suffixes">ère</span> année</td>
                        <td>170€</td>
                        <td>85€</td>
                        <td>22€</td>
                    </tr>
                    <tr>
                        <td>Renouvellement 2<span class="suffixes">ème</span> année</td>
                        <td>130€</td>
                        <td>65€</td>
                        <td>22€</td>
                    </tr>
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
                <li>
                    <h4>Matin</h4>
                </li>
                <li>
                    <p><i class="fa-solid fa-paw"></i><span class="heures">09H30</span> SAUVETAGE (test préalable pour
                        intégrer la
                        section)</p>
                </li>
                <li>
                    <p><i class="fa-solid fa-paw"></i><span class="heures">09H30</span> OBEISSANCE (test préalable pour
                        intégrer la
                        section)</p>
                </li>
                <li>
                    <h4>Après Midi</h4>
                </li>
                <li>
                    <p><i class="fa-solid fa-paw"></i><span class="heures">14H00</span> CHIOTS 1<span
                            class="suffixes">er</span> année
                    </p>
                </li>
                <li>
                    <p><i class="fa-solid fa-paw"></i><span class="heures">15H00</span> CHIOTS 2<span
                            class="suffixes">ème</span> année
                    </p>
                </li>
                <li>
                    <p><i class="fa-solid fa-paw"></i><span class="heures">13H30 et 15h00</span> CHIENS adultes (groupe
                        à définir par
                        les moniteurs selon niveau et
                        attente)</p>
                </li>
            </ul>
        </article>
    </div>
    <section class="map">
        <h2 class="title">Lieu</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2779.78012924726!2d4.896945999999999!3d45.835684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4bfcd131ca4c9%3A0xce32bfbd2714d803!2s1180%20Chem.%20de%20Sathonay%20Village%2C%2069140%20Rillieux-la-Pape!5e0!3m2!1sfr!2sfr!4v1704388453470!5m2!1sfr!2sfr"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
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