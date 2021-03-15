<?php

require_once(dirname(__FILE__).'/../utils/database.php');

class User{

    private $_pseudo;
    private $_email;
    private $_password;
    private $_pdo;

    // Méthode magique construct, appellée auto à l'instanciation de la classe 
    public function __construct(){
        $this->_pdo = Database::getInstance();
    }

    public function setPseudo($pseudo){
        $this->_pseudo = $pseudo;
    }

    public function setMail($email){
        $this->_email = $email;
    }

    public function setPassword($password){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $this->_password = $password_hash;
    }

    /**
     * Méthode magique qui permet d'hydrater notre objet 'patient' */
    public function getUserLogin($email, $password){

        $sql = "SELECT *  FROM `user` WHERE `email` = :email ;";
        $stmt = $this->_pdo->prepare($sql);

        // association des paramètres  
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        if($stmt->execute()){ // envoie de la requête
            $user = $stmt->fetch();
            if($user){
                // retourne l'id user si le mot de passe est vérifié
                if(password_verify($password, $user->password)){
                    return $user;
                } 
            }
        }
        return false;
    }


    /**
     * Méthode qui permet de créer un patient
     * 
     * @return boolean
     */
    public function create(){

        try{
            $sql = 'INSERT INTO `user` (`pseudo`,`email`, `password`) 
                    VALUES (:pseudo, :email, :password);';
            $sth = $this->_pdo->prepare($sql);

            $sth->bindValue(':pseudo',$this->_pseudo,PDO::PARAM_STR);
            $sth->bindValue(':email',$this->_email,PDO::PARAM_STR);
            $sth->bindValue(':password',$this->_password,PDO::PARAM_STR);
            if($sth->execute()){
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
                $sql = 'SELECT * FROM `user` 
                WHERE `pseudo` LIKE :search  
                LIMIT :limit OFFSET :offset;';
            } else {
                $sql = 'SELECT * FROM `user` 
                WHERE `pseudo` LIKE :search;'; 
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
            $sql = 'SELECT * FROM `user` 
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
     * Méthode qui permet de mettre à jour un patient
     * 
     * @return boolean
     */
    public function update($id){

        try{
            $sql = 'UPDATE `user` 
                    SET `pseudo` = :pseudo, 
                        `email` = :email,
                        `password` = :password
                    WHERE `id` = :id;';
            $sth = $this->_pdo->prepare($sql);
            $sth->bindValue(':pseudo',$this->_pseudo,PDO::PARAM_STR);
            $sth->bindValue(':email',$this->_email,PDO::PARAM_STR);
            $sth->bindValue(':password',$this->_password,PDO::PARAM_STR);
            $sth->bindValue(':id',$id,PDO::PARAM_INT);
            return($sth->execute()); 
        }
        catch(PDOException $e){
            return $e->getCode();
        }

    }

    /**
     * Méthode qui permet de supprimer un patient
     * 
     * @return boolean
     */
    public static function delete($id){

        $pdo = Database::getInstance();

        try{
            $sql = 'DELETE FROM `user`
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
            $sql = 'SELECT * FROM `user`
                WHERE `pseudo` LIKE :search;';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search','%'.$s.'%',PDO::PARAM_STR);
            $stmt->execute();
            return($stmt->rowCount());
        }
        catch(PDOException $e){
            return 0;
        }
        
    }


    // Suppression d'un user selon un id
    // public function delete($id){
    //     $sql = 'DELETE from `user` WHERE `id` = :id;';
    //     $stmt = $this->_pdo->prepare($sql);
    //     $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    //     return ($stmt->execute());
    // }

}

