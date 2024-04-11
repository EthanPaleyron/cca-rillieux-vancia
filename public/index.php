<?php

session_start();

use Project\DatabaseCreator;

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$DatabaseCreator = new DatabaseCreator();
$DatabaseCreator->checkDatabase();

$router = new Project\Router($_SERVER["REQUEST_URI"]);

// ADMIN
$router->get('/admin/login/', "AdminController@showLogin");
$router->post('/adminLogin/', "AdminController@login");
$router->get('/admin/dashboard/', "AdminController@dashboard");
$router->get('/admin/logout/', "AdminController@logout");

// ACTUALITES MANAGER
$router->get('/admin/actualites/', "AdminController@showActualitesManager");
$router->get('/admin/actualites/nouvelle_actualite/', "AdminController@showInsertionActualite");
$router->get('/admin/actualite/update/:id_actualite/', "AdminController@showUpdatedActualite");

// TARIFS MANAGER
$router->get('/admin/tarifs/', "AdminController@showTarifsManager");
$router->get('/admin/tarifs/nouveau_tarif/', "AdminController@showInsertionTarif");
$router->get('/admin/tarif/update/:id_tarif/', "AdminController@showUpdatedTarif");

// HORAIRES MANAGER
$router->get('/admin/horaires/', "AdminController@showHorairesManager");
$router->get('/admin/horaires/nouvelle_horaire/', "AdminController@showInsertionHoraire");
$router->get('/admin/horaire/update/:id_horaire/', "AdminController@showUpdatedHoraire");

// EQUIPE MANAGER
$router->get('/admin/equipe/', "AdminController@showEquipeManager");
$router->get('/admin/equipe/nouvelle_equipier/', "AdminController@showInsertionEquipier");
$router->get('/admin/equipier/update/:id_equipier/', "AdminController@showUpdatedEquipier");

// ACTUALITES
$router->get('/', "ActualitesController@showHomepage");
$router->get('/actualites/page/:n_page/', "ActualitesController@showActualites");
$router->post('/newActualite/', "ActualitesController@newActualite");
$router->get('/admin/actualite/delete/:id_actualite/', "ActualitesController@deleteActualite");
$router->post('/updateActualite/', "ActualitesController@updateActualite");

// TARIFS & HORAIRES
$router->get('/tarifs_horaires/', "TarifsController@showTarifHoraire");
// TARIFS
$router->post('/newTarif/', "TarifsController@newTarif");
$router->get('/admin/tarif/delete/:id_tarif/', "TarifsController@deleteTarif");
$router->post('/updateTarif/', "TarifsController@updateTarif");
// HORAIRES
$router->post('/newHoraire/', "HorairesController@newHoraire");
$router->get('/admin/horaire/delete/:id_horaire/', "HorairesController@deleteHoraire");
$router->post('/updateHoraire/', "HorairesController@updateHoraire");

// EQUIPE
$router->get('/equipe/', "EquipeController@showEquipe");
$router->post('/newEquipier/', "EquipeController@newEquipier");
$router->get('/admin/equipier/delete/:id_equipier/', "EquipeController@deleteEquipier");
$router->post('/updateEquipier/', "EquipeController@updateEquipier");

// HISTOIRE DU CLUB
$router->get('/histoire_du_club/', "HistoireController@showHistoire");


$router->run();
