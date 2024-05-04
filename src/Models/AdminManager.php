<?php
namespace Project\Models;

use Project\Models\Admin;

class AdminManager extends Manager
{
    public function getAdmins()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM admins");
        $stmt->execute(
            array(
            )
        );
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Project\Models\Admin");
    }
    // Reccupere les info de l'id admin selectionner 
    public function find()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM admins WHERE nom_admin = ?");
        $stmt->execute(
            array(
                $_POST["nom"]
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Admin");
        return $stmt->fetch();
    }
    public function getAdmin(int $id_admin)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM admins WHERE id_admin = ?");
        $stmt->execute(
            array(
                $id_admin,
            )
        );
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Admin");
        return $stmt->fetch();
    }
    public function insertNewAdmin(int $role)
    {
        $stmt = $this->bdd->prepare("INSERT INTO admins (nom_admin, mdp_admin, role_admin) VALUES (?, ?, ?)");
        $stmt->execute(
            array(
                $_POST["nom_admin"],
                $_POST["mdp_admin"],
                $role
            )
        );
    }
    public function deleteAdmin(int $id_admin)
    {
        $stmt = $this->bdd->prepare("DELETE FROM admins WHERE id_admin = ?");
        $stmt->execute(
            array(
                $id_admin,
            )
        );
    }
    public function updateAdmin(int $role)
    {
        $stmt = $this->bdd->prepare("UPDATE admins SET nom_admin = ?, mdp_admin = ?, role_admin = ? WHERE id_admin = ?");
        $stmt->execute(
            array(
                $_POST["nom_admin"],
                $_POST["mdp_admin"],
                $role,
                $_POST["id_admin"],
            )
        );
    }
}