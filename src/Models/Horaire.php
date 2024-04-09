<?php
namespace Project\Models;

class Horaire
{
    private int $id_horaire;
    private string $heure_horaire;
    private string $nom_horaire;
    public function setid_horaire($id_horaire): void
    {
        $this->id_horaire = $id_horaire;
    }
    public function getid_horaire(): int
    {
        return $this->id_horaire;
    }
    public function setheure_horaire($heure_horaire): void
    {
        $this->heure_horaire = $heure_horaire;
    }
    public function getheure_horaire(): string
    {
        return $this->heure_horaire;
    }
    public function setnom_horaire($nom_horaire): void
    {
        $this->nom_horaire = $nom_horaire;
    }
    public function getnom_horaire(): string
    {
        return $this->nom_horaire;
    }
}