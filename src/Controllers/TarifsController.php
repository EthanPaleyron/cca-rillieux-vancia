<?php
namespace Project\Controllers;

class TarifsController extends Controller
{
    public function showTarifHoraire()
    {
        $page = "Tarifs & Horaires";
        require VIEWS . "App/tarifs-et-horaires.php";
    }
}