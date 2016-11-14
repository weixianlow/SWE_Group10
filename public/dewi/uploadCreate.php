<!DOCTYPE html>
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
			<br>
			<br>
			
			<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

				<input type="file" name="ufile" \><br>
				<input type="submit" value="Upload" \>

			</form>
			
			<?php
 
				 if(isset($_FILES['ufile']['name'])){
					   echo "<p>Uploading: ".$_FILES['ufile']['name']."</p>";
				   } else {
					   echo "You need to select a file.  Please try again.";
				   }

				?>

				<?php
					$uploads_dir = '/var/www/html/test-cs4320/SWE_Group10/public/dewi';
				    if(isset($_FILES['ufile']['name'])){
					   echo "Uploading: ".$_FILES['ufile']['name']."<br>";

					   $tmpName = $_FILES['ufile']['tmp_name']; 
					   $newName = $_FILES['ufile']['name'];  

					   if(!is_uploaded_file($tmpName) || !move_uploaded_file($tmpName, "$uploads_dir/$newName")){
							echo "FAILED TO UPLOAD " . $_FILES['ufile']['name'] .
								 "<br>Temporary Name: $tmpName <br>";
					   } else {
							echo "File uploaded.  Thank you!";
					   } 

				   } else {
					 echo "You need to select a file.  Please try again.";
				  }
			?>
			
		</div>
		
	</div>


</body>

</html>

