<?php
       
	$username = $_POST['username'];
    $pass = $_POST['password'];
        
    $m = new MongoClient();
    echo 'successful connection to database';
    $db = $m->SWE;
    $c = $db->user;

    $user = $c->find('username' => $username);
    
    var_dump($user);


    //get salt and hashed_passwor, first name from db


    if(password_verify($salt.$pass, $hashed_password)){          //session start
        
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["permission"] = $permission;
        $_SESSION["name"] = $name_first;
        header("Location: /BrowseManifest.php/");   
            
	}else{
        echo 'Invalid login.';
        echo '<a href = "/index.php/">Back to Login</a>';
    }
 
       
    	
?>	