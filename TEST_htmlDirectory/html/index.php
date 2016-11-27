<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission_level = $_SESSION['permission'];
    $name = $_SESSION['name'];
?>
<html>
<head>
<title>Hello World, CS4320! hi :3</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="../js/searchManifest.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<div style="display:inline" class="col-md-1 margin_space_top">Search: </div>
			<input class="col-md-5 margin_space_top" type="text" name="browse_manifest">
			<div class="btn-group margin_space_left" data-toggle="buttons">
				
				<label class="btn btn-success active">
					Manifest Search
					<input type="radio" name="options" id="option2" autocomplete="off" checked>
					<span class="glyphicon glyphicon-ok"></span>
				</label>

				<label class="btn btn-primary">
					Keyword Search
					<input type="radio" name="options" id="option1" autocomplete="off">
					<span class="glyphicon glyphicon-ok"></span>
				</label>

			</div>
		</div>
		<br>
		<br>
		<div class="well add_shadow">			
			<form method = "POST" action = "/html/uploadCreate.php">
				<button class="col-md-2 ph-button ph-btn-green" type="submit" name="upload_manifest">New Manifest</button>
			</form>
			<br>
			<hr class="custom-seperator custom-seperator-position" style="border-top-color:black;">
			<div>
				<ul class = "row">
					<?php
					//get all manifests from manifest collection and post links to view with manifest data
    				$m = new MongoClient();   
    				$db = $m->SWE;
    				$c = $db->manifest;    				

    				$cursor = $c->find();

    				foreach($cursor as $doc){	
    					
    					extract($doc);   					
    					session_name("manifest_view");
    					session_start();
    					$_SESSION["doc"] = $doc;
    					echo '
    					<div class="hl_divider row col-md-9 show_hover list_cell">
	    					<a href = "/html/view.php">
								<li style = "list-style-type: none;">
									' . $researchObject['title'] . '
								</li>
							</a>
						</div>';
    				}

					?>
				</ul>
			</div>
		</div>
	</div>


</body>

</html>

