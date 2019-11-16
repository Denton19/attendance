<?php 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!$_GET['id']){
        include 'includes/errormessage.php';
        header('Lacation: viewrecords.php');
    }else{
    $id = $_GET['id'];

//call delete
    $result = $crud->deleteAttendee($id);
        //redirect to list
    if($result){

        header("Location: viewrecords.php");
    }
    else{
        echo' ';
    }

}

?>