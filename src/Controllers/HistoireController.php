<?php
namespace Project\Controllers;

class HistoireController extends Controller
{
    public function showHistoire(): void
    {
        $page = "Histoire du club";
        require VIEWS . "App/histoire-du-club.php";
    }
}