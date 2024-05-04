<?php
namespace Project\Controllers;

class AdminController extends Controller
{
    public function showLogin(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/dashboard/");
            die();
        }
        $page = "Login";
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
                    "role" => $result->getrole_admin(),
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
        if (!isset($_SESSION["admin"]["nom"])) {
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
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $page = "Dashboard";
        require VIEWS . 'Admin/dashboard.php';
    }
    public function showActualitesManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $actualites = $this->actualitesManager->getActualites();
        $page = "Manager";
        require VIEWS . 'Admin/actualites-manager.php';
    }
    public function showInsertionActualite(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $page = "Insertion";
        require VIEWS . 'Admin/insertion-actualite.php';
    }
    public function showUpdatedActualite(int $id_actualite): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $actualite = $this->actualitesManager->getActualite($id_actualite);
        $page = "Updated";
        require VIEWS . 'Admin/updated-actualite.php';
    }
    public function showTarifsManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $tarifs = $this->tarifsManager->getTarifs();
        $page = "Manager";
        require VIEWS . 'Admin/tarifs-manager.php';
    }
    public function showInsertionTarif(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $tarifs = $this->tarifsManager->getTarifs();
        if (count($tarifs) >= 10) {
            header("Location: /admin/tarifs/");
            die();
        }
        $page = "Insertion";
        require VIEWS . 'Admin/insertion-tarif.php';
    }
    public function showUpdatedTarif(int $id_tarif): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $tarifSelectionner = $this->tarifsManager->getTarif($id_tarif);
        $tarifs = $this->tarifsManager->getTarifs();
        $page = "Updated";
        require VIEWS . 'Admin/updated-tarif.php';
    }
    public function showHorairesManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $horaires = $this->horairesManager->getHoraires();
        $page = "Manager";
        require VIEWS . 'Admin/horaires-manager.php';
    }
    public function showInsertionHoraire(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $horaires = $this->horairesManager->getHoraires();
        if (count($horaires) >= 10) {
            header("Location: /admin/horaires/");
            die();
        }
        $page = "Insertion";
        require VIEWS . 'Admin/insertion-horaire.php';
    }
    public function showUpdatedHoraire(int $id_horaire): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $horaireSelectionner = $this->horairesManager->getHoraire($id_horaire);
        preg_match_all("/\d+/", $horaireSelectionner->getheure_horaire(), $matches); // on ajoute touts les chiffre dans un tableau
        $heuresMinutes = $matches[0];
        $page = "Updated";
        require VIEWS . 'Admin/updated-horaire.php';
    }
    public function showEquipeManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $equipe = $this->equipeManager->getEquipe();
        $page = "Manager";
        require VIEWS . 'Admin/equipe-manager.php';
    }
    public function showInsertionEquipier(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        $equipe = $this->equipeManager->getEquipe();
        if (count($equipe) >= 50) {
            header("Location: /admin/equipe/");
            die();
        }
        $page = "Insertion";
        require VIEWS . 'Admin/insertion-equipier.php';
    }
    public function showUpdatedEquipier(int $id_equipier): void
    {
        // Si l'admin n'est pas connecter on le redirige sur la page de connexion
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }
        $equipierSelectionner = $this->equipeManager->getEquipier($id_equipier);
        $equipe = $this->equipeManager->getEquipe();
        $page = "Updated";
        require VIEWS . 'Admin/updated-equipier.php';
    }
    public function showAdminsManager(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        // Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        $admins = $this->adminManager->getAdmins();
        $page = "Manager";
        require VIEWS . 'Admin/admins-manager.php';
    }
    public function showInsertionAdmin(): void
    {
        // Si l'admin est connecter on le redirige sur le tableau de bord
        if (!isset($_SESSION["admin"]["nom"])) {
            header("Location: /admin/login/");
            die();
        }
        // Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        $admin = $this->adminManager->getAdmins();
        $page = "Insertion";
        require VIEWS . 'Admin/insertion-admin.php';
    }
    public function showUpdatedAdmin(int $id_admin): void
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
        $adminSelectionner = $this->adminManager->getAdmin($id_admin);
        $admin = $this->adminManager->getAdmins();
        $page = "Updated";
        require VIEWS . 'Admin/updated-admin.php';
    }
    public function insertAdmin()
    {
        // Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        $this->validator->validate([
            "nom_admin" => ["required", "min:1"],
            "mdp_admin" => ["required", "min:8"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $role = 2;
            if (isset($_POST["role_admin"])) {
                $role = 1;
            }
            // créer un nouvelle admin
            $this->adminManager->insertNewAdmin($role);
            header("Location: /admin/admins/");
        } else {
            header("Location: /admin/admins/nouvelle_admin/");
        }
    }
    public function deleteAdmin(int $id_admin)
    {
        if (!isset($_SESSION["admin"]["id"])) {
            header("Location: /login/");
            die();
        }// Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        // supprime l'admin selectionner
        $this->adminManager->deleteAdmin($id_admin);
        header("Location: /admin/admins/");
    }
    public function updateAdmin()
    {
        // Si c'est pas un super admin on le redirige sur le tableau de bord
        if ($_SESSION["admin"]["role"] == 2) {
            header("Location: /admin/login/");
            die();
        }
        $this->validator->validate([
            "nom_admin" => ["required", "min:1"],
            "mdp_admin" => ["required", "min:8"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $role = 2;
            if (isset($_POST["role_admin"])) {
                $role = 1;
            }
            // modifier admin selectionner
            $this->adminManager->updateAdmin($role);
            header("Location: /admin/admins/");
        } else {
            header("Location: /admin/admins/update/" . $_POST["id_admin"] . "/");
        }
    }
}