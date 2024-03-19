<?php
namespace Project\Controllers;

class ActualiteController extends Controller
{
    public function showHomepage()
    {
        $page = "Accueil";
        require VIEWS . "index.php";
    }
}