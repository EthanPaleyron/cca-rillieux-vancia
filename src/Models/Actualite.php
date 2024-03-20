<?php
namespace Project\Models;

class Actualite extends Manager
{
    private int $id_actualite;
    private string $nom_actualite;
    private string $description_actualite;
    private string $date_actualite;
    private string $image_actualite;
    public function setid_actualite($id_actualite): void
    {
        $this->id_actualite = $id_actualite;
    }
    public function getid_actualite(): int
    {
        return $this->id_actualite;
    }
    public function setnom_actualite($nom_actualite): void
    {
        $this->nom_actualite = $nom_actualite;
    }
    public function getnom_actualite(): string
    {
        return $this->nom_actualite;
    }
    public function setdescription_actualite($description_actualite): void
    {
        $this->description_actualite = $description_actualite;
    }
    public function getdescription_actualite(): string
    {
        return $this->description_actualite;
    }
    public function setdate_actualite($date_actualite): void
    {
        $this->date_actualite = $date_actualite;
    }
    public function getdate_actualite(): string
    {
        return $this->date_actualite;
    }
    public function setimage_actualite($image_actualite): void
    {
        $this->image_actualite = $image_actualite;
    }
    public function getimage_actualite(): string
    {
        return $this->image_actualite;
    }
}