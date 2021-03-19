<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

include(dirname(__FILE__) . '/../models/event.php');
include(dirname(__FILE__) . '/../models/registrer.php');



$eventHome = Event::getEventHome();


/**************************/
// Inscription Event 

$errosArray = array();

if(isset($_POST['inscriptionEvent'])){
    $id_user = intval($_SESSION['id']);
    $id_event = $addUserEvents->id;
}

// if(empty($errorsArray)){
    $addUserEvents = new Register();
//     $addUserEvents->setIdEvent($id_event);
//     $addUserEvents->setIdUser($id_user);
//     $resultaddUserEvent = $addUserEvents->addUserEvent();
//     if($resultaddUserEvent){
//         header('location: /controllers/homeCtrl.php?msgCode=9');
//     } else {
//         $errorsArray['register_error'] = 'Enregistrement impossible (l\'evenement existe déjà ?)';
//         }
//     }







/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/home.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');