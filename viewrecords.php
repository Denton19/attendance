<?php
    $title = 'Index';

    require_once 'includes/header.php' ;
    require_once 'db/conn.php';

    // get all attachments
    $results = $crud->getAttendees();

?>

    <table class="table">
        <tr>
        <th> # </th>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Speciality</th>
        <th>Actions</th>
    
    </tr>
        
    <?php
    while( $r = $results->fetch(PDO::FETCH_ASSOC)){ ?>

    <tr>
            <td> <?php echo $r['attendee_id'] ?> </td>
            <td> <?php echo $r['firstname'] ?> </td>
            <td> <?php echo $r['lastname'] ?> </td>
             <td> <?php echo $r['name'] ?> </td>
             <td>
                 <a href="view.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-primary">View </a>
                 <a href="edit.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-warning">Edit </a>
                 <a onclick="return confirm('Are YOU Sure You Want To Delete This Record?');" 
                 href="delete.php?id=<?php echo $r['attendee_id'] ?>" class = "btn btn-danger">Delete </a>
            </td>
                
        </tr>

    <?php } ?>
    </table>

<br>
<br>
<br>
<br>


    <?php require_once 'includes/footer.php' ;?>