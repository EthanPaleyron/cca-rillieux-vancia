<?php
namespace Project\Controllers;

class HorairesController extends Controller
{
    public function newHoraire()
    {
        $this->validator->validate([
            "nom_horaire" => ["required", "max:120"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            if (empty($_POST["heures1"]) || empty($_POST["minutes1"])) { // verfifie si on n'a aumoin remplie un horaire
                $_SESSION["error"]["message"] = "Ajouter au moins 1 horaire";
                header("Location: /admin/horaires/nouvelle_horaire/");
                die();
            }
            if ($_POST["heures1"] < 6 || $_POST["heures1"] >= 17 || $_POST["minutes1"] < 0 || $_POST["minutes1"] >= 60) { // verifie si ces des horaire du matin ou du midi
                $_SESSION["error"]["message"] = "Les heure doivent rester entre 6h et 16 h 59 et les minutes de 0 a 59";
                header("Location: /admin/horaires/nouvelle_horaire/");
                die();
            }
            $temps = "";
            if ($_POST["heures1"] >= 6 && $_POST["heures1"] <= 11) { // si il est le matin
                $temps = "Matin";
            } else if ($_POST["heures1"] >= 12 && $_POST["heures1"] <= 16) { // si il est midi
                $temps = "Après Midi";
            }
            if (!empty($_POST["heures2"]) || !empty($_POST["minutes2"])) { // si il y a 2 horaire
                $heure = sprintf("%02d", $_POST["heures1"]) . " H " . sprintf("%02d", $_POST["minutes1"]) . " ET " . sprintf("%02d", $_POST["heures2"]) . " H " . sprintf("%02d", $_POST["minutes2"]);
                if ($_POST["heures2"] < 6 || $_POST["heures2"] >= 17 || $_POST["minutes2"] < 0 || $_POST["minutes2"] >= 60) { // verifie si ces des horaire du matin ou du midi
                    $_SESSION["error"]["message"] = "Les heure doivent rester entre 6h et 16 h 59 et les minutes de 0 a 59";
                    header("Location: /admin/horaires/nouvelle_horaire/");
                    die();
                }
            } else { // si il y a que 1 horaire
                $heure = sprintf("%02d", $_POST["heures1"]) . " H " . sprintf("%02d", $_POST["minutes1"]);
            }
            $this->horairesManager->storeHoraire($temps, $heure);
            header("Location: /admin/horaires/");
        } else {
            header("Location: /admin/horaires/nouvelle_horaire/");
        }
    }
    public function deleteHoraire(int $id_horaire)
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
        $this->horairesManager->deleteHoraire($id_horaire);
        header("Location: /admin/horaires/");
    }
    public function updateHoraire()
    {
        $this->validator->validate([
            "nom_horaire" => ["required", "max:120"],
        ]);
        if (!$this->validator->errors()) {
            if (empty($_POST["heures1"]) || empty($_POST["minutes1"])) { // verfifie si on n'a aumoin remplie un horaire
                $_SESSION["error"]["message"] = "Ajouter au moins 1 horaire";
                header("Location: /admin/horaire/update/" . $_POST["id_horaire"] . "/");
                die();
            }
            if ($_POST["heures1"] < 6 || $_POST["heures1"] >= 17 || $_POST["minutes1"] < 0 || $_POST["minutes1"] >= 60) { // verifie si ces des horaire du matin ou du midi
                $_SESSION["error"]["message"] = "Les heure doivent rester entre 6h et 16 h 59 et les minutes de 0 a 59";
                header("Location: /admin/horaire/update/" . $_POST["id_horaire"] . "/");
                die();
            }
            $temps = "";
            if ($_POST["heures1"] >= 6 && $_POST["heures1"] <= 11) { // si il est le matin
                $temps = "Matin";
            } else if ($_POST["heures1"] >= 12 && $_POST["heures1"] <= 16) { // si il est midi
                $temps = "Après Midi";
            }
            if (!empty($_POST["heures2"]) || !empty($_POST["minutes2"])) { // si il y a 2 horaire
                $heure = sprintf("%02d", $_POST["heures1"]) . " H " . sprintf("%02d", $_POST["minutes1"]) . " ET " . sprintf("%02d", $_POST["heures2"]) . " H " . sprintf("%02d", $_POST["minutes2"]);
                if ($_POST["heures2"] < 6 || $_POST["heures2"] >= 17 || $_POST["minutes2"] < 0 || $_POST["minutes2"] >= 60) { // verifie si ces des horaire du matin ou du midi
                    $_SESSION["error"]["message"] = "Les heure doivent rester entre 6h et 16 h 59 et les minutes de 0 a 59";
                    header("Location: /admin/horaire/update/" . $_POST["id_horaire"] . "/");
                    die();
                }
            } else { // si il y a que 1 horaire
                $heure = sprintf("%02d", $_POST["heures1"]) . " H " . sprintf("%02d", $_POST["minutes1"]);
            }
            $this->horairesManager->updateHoraire($temps, $heure);
            header("Location: /admin/horaires/");
        } else {
            header("Location: /admin/horaire/update/" . $_POST["id_horaire"] . "/");
        }
    }
}