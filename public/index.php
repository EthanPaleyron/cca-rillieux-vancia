<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Project\Router($_SERVER["REQUEST_URI"]);

// ACTUALITE
$router->get('/', "ActualiteController@showHomepage");
$router->get('/tarifs_horaires/', "TarifHorraireController@showTarifHorraire");
$router->get('/histoire_du_club/', "HistoireController@showHistoire");
$router->get('/equipe/', "EquipeController@showEquipe");

$router->run();
