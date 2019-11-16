<?php 
//The includes the session_start() to resume the session on this page.

include_once 'includes/session.php'?>
<?php 

//The session_destroy() destroys the session. 

    session_destroy();
    header('Location: index.php');
?>