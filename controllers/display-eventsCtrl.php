<?php
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

require_once(dirname(__FILE__) . '/../models/event.php');


// Nettoyage de l'id passé en GET dans l'url
$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
/*************************************************************/

// Appel à la méthode statique permettant de récupérer toutes les infos d'un patient
$event = Event::get($id);
/*************************************************************/

// // Appel à la méthode statique permettant de récupérer tous les rdv d'un patient
// $allAppointments = Appointment::getAllByIdPatient($id);
// /*************************************************************/

// Si le patient n'existe pas, on redirige vers la liste complète avec un code erreur
if(!$event){
    header('location: /controllers/list-eventsCtrl.php?msgCode=3');
}
/*************************************************************/


/* ************* AFFICHAGE DES VUES **************************/

include(dirname(__FILE__) . '/../views/templates/header.php');
    include(dirname(__FILE__) . '/../views/evenements/display-events.php');
    // include(dirname(__FILE__) . '/../views/appointments/list-appointment.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');

/*************************************************************/