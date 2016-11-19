<?php  
    session_start();
    $username = $_SESSION['username'];
    $permission_level = $_SESSION['permission'];
    $name = $_SESSION['name'];

    if($name == ''){
    	$permission_level = 0;
    	echo 'Welcome Guest! <a href = "/html/login.html">Login</a><br><br> Need an Account? Register as a <a href = "/html/newUser.php">Student</a> or <a href = "/html/newResearcher.php">Researcher</a>';

    }else{
    	echo 'Welcome, ' . $name . '! <a href = "/html/logout.php/">Log Out</a>';
	}	
?>
<html>

<form method = "POST" action = "/html/index.php">
        <button class="col-md-1" type="submit" name="upload_manifest">Return</button>
        </form>
<head>
<title>Hello World, CS4320!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<div class = "container">
		<br>
	
	
		<div class="well">
			<div class="well row">
				<div class = "col-md-10">
					<?php
						session_name("manifest_view");
						session_start();
						$doc = $_SESSION["doc"];
						var_dump($doc);

						extract($doc);


						echo '

						<h3>Manifest Name: ' . $manifest['researchObject']['title'] . '</h3>
						<div style="padding-left: 30px">
						<p>Author: ' . $manifest['creator'] . '</p>
						<p>Date: ' . $manifest['dateCreated'] . '</p>
						</div>



						';
					?>
					
				</div>
				<button class="col-md-2">Download</button>
				<button class="col-md-2">Update</button>
				<button class="col-md-2">Delete</button>

			</div>
			
		</div>
	</div>


</body>

</html>

