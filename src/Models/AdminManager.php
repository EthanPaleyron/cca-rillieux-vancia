<?php
namespace Project\Models;

use Project\Models\Admin;

class AdminManager extends Manager
{
    // Reccupere les info de l'id admin selectionner 
    // public function find(): Admin|bool
    // {
    //     $stmt = $this->bdd->prepare("SELECT * FROM admins WHERE nom_admin = ?");
    //     $stmt->execute(
    //         array(
    //             $_POST["nom"]
    //         )
    //     );
    //     $stmt->setFetchMode(\PDO::FETCH_CLASS, "Project\Models\Admin");
    //     return $stmt->fetch();
    // }
}