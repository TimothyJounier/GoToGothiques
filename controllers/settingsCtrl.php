<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');

include(dirname(__FILE__) . '/../models/user.php');

$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));


$userSettings= User::getUserSettings();


// $userSettingsRoles= User::getUserSettingsRoles($id,$title);
/*****************************************************/

/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/settings.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');