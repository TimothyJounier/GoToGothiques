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

if($_SERVER['REQUEST_METHOD'] == 'POST'){

     // TITLE
     // On verifie l'existance et on nettoie
     $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES));

     //On test si le champ n'est pas vide
     if(empty($title)){
         // On test la valeur
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
         }
   
// ***************************************************************
     // DATE ET HEURE DE L'EVENT
    // On verifie l'existance et on nettoie
    $date = trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

// ***************************************************************
     // DATE ET HEURE DE L'EVENT
    // On verifie l'existance et on nettoie
    $description= trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));


// ***************************************************************
    // ***************************************************************

    // Si il n'y a pas d'erreurs, on met à jour l'event.
    if(empty($errorsArray)){    
        $event = new Event();
        $event->setTitle($title);
        $event->setDate($date);
        $event->setDescription($description);
        $resultUpdatedEvent = $event->update($id);
        if($resultUpdatedEvent ===true){
            header('location: /controllers/list-eventCtrl.php?msgCode=6');
        } else {
            // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
            $msgCode=$result;
        }
    }
} else {
    $event= Event::get($id);
    // Si l'event n'existe pas, on redirige vers la liste complète avec un code erreur
    if($event){
        $id = $event->id;
        $title = $event->title;
        $date = $event->date;
        $description = $event->description;
    } else {
        header('location: /controllers/list-eventCtrl.php?msgCode=11');
    }
    /*************************************************************/
}

/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/evenements/edit-events.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/