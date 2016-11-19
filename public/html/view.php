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
					<h3>Manifest Name: kdlfd</h3>
					<div style="padding-left: 30px">
						<p>Author Name: kdlfd</p>
						<p>Date: kdlfd</p>
					</div>
				</div>
				<button class="col-md-2">Download</button>
				<button class="col-md-2">Update</button>
			</div>
			<div class="well row">
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
				<p>A lot of JSON</p>
				<p>A lot of dfd</p>
				<p>A lot of fdfd</p>
				<p>A lot of sdsf</p>
				<p>A lot of fddeeeee</p>
			</div>
		</div>
	</div>


</body>

</html>

