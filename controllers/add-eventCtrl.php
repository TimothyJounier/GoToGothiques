<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

include(dirname(__FILE__) . '/../config/regex.php');

include(dirname(__FILE__) . '/../models/event.php');



$errorsArray = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

     // TITLE
     // On verifie l'existance et on nettoie
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_VALIDATE_BOOLEAN));

     //On test si le champ n'est pas vide
     if(!empty($title)){
         // On test la valeur
        
         }
     }else{
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
     }

// ***************************************************************

// // Equipe
//      // On verifie l'existance et on nettoie
//      $id_team = trim(filter_input(INPUT_POST, 'team', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
//      //On test si le champ n'est pas vide
//      if(!empty($id_team)){
//          // On test la valeur
//          $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$titre);
 
//          if($testRegex == false){
//              $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
//          }
//      }else{
//          $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
//      }

// ***************************************************************
     // DATE ET HEURE DE L'EVENT
    // On verifie l'existance et on nettoie
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

// ***************************************************************
     // DATE ET HEURE DE L'EVENT
    // On verifie l'existance et on nettoie
    $description= trim(filter_input(INPUT_POST, 'description', FILTER_VALIDATE_BOOLEAN, FILTER_FLAG_NO_ENCODE_QUOTES));



// ***************************************************************
//     // Adresse
//      // On verifie l'existance et on nettoie
//      $adresse = trim(filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
//      //On test si le champ n'est pas vide
//      if(!empty($adresse)){
//          // On test la valeur
//          $testRegex = preg_match(REGEXP_ADRESSE,$adresse);
 
//          if($testRegex == false){
//              $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
//          }
//      }else{
//          $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
//      }

//      // On nettoie le champ description
//      $inputDescription = trim(filter_input(INPUT_POST, 'inputDescription', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));


// ***************************************************************
// Si il n'y a pas d'erreurs, on enregistre un nouvel event
var_dump($errorsArray);
if(empty($errorsArray)){
    $event = new Event();
    $event->setTitle($title);
    $event->setDate($date);
    $event->setDescription($description);
    $resultCreatedEvent = $event->create();
    if($resultCreatedEvent===false){
        $errorsArray['register_error'] = 'Enregistrement impossible (l\'evenement existe déjà ?)';
    }
}



/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/evenements/add-event.php');
    // include(dirname(__FILE__) . '/../views/appointments/list-appointment.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

