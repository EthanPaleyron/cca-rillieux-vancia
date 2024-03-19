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
$router->get('/admin/actualites/nouvelle_actualite', "AdminController@showInsertionActualite");
$router->get('/admin/tarifs/', "AdminController@showTarifsManager");
$router->get('/admin/tarifs/nouveau_tarif', "AdminController@showInsertionTarif");
$router->get('/admin/equipe/', "AdminController@showEquipeManager");
$router->get('/admin/equipe/nouvelle_equipier', "AdminController@showInsertionEquipier");

// ACTUALITES
$router->get('/', "ActualitesController@showHomepage");

// TARIFS (HORAIRES)
$router->get('/tarifs_horaires/', "TarifsController@showTarifHoraire");

// EQUIPE
$router->get('/equipe/', "EquipeController@showEquipe");

// HISTOIRE DU CLUB
$router->get('/histoire_du_club/', "HistoireController@showHistoire");


$router->run();
