<?php
namespace Project\Controllers;

class ActualitesController extends Controller
{
    public function showHomepage(): void
    {
        $actualite = $this->actualitesManager->getLastActualite();
        $page = "Accueil";
        require VIEWS . "index.php";
    }
    public function showActualites(): void
    {
        $actualites = $this->actualitesManager->getActualites();
        $page = "Ancienne actualites";
        require VIEWS . "App/ancienne-actualites.php";
    }
    public function newActualite(): void
    {
        $this->validator->validate([
            "nom_actualite" => ["required", "max:40"],
            "description_actualite" => ["required", "max:850"],
        ]);
        if (!$this->validator->errors()) {
            // Ajoute la date d'aujourd'hui
            $datetime = date("Y-m-d h:i:s");
            // Rajoute un chiffre randome a l'image
            $file = rand(0, 10000000000) . $_FILES["image_actualite"]["name"];
            // Deplace l'image dans le fichier d'image avec le nouveau nom
            move_uploaded_file($_FILES["image_actualite"]["tmp_name"], "../public/assets/images/actualites/" . $file);
            // Créer une nouvelle actualité
            $this->actualitesManager->insertActualite($datetime, $file);
            header("Location: /admin/actualites/");
        } else {
            header("Location: /admin/actualites/nouvelle_actualite");
        }
    }
    public function deleteActualite(int $id_actualite): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset ($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $actualite = $this->actualitesManager->getActualite($id_actualite);
        $filePath = "../public/assets/images/actualites/" . $actualite->getimage_actualite();
        if (file_exists($filePath)) { // Si l'image existe on la supprime
            unlink($filePath);
        }
        $this->actualitesManager->deleteActualite($id_actualite);
        header("Location: /admin/actualites/");
    }
    public function updateActualite(): void
    {
        $this->validator->validate([
            "nom_actualite" => ["required", "max:40"],
            "description_actualite" => ["required", "max:850"],
        ]);
        if (!$this->validator->errors()) {
            // On reccupere l'image enregistrer en bdd
            $actualite = $this->actualitesManager->getactualite($_POST["id_actualite"]);
            $currentFile = $actualite->getimage_actualite();
            if ($_FILES["image_actualite"]["name"] != "") { // Si l'image a été changer on l'ajoute et on supprime l'ancienne
                // Ajoute un chiffre aleatoire a l'image pour eviter les doublons
                $file = rand(0, 10000000000) . $_FILES["image_actualite"]["name"];
                // Deplace l'image dans le fichier d'image avec le nouveau nom
                move_uploaded_file($_FILES["image_actualite"]["tmp_name"], "../public/assets/images/actualites/" . $file);
                $fileDelete = "../public/assets/images/actualites/" . $currentFile;
                if (file_exists($fileDelete)) { // Si l'image existe on la supprime 
                    unlink($fileDelete);
                }
            } else { // Sinon on récupere l'actuelle
                $file = $currentFile;
            }
            // Créer une nouvelle actualité
            $this->actualitesManager->updateActualite($file);
            header("Location: /admin/actualites/");
        } else {
            header("Location: /admin/actualites/update/" . $_POST["id_actualite"] . "/");
        }
    }
}