<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

require_once(dirname(__FILE__) . '/../config/regex.php');

require_once(dirname(__FILE__) . '/../models/event.php');


// Initialisation du tableau d'erreurs
$errorsArray = array();
/*************************************/

// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

$errorsArray = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

     // TITLE
     // On verifie l'existance et on nettoie
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES));

     //On test si le champ n'est pas vide
     var_dump($errorsArray);
     if(empty($title)){
         // On test la valeur
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
    $description= trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));



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
    // ***************************************************************

    // Si il n'y a pas d'erreurs, on met à jour le patient.
    if(empty($errorsArray) ){    
        $patient = new Event($title, $date, $description);
        $result = $event->update($id);
        if($result===true){
            header('location: /controllers/list-eventCtrl.php?msgCode=2');
        } else {
            // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
            $msgCode=$result;
        }
    }
} else {
    $event= Event::get($id);
    // Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
    if($event){
        $id = $event->id;
        $title = $event->title;
        $date = $event->date;
        $description = $event->description;
    } else {
        header('location: /controllers/list-eventCtrl.php?msgCode=3');
    }
    /*************************************************************/
}

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/evenements/edit-events.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/