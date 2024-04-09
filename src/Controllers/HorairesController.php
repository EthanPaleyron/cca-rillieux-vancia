<?php
namespace Project\Controllers;

class HorairesController extends Controller
{
    public function newHoraire()
    {
        $this->validator->validate([
            "nom_horaire" => ["required", "max:60"],
            "heure_horaire" => ["required"],
        ]);
        $_SESSION['old'] = $_POST;
        if (!$this->validator->errors()) {
            $this->horairesManager->storeHoraire();
            header("Location: /admin/horaires/");
        } else {
            header("Location: /admin/horaires/nouvelle_horaire/");
        }
    }
    public function deleteHoraire(int $id_horaire)
    {
        $this->horairesManager->deleteHoraire($id_horaire);
        header("Location: /admin/horaires/");
    }
    public function updateHoraire()
    {
        $this->validator->validate([
            "nom_horaire" => ["required", "max:60"],
            "heure_horaire" => ["required"],
        ]);
        if (!$this->validator->errors()) {
            $this->horairesManager->updateHoraire();
            header("Location: /admin/horaires/");
        } else {
            header("Location: /admin/horaire/update/" . $_POST["id_horaire"] . "/");
        }
    }
}