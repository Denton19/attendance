<?php

class user{
    // private database object
    private $db;
    //constructor to initialize private variable to the database
    function __construct($conn){
        $this->db = $conn;
    }

    public function insertUser($userName, $password){
        try {
            $result = $this->getUserByUsername($userName);
           if($result ['num'] > 0){
                return false;
            }else{
            
                $new_password = md5($password.$userName); 
                $sql = "INSERT INTO users (userName, password) VALUES (:userName,:password)";
                //prepare the sql statement to be executed//
                $stmt = $this->db->prepare($sql);
        
                $stmt->bindparam( ':userName', $userName);
                $stmt->bindparam( ':password', $new_password);
            
                //execute statement
            $stmt->execute();
            return true;
           }
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false; 
            //throw $th;
        }


    }

    public function getUser($userName, $password){
        try {
            //$result = $this->getUserByUsername($userName);
           // if($result ['num'] > 0){
                //return false;
            //}else{
                
                $sql = " select * from users where userName = :userName AND password = :password ";
                $stmt = $this->db->prepare($sql);
                $stmt ->bindparam(':userName', $userName);
                $stmt ->bindparam(':password', $password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            //code...
            //}
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            //throw $th;
        }


    }
    public function getUserByUsername($userName){
        try {
            $sql = "select count(*) as num from users where userName = :userName ";
            $stmt = $this->db->prepare($sql);
            $stmt ->bindparam(':userName', $userName);
          
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
            //code...
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
            //throw $th;
        }


    }

}

?>