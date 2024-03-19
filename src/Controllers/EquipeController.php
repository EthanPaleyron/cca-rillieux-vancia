<?php
namespace Project\Controllers;

class EquipeController extends Controller
{
    public function showEquipe()
    {
        $page = "L'equipe";
        require VIEWS . "App/equipe.php";
    }
}