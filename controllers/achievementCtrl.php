<?php

/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

require_once(dirname(__FILE__) . '/../models/user.php');

// Nettoyage de l'id du patient passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*********************************************************/

// Suppression du User, et de tous ses rendez-vous. Une contrainte ON DELETE CASCADE, permet de supprimer tous les
// enregistrements d'appointment également.  
$code = intval(User::suspendUser($id));

// On redirige vers la page du profil du User avec un code pour le message
header('location: /controllers/list-usersCtrl.php');
/*************************************************************/