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
<title>Hello World, CS4320! hi :3</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<!--
	<nav class="navbar navbar-fixed-top navbar-inverse">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">SWE_Group 10</a>
	    </div>
	    <div id="navbar" class="collapse navbar-collapse">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	        <li><a href="#about">About</a></li>
	        <li><a href="#contact">Contact</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>-->

	<div class = "container">
		<br>
		<br>		
		<br>
		<div>
			<div style="display:inline" class="col-md-1">Search: </div>
			<input class="col-md-5" type="text" name="browse_manifest">
			<button class="col-md-3" type="submit" name="manifest_search">Manifest Search</button>
			<button class="col-md-3" type="submit" name="keyword_search">Keyword Search</button>
		</div>
		<br>
		<br>
		<div class="well">
			<button class="col-md-3" type="submit" name="create_new_manifest">Create New Manifest</button>
			<br>
			<hr style="border-top-color:black;">
			<div>
				List:
				<div class="well row">
					<div class="col-md-9">
						Meta data
					</div>
					<div class="col-md-3">
						<button>Update</button>
						<button>Delete</button>
					</div>
				</div>
				<div class="well row">
					<div class="col-md-9">
						<p>Meta data</p>
						<p>Other Stuff</p>
						<p>Meta data</p>
						<p>Other Stuff</p>
					</div>
					<div class="col-md-3">
						<button>Update</button>
						<button>Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>

