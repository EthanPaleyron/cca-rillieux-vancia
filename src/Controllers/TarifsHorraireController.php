<?php
namespace Project\Controllers;

class TarifHorraireController extends Controller
{
    public function showTarifHorraire()
    {
        $page = "Tarifs & Horaires";
        require VIEWS . "App/tarifs-et-horaires.php";
    }
}