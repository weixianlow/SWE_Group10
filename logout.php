<?php
    session_id("login");
    
    session_start();
    // remove all session variables
    
    session_unset(); 
    // destroy the session 
    
    session_destroy();
    if(session_destroy())
    {
        echo '<script>alert("working")</script>';
    }
    sleep(2);
    header('location: ../../index.php');
?>
    