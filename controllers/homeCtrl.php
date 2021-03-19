<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

include(dirname(__FILE__) . '/../models/event.php');
include(dirname(__FILE__) . '/../models/registrer.php');
require_once(dirname(__FILE__) . '/../config/config.php');




$eventHome = Event::getEventHome();

/**************************/
// Inscription Event 

$errosArray = array();


          if(isset($_SESSION['id'])){
            if(empty($errorsArray) ){    

                $id_user = intval($_SESSION['id']); // récupére l'id user
                
                $id_event = $eventHome->id; // récupére l'id user
                
            
                $addUserEvents = new Register(); // Instance
                $addUserEvents->setIdUser($id_user); //hydrate
                $addUserEvents->setIdEvent($id_event);//hydrate
                $resultAddUser = $addUserEvents->addUserEvent();
                if($resultAddUser==true){
                    header('location: /controllers/homeCtrl.php?msgCode=12');
                } else {
                    // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
                    $msgCode=$resultAddUser;
                }
            }
          }
        



// if(isset($_POST['inscriptionEvent'])){
//     $id_user = intval($_SESSION['id']);
//     $addUserEvents = new Register();
//     $addUserEvents->setIdUser($id_user);
//     $id_event = $addUserEvents->id;
// }









/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/home.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');