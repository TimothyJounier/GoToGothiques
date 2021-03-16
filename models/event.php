<?php

// require_once(dirname(__FILE__).'/../utils/database.php');

// class Event {
//     private $_title;
//     private $_date;
//     private $_description;
//     private $_id_game;
//     private $_pdo;
// }

// /**
//      * Méthode magique appellée lors de l'instanciation de l'objet dans le controlleur. Elle permet d'hydrater notre objet 'Event'
//      * 
//      * @return boolean
//      */
//     public function __construct($title=NULL,$date;,$date=NULL,$description=NULL, $id_game=NULL,$idUser=NULL){
//         // Hydratation de l'objet contenant la connexion à la BDD
//         $this->_pdo = Database::getInstance();
//         $this->_title = $title;
//         $this->_date = $date;
//         $this->_description = $description;
//         $this->_id_game = $id_game;
//         $this->_idUser = $idUser;
//     }