<?php
       //Developement Connection
        //$host = '127.0.0.1';
        //$db = 'attendance_db';
        //$user = 'root';
        //$pass = '';
        //$charset = 'utf8mb4';


        //Remote database connection
        $host = 'remotemysql.com';
        $db = '4LZHNWIMfa';
        $user = '4LZHNWIMfa';
        $pass = 'vBzOJp8SGh';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try{
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            //echo 'hello Database';
        } catch (PDOException $e){

        
            throw new PDOException( $e->getMessage());
        }

        require_once 'crud.php';
        require_once 'user.php';
        $crud = new crud($pdo);
        $user = new user($pdo);


        $user->insertUser("admin", "password");


?>