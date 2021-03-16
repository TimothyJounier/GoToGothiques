<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

$errorsArray = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

     // PSEUDO
     // On verifie l'existance et on nettoie
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
     //On test si le champ n'est pas vide
     if(!empty($title)){
         // On test la valeur
         $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$titre);
 
         if($testRegex == false){
             $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
         }
     }else{
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
     }

// ***************************************************************

// Equipe
     // On verifie l'existance et on nettoie
     $id_team = trim(filter_input(INPUT_POST, 'team', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
     //On test si le champ n'est pas vide
     if(!empty($id_team)){
         // On test la valeur
         $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$titre);
 
         if($testRegex == false){
             $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
         }
     }else{
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
     }

     // DATE ET HEURE DE L'EVENT
    // On verifie l'existance et on nettoie
    $dateHour = trim(filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

    //On test si le champ n'est pas vide
    if(!empty($dateHour)){
        // On test la valeur
        $testRegex = preg_match(REGEXP_DATE_HOUR,$dateHour);

        if($testRegex == false){
            $errorsArray['dateHour_error'] = 'Le date n\'est pas valide, le format attendu est JJ/MM/AAAA HH:mm';
        }
    }else{
        $errorsArray['dateHour_error'] = 'Le champ est obligatoire';
    }


    // Adresse
     // On verifie l'existance et on nettoie
     $adresse = trim(filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
     //On test si le champ n'est pas vide
     if(!empty($adresse)){
         // On test la valeur
         $testRegex = preg_match(REGEXP_ADRESSE,$adresse);
 
         if($testRegex == false){
             $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
         }
     }else{
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
     }

     // On nettoie le champ description
     $inputDescription = trim(filter_input(INPUT_POST, 'inputDescription', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

}










/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/evenements/add-event.php');
    // include(dirname(__FILE__) . '/../views/appointments/list-appointment.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/