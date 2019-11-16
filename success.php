<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';
    
        
            if (isset ($_POST['submit'])){
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $contact = $_POST['phone'];
                $specialty = $_POST['specialty'];
                // call function to insert and track
                $isSuccess = $crud->insertAttendees($fname,$lname,$dob,$email,$contact,$specialty);
                $specialtyName = $crud->getSpecialtiesById($specialty);
                
                if($isSuccess){ 
                        sendEmail::sendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registered for this year\'s IT Conference');
                        include 'includes/successmessage.php';
                       // echo '<h1 class="text-center text-success"> Congratulations, You Are Now Registered!!</h1>';

                    }
                    else{
                        include 'includes/errormessage.php';
                       //echo '<h1 class="text-center text-danger"> There was an Error in processing your registration </h1>';

                    }
            
            }

            
            ?>

        
        

<!--
 <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php //echo$_GET['firstname']. ' '.$_GET['lastname'];?>
        </h5>
        
        <h6>
        <p class="card-text"> Spicialization:
            <?php //echo$_GET['specialty']; ?>
        </p>

        <h6>
            <p class="card-text"> Date of Birth:
            <?php //echo$_GET['dob']; ?>
        </p>

        <h6> 
            <p class="card-text"> Email Address:
             <?php //echo$_GET['email']; ?>
        </p>

        <h6>
            <p class="card-text"> Contact Number:
                <?php //echo$_GET['phone']; ?>
        </p>
 
    </div>    
-->

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?php echo $_POST['firstname']. ' '.  $_POST['lastname']; ?>
        </h5>
        
        <h6>
        <p class="card-text"> Spicialization:
            <?php echo $specialtyName['name']; ?>
        </p>

        <h6>
            <p class="card-text"> Date of Birth:
            <?php echo $_POST['dob']; ?>
        </p>

        <h6> 
            <p class="card-text"> Email Address:
             <?php echo $_POST['email']; ?>
        </p>

        <h6>
            <p class="card-text"> Contact Number:
                <?php echo $_POST['phone']; ?>
        </p>
   

     </div>
     <!--
        <?php
       //echo $_POST[ 'firstname'];
      // echo $_POST[ 'lastname'];
       // echo $_GET[ 'dob'];
       // echo $_GET[ 'specialty'];
       // echo $_GET[ 'email'];
       // echo $_GET[ 'phone'];

        ?>   -->
<br>
<br>
<br>
<br>


    <?php require_once 'includes/footer.php' ;?>