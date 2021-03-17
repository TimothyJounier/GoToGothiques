<?php

require_once(dirname(__FILE__).'/../utils/database.php');

class Event{
    private $_title;
    private $_date;
    private $_description;
    private $_pdo;


/**
     * Méthode magique appellée lors de l'instanciation de l'objet dans le controlleur. Elle permet d'hydrater notre objet 'Event'
     * 
     * @return boolean
     */
    public function __construct(){
        // Hydratation de l'objet contenant la connexion à la BDD
        $this->_pdo = Database::getInstance();
        
    }
    public function setTitle($title){
        $this->_title = $title;
    }

    public function setDate($date){
        $this->_date = $date;
    }

    public function setDescription($description){
        $this->_description = $description;
    }

    /**
     * Méthode qui permet de créer un event
     * 
     * @return boolean
     */
    public function create(){

        try{
            // Création de la requête SQL de création d'un event
            $sql = 'INSERT INTO `event` (`title`,`date`, `description`) 
                    VALUES (:title, :date, :description );';
            // Création de la requête préparée avec prepare() pour se protéger des injections SQL
            $sth = $this->_pdo->prepare($sql);

            // Association d'une valeur à un paramètre via bindValue.
            $sth->bindValue(':title',$this->_title,PDO::PARAM_STR);
            $sth->bindValue(':date',$this->_date,PDO::PARAM_STR);
            $sth->bindValue(':description',$this->_description,PDO::PARAM_STR);
            if($sth->execute()){
                //retourne le résultat de la méthode
                return $this->_pdo->lastInsertId();
            } else {
                return false;
            }
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

    }

/**
     * Méthode qui permet de lister tous les patients existants en fonction d'un mot clé et selon pagination
     * 
     * @return array
     */
    public static function getAll($search='', $limit=null, $offset=0){
        
        try{
            if(!is_null($limit)){ // Si une limite est fixée, il faut tout lister
                $sql = 'SELECT * FROM `event` 
                WHERE `title` LIKE :search  
                LIMIT :limit OFFSET :offset;';
            } else {
                $sql = 'SELECT * FROM `event` 
                WHERE `title` LIKE :search;'; 
            }

            $pdo = Database::getInstance();

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$search.'%',PDO::PARAM_STR);
            
            if(!is_null($limit)){
                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            }
            
            $stmt->execute();
            return($stmt->fetchAll());
        }
        catch(PDOException $e){
            return false;
        }

    }

/**
     * Méthode qui permet de récupérer le profil d'un patient
     * 
     * @return object
     */
    public static function get($id){
        
        $pdo = Database::getInstance();

        try{
            $sql = 'SELECT * FROM `event` 
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);

            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            return($sth->fetch());
        }
        catch(PDOException $e){
            return false;
        }


    }

/**
     * Méthode qui permet de mettre à jour un utilisateur
     * 
     * @return boolean
     */
    public function update($id){

        try{
            $sql = 'UPDATE `event` 
                    SET `title` = :title, 
                        `date` = :date,
                        `description` = :description
                    WHERE `id` = :id;';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':title',$this->_title,PDO::PARAM_STR);
            $sth->bindValue(':date',$this->_date,PDO::PARAM_STR);
            $sth->bindValue(':description',$this->_description,PDO::PARAM_STR);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            return($sth->execute()); 
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

/**
     * Méthode qui permet de supprimer un utilisateur
     * 
     * @return boolean
     */
    public static function delete($id){

        $pdo = Database::getInstance();

        try{
            $sql = 'DELETE FROM `event`
                    WHERE `id` = :id;';
            $sth = $pdo->prepare($sql);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            $sth->execute();
            if($sth->rowCount()==0)
                return 3;
            else
                return 10;
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

    /**
     * Méthode qui permet de compter les patients
     * 
     * @return int
     */
    public static function count($s){
        $pdo = Database::getInstance();
        try{
            $sql = 'SELECT * FROM `event`
                WHERE `title` LIKE :search;';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
            $stmt->execute();
            return($stmt->rowCount());
        }
        catch(PDOException $e){
            return 0;
        }
        
    }


}