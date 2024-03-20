<?php
namespace Project\Controllers;

class AdminController extends Controller
{
    public function showLogin(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/dashboard/");
            die();
        }
        require VIEWS . 'Admin/login.php';
    }
    public function login(): void
    {
        $this->validator->validate([
            "nom" => ["required", "alphaSpace"],
            "mdp" => ["required", "min:8"]
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
                header("Location: /admin/dashboard/");
            } else { // Sinon on affiche un message d'erreur
                $_SESSION["error"]['message'] = "Une erreur sur l'identifiants";
                header("Location: /admin/login/");
            }
        } else {
            header("Location: /admin/login/");
        }
    }
    public function logout(): void
    {
        // Si l'utilisateur n'est pas connecter on le redirige au login
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        // Sinon on efface sa session et redirige au login
        session_start();
        session_destroy();
        header('Location: /');
    }
    public function dashboard(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/dashboard.php';
    }
    public function showActualitesManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $actualites = $this->actualitesManager->getActualites();
        require VIEWS . 'Admin/actualites-manager.php';
    }
    public function showInsertionActualite(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/insertion-actualite.php';
    }
    public function showUpdatedActualite(int $id_actualite): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset ($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $actualite = $this->actualitesManager->getActualite($id_actualite);
        require VIEWS . 'Admin/updated-actualite.php';
    }
    public function showTarifsManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/tarifs-manager.php';
    }
    public function showInsertionTarif(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/insertion-tarif.php';
    }
    public function showEquipeManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/equipe-manager.php';
    }
    public function showInsertionEquipier(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset ($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        require VIEWS . 'Admin/insertion-equipier.php';
    }
}