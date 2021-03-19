<?php 

require_once(dirname(__FILE__).'/../utils/database.php');

class Register{

    private $_id_event;
    private $_id_user;
    private $_pdo;

     // Méthode magique construct, appellée auto à l'instanciation de la classe 
     public function __construct(){
        $this->_pdo = Database::getInstance();
    }

    public function setIdEvent($id_event){
        $this->_id_event = $id_event;
    }

    public function setIdUser($id_user){
        $this->_id_user = $id_user;
    }

   

/**
     * Méthode qui permet à l'utilisateur de s'inscrire à un évènement
     * 
     * @return bool
     */
    public function addUserEvent(){

        try{

            $sql = 'INSERT INTO `register` (`id_event`, `id_user`)
                    VALUE (:id_event, :id_user);';
            $stmt = $this->_pdo->prepare($sql);
            $stmt->bindValue(':id_event',$this->_id_event,PDO::PARAM_INT);
            $stmt->bindValue(':id_user',$this->_id_user,PDO::PARAM_INT);
            $stmt->execute();
        }
        catch(PDOException $e){
            return $e->getCode();
        }
        
    }


    
}