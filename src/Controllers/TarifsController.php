<?php
namespace Project\Controllers;

class TarifsController extends Controller
{
    public function showTarifHoraire(): void
    {
        $tarifs = $this->tarifsManager->getTarifs();
        $horairesMatin = $this->horairesManager->getHorairesMatin();
        $horairesApresMidi = $this->horairesManager->getHorairesApresMidi();
        $page = "Tarifs & Horaires";
        require VIEWS . "App/tarifs-et-horaires.php";
    }
    public function newTarif(): void
    {
        $this->validator->validate([
            "nom_tarif" => ["required", "max:30"],
            "premier_chien" => ["required", "min:1", "numeric"],
            "deuxieme_chien" => ["required", "min:1", "numeric"],
            "par_chien" => ["required", "min:1", "numeric"],
            "ordre_tarif" => ["required", "numeric"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            // Va reccuperer touts l'tarifs
            $result = $this->tarifsManager->getTarifs();
            if (!empty($result)) { // Si il existe des tarif
                $orderMax = $this->tarifsManager->orderMax(); // Je reccupere l'ordre le plus grand
                for ($i = $_POST["ordre_tarif"]; $i <= $orderMax; $i++) { // De ordre donnee a la taille de l'tarif on boucle dessus pour modifier touts ce qui sont apres la position choisi
                    $nextId = $this->tarifsManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                    $this->tarifsManager->orderTarifs($i + 1, $nextId); // Je rajoute un + 1 sur l'ordre de l'tarif
                }
                echo $_POST["ordre_tarif"] . $orderMax . "<br>";
            }
            $this->tarifsManager->storeTarif();
            header("Location: /admin/tarifs/");
        } else {
            header("Location: /admin/tarifs/nouveau_tarif/");
        }
    }
    public function deleteTarif($id_tarif): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        // Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        $result = $this->tarifsManager->getTarifs();
        if (!empty($result)) { // Si il existe des tarif
            $orderMax = $this->tarifsManager->orderMax(); // Je reccupere l'ordre le plus grand
            $tarifSupprimer = $this->tarifsManager->gettarif($id_tarif); // Je reccupere l'tarif qu'on va supprimer
            for ($i = $tarifSupprimer->getordre_tarif() + 1; $i <= $orderMax; $i++) { // De ordre donnee a la taille de l'tarif on boucle dessus pour modifier touts ce qui sont apres la position choisi
                $nextId = $this->tarifsManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                $this->tarifsManager->orderTarifs($i - 1, $nextId); // Je retire - 1 sur l'ordre de l'tarif
            }
        }
        $this->tarifsManager->deleteTarif($id_tarif);
        header("Location: /admin/tarifs/");
    }
    public function updateTarif(): void
    {
        $this->validator->validate([
            "nom_tarif" => ["required", "max:30"],
            "premier_chien" => ["required", "min:1", "numeric"],
            "deuxieme_chien" => ["required", "min:1", "numeric"],
            "par_chien" => ["required", "min:1", "numeric"],
            "ordre_tarif" => ["required", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            // Va reccuperer touts l'tarifs
            $result = $this->tarifsManager->gettarifs();
            // On reccupere l'tarif qu'un modifie
            $tarifModifier = $this->tarifsManager->getTarif($_POST["id_tarif"]);
            if (!empty($result)) { // Si il existe des equipie
                $anciennePosition = $tarifModifier->getordre_tarif();
                $nouvellePosition = $_POST["ordre_tarif"];
                if ($anciennePosition < $nouvellePosition) { // Si l'ancienne position est plus petit que la nouvelle position
                    for ($i = $anciennePosition + 1; $i <= $nouvellePosition; $i++) { // De l'ancienne position a la nouvelle possition
                        $nextId = $this->tarifsManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                        $this->tarifsManager->orderTarifs($i - 1, $nextId); // Je rajoute un + 1 sur l'ordre de l'tarif
                    }
                    $this->tarifsManager->orderTarifs($nouvellePosition - 1, $_POST["id_tarif"]);
                } else { // Et si c'est l'inverse
                    for ($i = $nouvellePosition; $i < $anciennePosition; $i++) { // De la nouvelle position a l'ancienne possition
                        $nextId = $this->tarifsManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                        $this->tarifsManager->orderTarifs($i + 1, $nextId); // On retire -1 sur l'ordre de l'tarif
                    }
                    $this->tarifsManager->orderTarifs($nouvellePosition, $_POST["id_tarif"]);
                }
            }
            $this->tarifsManager->updateTarif($_POST["id_tarif"]);
            header("Location: /admin/tarifs/");
        } else {
            header("Location: /admin/tarifs/nouveau_tarif/");
        }
    }
}