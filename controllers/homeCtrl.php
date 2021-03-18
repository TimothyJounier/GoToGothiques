<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
include(dirname(__FILE__) . '/../models/event.php');
/*****************************************************/
// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));


$eventHome = Event::getEventHome($id);



/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/home.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');