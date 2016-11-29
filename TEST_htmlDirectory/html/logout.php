<?php
    session_id("login");
    
    session_start();
    // remove all session variables
    
    session_unset(); 
    // destroy the session 
    
    session_destroy();
    
    sleep(5);
    header('location: ../../index.php');
?>
    