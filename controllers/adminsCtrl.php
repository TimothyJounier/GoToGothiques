<?php

/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/admins.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');