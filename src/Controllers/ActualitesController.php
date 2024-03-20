<?php
namespace Project\Controllers;

class ActualitesController extends Controller
{
    public function showHomepage()
    {
        $page = "Accueil";
        require VIEWS . "index.php";
    }
    public function newActualite()
    {
        $this->validator->validate([
            "nom_actualite" => ["required", "alphaSpace"],
            "description_actualite" => ["required", "max:850"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            // Ajoute la date d'aujourd'hui
            $date = date("Y-m-d");
            $file = rand(0, 10000000000) . $_FILES["image_actualite"]["name"];
            // Deplace l'image dans le fichier d'image avec le nouveau nom
            move_uploaded_file($_FILES["image_actualite"]["tmp_name"], "../public/assets/images/activites/" . $file);
            // Créer une nouvelle actualité
            $this->actualitesManager->addActualite($date, $file);
            header("Location: /admin/actualites/");
        } else {
            header("Location: /admin/actualites/nouvelle_actualite");
        }
    }
}