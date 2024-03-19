<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Project\Router($_SERVER["REQUEST_URI"]);

// ADMIN
$router->get('/admin/login/', "AdminController@showLogin");
$router->post('/adminLogin/', "AdminController@login");
$router->get('/admin/dashboard/', "AdminController@dashboard");
$router->get('/admin/actualites/', "AdminController@showActualitesManager");
$router->get('/admin/tarifs/', "AdminController@showTarifsManager");
$router->get('/admin/equipe/', "AdminController@showEquipeManager");

// ACTUALITES
$router->get('/', "ActualiteController@showHomepage");

// TARIFS (HORAIRES)
$router->get('/tarifs_horaires/', "TarifHorraireController@showTarifHorraire");

// EQUIPE
$router->get('/equipe/', "EquipeController@showEquipe");

// HISTOIRE DU CLUB
$router->get('/histoire_du_club/', "HistoireController@showHistoire");


$router->run();
