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
            "ordre_equipier" => ["required", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            // Va reccuperer touts l'equipe
            $result = $this->equipeManager->getEquipe();
            if (!empty($result)) { // Si il existe des equipier
                $orderMax = $this->equipeManager->orderMax(); // Je reccupere l'ordre le plus grand
                for ($i = $_POST["ordre_equipier"]; $i <= $orderMax; $i++) { // De ordre donnee a la taille de l'equipier on boucle dessus pour modifier touts ce qui sont apres la position choisi
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
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $result = $this->equipeManager->getEquipe();
        if (!empty($result)) { // Si il existe des equipier
            $orderMax = $this->equipeManager->orderMax(); // Je reccupere l'ordre le plus grand
            $equipierSupprimer = $this->equipeManager->getEquipier($id_equipier); // Je reccupere l'equipier qu'on va supprimer
            for ($i = $equipierSupprimer->getordre_equipier() + 1; $i <= $orderMax; $i++) { // De ordre donnee a la taille de l'equipier on boucle dessus pour modifier touts ce qui sont apres la position choisi
                $nextId = $this->equipeManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                $this->equipeManager->orderEquipe($i - 1, $nextId); // Je retire - 1 sur l'ordre de l'equipier
            }
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
            "ordre_equipier" => ["required", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            // Va reccuperer touts l'equipe
            $result = $this->equipeManager->getEquipe();
            foreach ($result as $r) {
                echo "id:" . $r->getid_equipier() . " ordre:" . $r->getordre_equipier() . " / ";
            }
            echo "<br>";
            // On reccupere l'equipier qu'un modifie
            $equipierModifier = $this->equipeManager->getEquipier($_POST["id_equipier"]);
            if (!empty($result)) { // Si il existe des equipie
                $anciennePosition = $equipierModifier->getordre_equipier();
                $nouvellePosition = $_POST["ordre_equipier"];
                $idnouvellePosition = $this->equipeManager->findOrderID($nouvellePosition);
                if ($anciennePosition < $nouvellePosition) { // Si l'ancienne position est plus petit que la nouvelle position
                    echo $anciennePosition . " actuelle < nouveau" . $nouvellePosition . "<br>";
                    for ($i = $anciennePosition + 1; $i <= $nouvellePosition; $i++) { // De l'ancienne position a la nouvelle possition
                        $nextId = $this->equipeManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                        echo $i;
                        echo " sur l'id ";
                        echo $nextId . " = ";
                        echo $i - 1;
                        echo "<br>";
                        $this->equipeManager->orderEquipe($i - 1, $nextId); // Je rajoute un + 1 sur l'ordre de l'equipier
                    }
                } else { // Et si c'est l'inverse
                    echo $anciennePosition . "actuelle > nouveau " . $nouvellePosition . "<br>";
                    for ($i = $nouvellePosition; $i < $anciennePosition; $i++) { // De la nouvelle position a l'ancienne possition
                        $nextId = $this->equipeManager->findOrderID($i); // Je reccupere l'id qui est egale la position donnee
                        echo $i;
                        echo " sur l'id ";
                        echo $nextId . " = ";
                        echo $i + 1;
                        echo "<br>";
                        $this->equipeManager->orderEquipe($i + 1, $nextId); // On retire -1 sur l'ordre de l'equipier
                    }
                }
                echo "<br> nouvelle position actuel de l'id " . $idnouvellePosition . " est egale a = " . $nouvellePosition;
                $this->equipeManager->orderEquipe($nouvellePosition, $idnouvellePosition);
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