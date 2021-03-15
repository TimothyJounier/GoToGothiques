<?php

include(dirname(__FILE__) . '/../config/sessionStart.php');

include(dirname(__FILE__) . '/../config/regex.php');

include(dirname(__FILE__) . '/../models/user.php');



$errorsArray = array();


//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // variable registrer nettoyer 
    $registrer = trim(filter_input(INPUT_POST, 'registrerAndConnexion', FILTER_SANITIZE_STRING));

    // On test si on est sur le form registrer
    if($registrer == 'registrer'){

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
 if(empty($errorsArray)){
    $user = new User();
    $user->setPseudo($pseudo);
    $user->setMail($email);
    $user->setPassword($password);
    $resultCreatedUser = $user->create();
    if($resultCreatedUser===false){
        $errorsArray['register_error'] = 'Enregistrement impossible (le mail existe déjà ?)';
    }
    if(empty($errorsArray)){
        // Mail d'envoi de vérification du compte
        // mail();
        // Ici on authentifie directement l'utilisateur enregistré
        $_SESSION['id'] = $resultCreatedUser;
        $_SESSION['id_roles'] = 1;
        header('location: /controllers/homeCtrl.php?msgCode=8');
    }
}

    } 

    // On test si on est sur le form login
    if($registrer == 'login'){

        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if(!empty($_POST['password']) && !empty($email)){

        $password = $_POST['password'];
        $user = new User();
        $user = $user->getUserLogin($email, $password);
        if($user){
            $_SESSION['id'] = $user->id;
            $_SESSION['id_roles'] = $user->id_roles;
            header('location: /controllers/homeCtrl.php?msgCode=8');
        } else {
            $errorsArray['login_error'] = 'Votre login ou mot de passe n\'est pas reconnu';
        }
        }
    }
    
    
}     


/*************** AFFICHAGE DES VUES *****************/

include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/users/userConnexionRegistrer.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

