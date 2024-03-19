<?php
namespace Project\Controllers;

class ActualitesController extends Controller
{
    public function showHomepage()
    {
        $page = "Accueil";
        require VIEWS . "index.php";
    }
}