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
            // Va reccuperer touts l'equipe
            $result = $this->equipeManager->getEquipe();
            if (!empty ($result)) { // Si il existe des equipier
                $orderMax = $this->equipeManager->orderMax(); // Je reccupere l'ordre le plus grand
                $nextId = $this->equipeManager->findOrderID($_POST["ordre"]); // Je reccupere l'id qui est egale la position donnee
                for ($i = $_POST["ordre"]; $i <= $orderMax; $i++) { // De ordre donnee a la taille de l'equipier on boucle dessus pour modifier touts ce qui sont apres la position choisi
                    $nextId = $this->equipeManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                    $this->equipeManager->orderEquipe($i + 1, $nextId); // Je rajoute un + 1 sur l'ordre de l'equipier
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
            // Va reccuperer touts l'equipe
            $result = $this->equipeManager->getEquipe();
            // on reccupere l'equipier q'un modifie
            $equipierModifier = $this->equipeManager->getEquipier($_POST["id_equipier"]);
            if (!empty ($result)) { // Si il existe des equipier
                // Je reccupere l'id qui est egale la position selectionner
                $idEquipierSelected = $this->equipeManager->findOrderID($_POST["ordre"]);
                // Je reccupere l'equipier qui est egale a id selectionner
                $equipierSelected = $this->equipeManager->getEquipier($idEquipierSelected);
                // Je change la position de l'equipier selectionner
                $this->equipeManager->orderEquipe($equipierModifier->getordre_equipier(), $idEquipierSelected);
                // Je change la position de l'equipier actuel
                $this->equipeManager->orderEquipe($equipierSelected, $equipierModifier->getid_equipier());
            }
            // On reccupere l'image enregistrer en bdd
            $currentFile = $equipierModifier->getphoto_equipier();
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