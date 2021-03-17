<?php

DEFINE('DSN', 'mysql:host=localhost;dbname=gotogothiques;port=8889');
DEFINE('LOGIN', 'timothyadmin');
DEFINE('PASSWORD', 'IYTTbvP2mUNvLsDZ');
DEFINE('NB_ELEMENTS_BY_PAGE', 10);


// CODE MESSAGE
$displayMsg = array(

    '0' => ['type' => 'alert-danger', 'msg' => 'Une erreur inconnue s\'est produite'],

    // Utilisateur
    '1' => ['type' => 'alert-success', 'msg' => 'L\'utilisateur a bien été ajouté'],

    '2' => ['type' => 'alert-success', 'msg' => 'L\'utilisateur a bien été mis à jour'],

    '3' => ['type' => 'alert-danger', 'msg' => 'L\'utilisateur n\'a pas été trouvé'],

    '4' => ['type' => 'alert-danger', 'msg' => 'L\'utilisateur n\'a pas été enregistré en base de données'],

    '5' => ['type' => 'alert-danger', 'msg' => 'L\'utilisateur n\'a pas été mis à jour'],

    '8' => ['type' => 'alert-success', 'msg' => 'L\'utilisateur a bien été connecté'],
    
    
    // Event

    '6' => ['type' => 'alert-success', 'msg' => 'L\'event a bien été mis à jour'],

    '7' => ['type' => 'alert-danger', 'msg' => 'L\'event n\'a pas été mis à jour'],

    '9' => ['type' => 'alert-success', 'msg' => 'L\'event a bien été ajouté'],

    '10' => ['type' => 'alert-danger', 'msg' => 'L\'event n\'a pas été enregistré en base de données'],

    '11' => ['type' => 'alert-danger', 'msg' => 'L\'utilisateur n\'a pas été trouvé'],


    // Mail

    '23000' => ['type' => 'alert-danger', 'msg' => 'Le mail est déjà existant'],
    
);