<?php
namespace Project\Models;

class Tarif extends Manager
{
    private int $id_tarif;
    private string $nom_tarif;
    private float $tarif_premier_chien;
    private float $tarif_deuxieme_chien;
    private float $tarif_par_chien;
    private int $ordre_tarif;
    public function setid_tarif($id_tarif): void
    {
        $this->id_tarif = $id_tarif;
    }
    public function getid_tarif(): int
    {
        return $this->id_tarif;
    }
    public function setnom_tarif($nom_tarif): void
    {
        $this->nom_tarif = $nom_tarif;
    }
    public function getnom_tarif(): string
    {
        return $this->nom_tarif;
    }
    public function settarif_premier_chien($tarif_premier_chien): void
    {
        $this->tarif_premier_chien = $tarif_premier_chien;
    }
    public function gettarif_premier_chien(): float
    {
        return $this->tarif_premier_chien;
    }
    public function settarif_deuxieme_chien($tarif_deuxieme_chien): void
    {
        $this->tarif_deuxieme_chien = $tarif_deuxieme_chien;
    }
    public function gettarif_deuxieme_chien(): float
    {
        return $this->tarif_deuxieme_chien;
    }
    public function settarif_par_chien($tarif_par_chien): void
    {
        $this->tarif_par_chien = $tarif_par_chien;
    }
    public function gettarif_par_chien(): float
    {
        return $this->tarif_par_chien;
    }
    public function setordre_tarif($ordre_tarif): void
    {
        $this->ordre_tarif = $ordre_tarif;
    }
    public function getordre_tarif(): int
    {
        return $this->ordre_tarif;
    }
}