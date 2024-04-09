<?php
ob_start();
?>

<div class="histoire_du_club">
    <h2 class="title">L'histoire du club</h2>
    <div>
        <img src="../assets/images/histoire-du-club.jpg" alt="Maison">
        <p>Notre club associatif est situé à Rillieux la pape, sur un terrain boisé, ombragé et en pleine nature et il
            fonctionne grâce à nos bénévoles !
            <br>
            <br>
            Nous avons la chance d’avoir un terrain de détente, un terrain réservé aux chiots et un grand terrain
            d’éducation.
            <br>
            <br>
            Nous sommes affiliés à l’Association Canine Territoriale Rhône Alpes.
            <br>
            <br>
            Notre club a une belle histoire puisqu’il existe depuis 1959 ce qui fait de lui un des plus vieux clubs
            canins en Rhône Alpes !

        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';
?>