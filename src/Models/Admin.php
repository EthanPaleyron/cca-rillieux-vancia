<?php
namespace Project\Models;

class Admin extends Manager
{
    private int $id_admin;
    private string $nom_admin;
    private string $mdp_admin;
    public function setid_admin($id_admin): void
    {
        $this->id_admin = $id_admin;
    }
    public function getid_admin(): int
    {
        return $this->id_admin;
    }
    public function setnom_admin($nom_admin): void
    {
        $this->nom_admin = $nom_admin;
    }
    public function getnom_admin(): string
    {
        return $this->nom_admin;
    }
    public function setmdp_admin($mdp_admin): void
    {
        $this->mdp_admin = $mdp_admin;
    }
    public function getmdp_admin(): string
    {
        return $this->mdp_admin;
    }
}