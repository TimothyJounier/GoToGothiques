<?php

include(dirname(__FILE__) . '/../config/sessionStart.php');

include(dirname(__FILE__) . '/../config/regex.php');

include(dirname(__FILE__) . '/../models/user.php');



$errorsArray = array();


//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // PSEUDO
     // On verifie l'existance et on nettoie
     $pseudo = trim(filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
    
     
     //On test si le champ n'est pas vide
     if(!empty($pseudo)){
         // On test la valeur
         $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$pseudo);
 
         if($testRegex == false){
             $errorsArray['pseudo_error'] = 'Le pseudo n\'est pas valide';
         }
     }else{
         $errorsArray['pseudo_error'] = 'Le champ n\'est pas rempli';
     }

     // ***************************************************************
    
    // EMAIL
    // On verifie l'existance et on nettoie
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    

    //On test si le champ n'est pas vide
    if(!empty($email)){
        // On test la valeur
        $testMail = filter_var($email, FILTER_VALIDATE_EMAIL);

        if($testMail == false){
            $errorsArray['mail_error'] = 'L\'email n\'est pas valide ';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ n\'est pas rempli';
    }

    // ***************************************************************
    
    
     // PASSWORD et CONFIRM_PASSWORD
    //On test si les champ ne sont pas vides
    if(!empty($_POST['password']) && !empty($_POST['confirm_password'])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if($password != $confirm_password){
            $errorsArray['password_error'] = 'Les passwords ne correspondent pas '; 
        } else {
            $testRegex = preg_match(REGEX_STR_PASSWORD,$password);
            if($testRegex == false){
                $errorsArray['password_error'] = 'Merci de choisir un mdp valide répondant aux critères suivants (Au moins 8 car, 1 Maj, 1 min, 1chiffre, 1 special Char)';
            }
        }
    } else {
        $errorsArray['password_error'] = 'Les champs password sont obligatoires';
    }


 // Si il n'y a pas d'erreurs, on enregistre un nouveau utilisateur.

 $user = new User($pseudo, $email, $password);
 if(empty($errorsArray) ){
     $result = $user->create();
     if($result!=false){
        $_SESSION['id'] = $result;
         header('location: /controllers/homeCtrl.php?msgCode=1');
     } else {
         // Si l'enregistrement s'est mal passé, on affiche à nouveau le formulaire de création avec un message d'erreur.
         $msgCode = $result;
     }
 }
    
}     


/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/users/userConnexionRegistrer.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

