<html>
<head>
<title>Hello World, CS4320!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/loginPage.js"></script>

</head>

<body>

	<div class = "container middle-div">
		<div class="login-page">
		  	<div class="form">
			<h3 class="title">Register</h3>
		    	<form class="login-form" action ="<?=$_SERVER['PHP_SELF']?>" method="POST">
			      	<input type="text" placeholder="First Name" name = "fname"/>
			      	<input type="text" placeholder="Last Name" name = "lname"/>
			      	<input type="text" placeholder="Email Address" name = "email"/>
			      	<input type="text" placeholder="Username" name = "username"/>
			      	<input type="password" placeholder="Password" name = "password"/>
			      	<input type="text" placeholder="Access Code" name = "code"/>
			      	<div>
				      	<button type = "submit" name = "submit" style="display: inline;">Create Account</button>
				      	<br>
				      	<br>
				      	
			      	</div>
			    </form>
			    <a href = "/html/index.html">Cancel</button>
	  		</div>
		</div>
			<?php
				if(isset($_POST['submit'])) { // Was the form submitted?

					$username = $_POST['username'];
					$salt = mt_rand();
					$hpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT) or die("bind param");
					$email = $_POST['email'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$permission = 2;
					$code = $_POST['code'];

					$user = array("username" => $username, "salt" => $salt, "hashed_password" => $hpass, "email" => $email, "fname" => $fname, "lname" => $lname, "permission_level" => $permission);

					$m = new MongoClient();
    				echo 'successful connection to database';
    				$db = $m->SWE;

    				$codes = $db->AccessCodes;
    				$codequery = array('value' => $code);
    				$match = $codes->find($codequery);

    				foreach ($match as $find){
    					$c = $db->user;
    					$c->insert($user);
    					echo 'user registered!';   					
    				}

    				//need negative feedback if wrong code used
    			
    				//else
    				//{
    			//		echo 'invalid code';
    			//	}

    			
				}
			?>
	</div>


</body>

</html>