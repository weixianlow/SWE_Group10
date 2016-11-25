<?php  
    session_start();
    $username = $_SESSION['username'];
    $permission_level = $_SESSION['permission'];
    $name = $_SESSION['name'];
?>
<html>

<form method = "POST" action = "/html/index.php">
        <button class="col-md-1" type="submit" name="upload_manifest">Return</button>
        </form>
<head>
<title>Hello World, CS4320!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/view.js"></script>
</head>

<body>
	<nav class="navbar navbar-default navbar-inverse" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/html/index.php">HOME</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
				<ul id="login-dp" class="dropdown-menu">
					<li>
						 <div class="row">
								<div class="col-md-12 text-center">
									<br>
									<?php
									    if($name == ''){
									    	$permission_level = 0;
									    	echo 'Welcome Guest! <a href = "/html/login.html">Login</a>';

									    }else{
									    	echo 'Welcome, ' . $name . '! <a href = "/html/logout.php/">Log Out</a>';
										}	
									?>
									<br>
									<br>
									<br>

									<?php
									    if($name == ''){
									    	$permission_level = 0;
									    	echo 'Register as a <a href = "/html/newUser.php">Student</a> or <a href = "/html/newResearcher.php">Researcher</a>';

									    }else{
									    	echo 'Welcome, ' . $name . '! <a href = "/html/logout.php/">Log Out</a>';
										}	
									?>
									<br>
									<br>
								</div>
						 </div>
					</li>
				</ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div class = "container">
		<br>
	
	
		<div class="well row">
				<div class="col-md-10">
					<?php
						session_name("manifest_view");
						session_start();
						$doc = $_SESSION["doc"];


						echo '<pre id="manifest-details">';
						var_dump($doc);

						extract($doc);
						echo '</pre>';

						echo '
						<div id="manifest-overview">
							<h3>Manifest Name: ' . $researchObject['title'] . '</h3>
							<div style="padding-left: 30px">
								<p>Author: ' . $creator . '</p>
								<p>Date: ' . $dateCreated . '</p>
							</div>
							<br>
						</div>
						';
					?>
					
				</div>
				<button class="col-md-2 ph-button ph-btn-blue">Download</button>
				<button class="col-md-2 ph-button ph-btn-green">Update</button>
				<button class="col-md-2 ph-button ph-btn-red">Delete</button>
			
		</div>
	</div>


</body>

</html>

