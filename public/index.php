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
$router->get('/admin/logout/', "AdminController@logout");

// ACTUALITES MANAGER
$router->get('/admin/actualites/', "AdminController@showActualitesManager");
$router->get('/admin/actualites/nouvelle_actualite/', "AdminController@showInsertionActualite");
$router->get('/admin/actualites/update/:id_actualite/', "AdminController@showUpdatedActualite");

// TARIFS MANAGER
$router->get('/admin/tarifs/', "AdminController@showTarifsManager");
$router->get('/admin/tarifs/nouveau_tarif/', "AdminController@showInsertionTarif");

// EQUIPE MANAGER
$router->get('/admin/equipe/', "AdminController@showEquipeManager");
$router->get('/admin/equipe/nouvelle_equipier/', "AdminController@showInsertionEquipier");

// ACTUALITES
$router->get('/', "ActualitesController@showHomepage");
$router->get('/actualites/', "ActualitesController@showActualites");
$router->post('/newActualite/', "ActualitesController@newActualite");
$router->get('/admin/actualites/delete/:id_actualite/', "ActualitesController@deleteActualite");
$router->post('/updateActualite/', "ActualitesController@updateActualite");

// TARIFS (HORAIRES)
$router->get('/tarifs_horaires/', "TarifsController@showTarifHoraire");

// EQUIPE
$router->get('/equipe/', "EquipeController@showEquipe");

// HISTOIRE DU CLUB
$router->get('/histoire_du_club/', "HistoireController@showHistoire");


$router->run();
