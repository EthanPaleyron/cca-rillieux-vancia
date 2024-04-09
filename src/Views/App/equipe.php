<?php
ob_start();
?>

<div class="equipe">
    <h2 class="title">Membres du bureau et moniteurs</h2>
    <div>
        <?php foreach ($equipe as $equipier) { ?>
            <article>
                <img src="../assets/images/equipe/<?= escape($equipier->getphoto_equipier()) ?>"
                    alt="<?= escape($equipier->getphoto_equipier()) ?>">
                <h2>
                    <?= escape($equipier->getnom_equipier()) ?>
                </h2>
                <p>
                    <?= escape($equipier->getdescription_equipier()) ?>
                </p>
            </article>
        <?php } ?>
        <!-- <article>
            <img src="../assets/images/equipe/jean-jacques.jpg" alt="Jean Jacques">
            <h2>Jean-Jacques</h2>
            <p>Notre Président et responsable de la section Sauvetage
                Présent depuis 2007 dans le club, il a créé la section sauvetage. Toujours à votre
                écoute et de bons conseils !</p>
        </article>
        <article>
            <img src="../assets/images/equipe/andre.jpg" alt="André">
            <h2>André</h2>
            <p>Vice président
                Une connaissance du club sans pareil, c’est notre sage.</p>
        </article>
        <article>
            <img src="../assets/images/equipe/annabel.jpg" alt="Annabel">
            <h2>Annabel</h2>
            <p>Monitrice chiens adultes et chiens compliqués, responsable des moniteurs et de la section obéissance, et
                secrétaire.
                Détrompez vous ce n’est pas les chiens qu’elle va éduquer, mais leurs maîtres !</p>
        </article>
        <article>
            <img src="../assets/images/equipe/cyrille.jpg" alt="Cyrille">
            <h2>Cyrille</h2>
            <p>Moniteur diplomé "école du chiot" et moniteur sauvetage en compétition
                La douceur, le calme, c’est le chouchou de nos bébés poilus !</p>
        </article>
        <article>
            <img src="../assets/images/equipe/fabrice.jpg" alt="Fabrice">
            <h2>Fabrice</h2>
            <p>Encadrant chiens adultes
                Avec lui c’est fou rire assuré pendant les cours !</p>
        </article>
        <article>
            <img src="../assets/images/equipe/noelle.jpg" alt="Noëlle">
            <h2>Noëlle</h2>
            <p>Trésorière
                Il paraît que sa chienne est la première de la classe en cours ;)</p>
        </article>
        <article>
            <img src="../assets/images/equipe/antonio.jpg" alt="Antonio">
            <h2>Antonio</h2>
            <p>Notre Mc Gyver
                C'est notre homme de l'ombre !
                Une réparation ? Du bricolage ? De l'entretien ? Il sait tout faire !
                C'est également un véritable homme de chien qui pourra être amené à remplacer au pied levé un moniteur
                si necessaire</p>
        </article> -->
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>