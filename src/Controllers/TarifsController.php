<?php
namespace Project\Controllers;

class TarifsController extends Controller
{
    public function showTarifHoraire(): void
    {
        $tarifs = $this->tarifsManager->getTarifs();
        $page = "Tarifs & Horaires";
        require VIEWS . "App/tarifs-et-horaires.php";
    }
    public function newTarif(): void
    {
        $this->validator->validate([
            "nom_tarif" => ["required", "max:30"],
            "premier_chien" => ["required", "min:1", "numeric"],
            "deuxieme_chien" => ["required", "min:1", "numeric"],
            "par_chien" => ["required", "min:1", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            $this->tarifsManager->storeTarif();
            header("Location: /admin/tarifs/");
        } else {
            header("Location: /admin/tarifs/nouveau_tarif/");
        }
    }
    public function deleteTarif($id_tarif): void
    {
        $this->tarifsManager->deleteTarif($id_tarif);
        header("Location: /admin/tarifs/");
    }
    public function updateTarif(): void
    {
        $this->validator->validate([
            "nom_tarif" => ["required", "max:30"],
            "premier_chien" => ["required", "min:1", "numeric"],
            "deuxieme_chien" => ["required", "min:1", "numeric"],
            "par_chien" => ["required", "min:1", "numeric"],
        ]);
        if (!$this->validator->errors()) {
            $this->tarifsManager->updateTarif($_POST["id_tarif"]);
            header("Location: /admin/tarifs/");
        } else {
            header("Location: /admin/tarifs/nouveau_tarif/");
        }
    }
}