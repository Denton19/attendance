<?php 
require_once 'db/conn.php';
//Get values from post operation

if (isset ($_POST['submit'])){
// extract value from the post array
    $id = $_POST['id'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $specialty = $_POST['specialty'];

//call crd function
    $result = $crud->editAttendee($id,$fname,$lname,$dob, $email, $contact, $specialty);
//redirect to index.php
        if($result){
            header("Location: viewrecords.php");

        }

else{
    include 'includes/errormessage.php';
    //echo 'error';
    }
}
else{
    include 'includes/errormessage.php';
    //echo 'error';
}



?>