<?php 
/*************** CONNEXION DE SESSION *****************/
include(dirname(__FILE__) . '/../config/sessionStart.php');
/*****************************************************/

include(dirname(__FILE__) . '/../config/regex.php');

$errorsArray = array();


//On ne controle que s'il y a des données envoyées 
if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // NAME
         // On verifie l'existance et on nettoie
         $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
     
         //On test si le champ n'est pas vide
         if(!empty($name)){
             // On test la valeur
             $testRegex = preg_match(REGEXP_STR_NO_NUMBER,$name);
     
             if($testRegex == false){
                 $errorsArray['name_error'] = 'Le pseudo n\'est pas valide';
             }
         }else{
             $errorsArray['name_error'] = 'Le champ n\'est pas rempli';
         }

         /****************************************************** */

         // EMAIL
    // On verifie l'existance et on nettoie
    $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));

    //On test si le champ n'est pas vide
    if(!empty($mail)){
        // On test la valeur
        $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);

        if($testMail == false){
            $errorsArray['mail_error'] = 'L\'email n\'est pas valide ';
        }
    }else{
        $errorsArray['mail_error'] = 'Le champ n\'est pas rempli';
    }


        /****************************************************** */
        
    // Message
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

       

    }

}
/*************** AFFICHAGE DES VUES *****************/
include(dirname(__FILE__) . '/../views/templates/header.php');

include(dirname(__FILE__) . '/../views/userContact.php');

include(dirname(__FILE__) . '/../views/templates/footer.php');

