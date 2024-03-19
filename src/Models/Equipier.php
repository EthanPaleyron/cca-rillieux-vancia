<?php
namespace Project\Models;

class Equipier extends Manager
{
    private int $id_equipier;
    private string $nom_equipier;
    private string $description_equipier;
    private string $photo_equipier;
    public function setid_equipier($id_equipier): void
    {
        $this->id_equipier = $id_equipier;
    }
    public function getid_equipier(): int
    {
        return $this->id_equipier;
    }
    public function setnom_equipier($nom_equipier): void
    {
        $this->nom_equipier = $nom_equipier;
    }
    public function getnom_equipier(): string
    {
        return $this->nom_equipier;
    }
    public function setdescription_equipier($description_equipier): void
    {
        $this->description_equipier = $description_equipier;
    }
    public function getdescription_equipier(): string
    {
        return $this->description_equipier;
    }
    public function setphoto_equipier($photo_equipier): void
    {
        $this->photo_equipier = $photo_equipier;
    }
    public function getphoto_equipier(): int
    {
        return $this->photo_equipier;
    }
}