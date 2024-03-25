<?php
namespace Project\Controllers;

class EquipeController extends Controller
{
    public function showEquipe(): void
    {
        $equipe = $this->equipeManager->getEquipe();
        $page = "L'equipe";
        require VIEWS . "App/equipe.php";
    }
    public function newEquipier(): void
    {
        $this->validator->validate([
            "nom_equipier" => ["required", "max:40"],
            "description_equipier" => ["required", "max:250"],
            "ordre" => ["required", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            $result = $this->equipeManager->getEquipe();
            echo $_POST["ordre"] . "<br>";
            if (!empty ($result)) { // Si il existe des equipier
                $orderMax = $this->equipeManager->orderMax();
                $max = $orderMax[0];
                $lastId = $orderMax[1];
                for ($i = $_POST["ordre"]; $i <= $max; $i++) { // De ordre donnee a la taille de l'equipier on boucle dessus pour modifier touts ce qui sont apres la position choisi
                    $this->equipeManager->orderEquipe($i, $lastId);
                }
            }
            // Rajoute un chiffre randome a l'image
            $file = rand(0, 10000000000) . $_FILES["photo_equipier"]["name"];
            // Deplace l'image dans le fichier d'image avec le nouveau nom
            move_uploaded_file($_FILES["photo_equipier"]["tmp_name"], "../public/assets/images/equipe/" . $file);
            // Créer une nouveau equipier
            $this->equipeManager->insertEquipier($file);
            header("Location: /admin/equipe/");
        } else {
            header("Location: /admin/equipe/nouvelle_equipier");
        }
    }
    public function deleteEquipier(int $id_equipier): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset ($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $equipier = $this->equipeManager->getEquipier($id_equipier);
        $filePath = "../public/assets/images/equipe/" . $equipier->getphoto_equipier();
        if (file_exists($filePath)) { // Si l'image existe on la supprime
            unlink($filePath);
        }
        $this->equipeManager->deleteEquipier($id_equipier);
        header("Location: /admin/equipe/");
    }
    public function updateEquipier(): void
    {
        $this->validator->validate([
            "nom_equipier" => ["required", "max:20"],
            "description_equipier" => ["required", "max:250"],
        ]);
        if (!$this->validator->errors()) {
            // On reccupere l'image enregistrer en bdd
            $equipier = $this->equipeManager->getEquipier($_POST["id_equipier"]);
            $currentFile = $equipier->getphoto_equipier();
            if ($_FILES["photo_equipier"]["name"] != "") { // Si l'image a été changer on l'ajoute et on supprime l'ancienne
                // Ajoute un chiffre aleatoire a l'image pour eviter les doublons
                $file = rand(0, 10000000000) . $_FILES["photo_equipier"]["name"];
                // Deplace l'image dans le fichier d'image avec le nouveau nom
                move_uploaded_file($_FILES["photo_equipier"]["tmp_name"], "../public/assets/images/equipe/" . $file);
                $fileDelete = "../public/assets/images/equipe/" . $currentFile;
                if (file_exists($fileDelete)) { // Si l'image existe on la supprime 
                    unlink($fileDelete);
                }
            } else { // Sinon on récupere l'actuelle
                $file = $currentFile;
            }
            // Modifier l'equipier
            $this->equipeManager->updateEquipier($file);
            header("Location: /admin/equipe/");
        } else {
            header("Location: /admin/equipier/update/" . $_POST["id_equipier"] . "/");
        }
    }
}