<?php
namespace Project\Controllers;

class AdminController extends Controller
{
    public function showLogin(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (isset ($_SESSION["admin"]["nom"])) {
            header("Location: /adminDashboard");
            die();
        }
        $categories = $this->categorieManager->showCategories();
        require VIEWS . 'Admin/authAdmin.php';
    }
    public function login(): void
    {
        $this->validator->validate([
            "nom" => ["required", "alphaSpace"],
            "mdp" => ["required", "min:8", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) { // Si il y a pas d'erreur dans le validateur
            $result = $this->adminManager->find();
            if ($result && password_verify($_POST['mdp'], $result->getmdp_admin())) { // Si l'email existe deja en BDD et que le mdp corespond au mdp enregistrer en BDD de l'user
                // On enregistre ces informations
                $_SESSION["admin"] = [
                    "id" => $result->getid_admin(),
                    "nom" => $result->getnom_admin(),
                ];
                header("Location: /adminDashboard/");
            } else { // Sinon on affiche un message d'erreur
                $_SESSION["error"]['message'] = "Une erreur sur l'identifiants";
                header("Location: /authAdmin/");
            }
        } else {
            header("Location: /authAdmin/");
        }
    }
    public function logout(): void
    {
        // Si l'utilisateur n'est pas connecter on le redirige au login
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /authAdmin/");
            die();
        }
        // Sinon on efface sa session et redirige au login
        session_start();
        session_destroy();
        header('Location: /');
    }
    public function dashboard(): void
    {
        // Si l'utilisateur n'est pas connecter on le redirige au login
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /authAdmin/");
            die();
        }
        // Affiche touts les voyage
        $voyages = $this->voyageManager->getVoyages();
        // Affiche touts les categories
        $categories = $this->categorieManager->showCategories();
        require VIEWS . 'Admin/adminDashboard.php';
    }
    public function showAddVoyage(): void
    {
        // Si le client n'est pas connecter on le redirige sur la page de connexion
        if (!isset ($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        // Affiche touts les categories
        $categories = $this->categorieManager->showCategories();
        require VIEWS . 'Admin/insertVoyage.php';
    }
    public function showUpdateVoyage(int $id_voyage): void
    {
        // Si le client n'est pas connecter on le redirige sur la page de connexion
        if (!isset ($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        // Réccupere les ifo du voyage selectionner
        $voyage = $this->voyageManager->getVoyage($id_voyage);
        // Affiche touts les categories
        $categories = $this->categorieManager->showCategories();
        require VIEWS . 'Admin/updateVoyage.php';
    }
}