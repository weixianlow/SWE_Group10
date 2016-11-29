<?php
    session_id("login");
    
    session_start();
    // remove all session variables
    
    session_unset(); 
    // destroy the session 
    
    session_destroy();
       
      
    
    echo "<script>alert('You are successfully logged out.')</script>";
    echo "<a href = '../../index.php'>Successful log out. Click to go back home.</a>";
    //sleep(10);

    //header('location: ../../index.php');
    
    
?>
    