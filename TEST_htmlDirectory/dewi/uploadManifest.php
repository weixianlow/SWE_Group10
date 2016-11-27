<!DOCTYPE html>
<html>
<head>
<title>Upload Manifest</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">

<br>
<br>
<div class="well">
	<h2><b>Upload Manifest</b></h2><br>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

	    <input type="file" name="ufile" \><br><br> 
	    <input type="submit" value="Upload" name="submit"\>

	</form>

</div>


<?php

if(isset($_POST["submit"])){
	$uploads_dir = '/var/www/html/test-cs4320/SWE_Group10/public/dewi';
   if(isset($_FILES['ufile']['name'])){
       $tmpName = $_FILES['ufile']['tmp_name']; 
       $newName = $_FILES['ufile']['name'];  

       if(!is_uploaded_file($tmpName) || !move_uploaded_file($tmpName, "$uploads_dir/$newName")){
            echo '<div class="alert alert-danger">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> FAILED to upload, Try again!</p>
            	  </div>';
                 
       } else {
            echo '<div class="alert alert-info">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> File UPLOADED!</p>
            	  </div>';
			
			$m = new MongoClient();
			echo "connection to db success";
			
			$db = $m->test;
			
			echo"database selected";
			
			$collection = $db->manifest;
			echo"into collection";
			
			
			
           	//convert json into php array
        	$manifest=file_get_contents('$uploads_dir/$newName');
        	$json = json_decode($manifest, TRUE);


			foreach($json as $update){
				$collection->insert($update);
				echo"inserted";
			}
			
			
			
			

  /*      	
        	foreach ($json['items'] as $address)
			{
			    echo "items:". $address['address'] ."\n";
			};*/
       }


   } else {
     echo '<div class="alert alert-danger">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> You need to select a file, please try again!</p>
            	  </div>';
  }
 



 }




?>
</div>
</body>
</html>