
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
  if($permission_level == 2){
	$uploads_dir = '/var/www/html/test-cs4320/SWE_Group10/public/json';
   if(isset($_FILES['ufile']['name'])){
       $tmpName = $_FILES['ufile']['tmp_name']; 
       $newName = $_FILES['ufile']['name']; 
       $extension = pathinfo($newName,PATHINFO_EXTENSION);
       $noError = 1;

        //file already exists error checker
        if (file_exists("$uploads_dir/$newName")) {
            echo '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> File already exists!</p>
                </div>';
                 
            $noError = 0;
        } 

        //file size checker
        if ($_FILES["ufile"]["size"] > 500000) {
            echo '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> Your file is too large!</p>
                </div>';
            $noError = 0;
        } 

        //file extension checker
        if($extension!=='json'){
            echo '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> The file must be in JSON format!</p>
                </div>';
            $noError = 0;
        }


       if( $noError == 0 || !is_uploaded_file($tmpName) || !move_uploaded_file($tmpName, "$uploads_dir/$newName") ){
            echo '<div class="alert alert-danger">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> FAILED to upload, Try again!</p>
            	  </div>';
                 
       } else {

        
            echo '<div class="alert alert-info">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> File UPLOADED!</p>
            	  </div>';

              // connect to mongodb
             $m = new MongoClient();
             //echo "Connection to database successfully";

             
            
             // select a database
             $db = $m->SWE;
             //echo "Database mydb selected";
             $collection = $db->manifest;
             //echo "Collection selected succsessfully";
            

             $fileContent = file_get_contents("$uploads_dir/$newName");

             $json = json_decode($fileContent);
             
            
             $collection->insert(array($json));
             echo'<div class="alert alert-info">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> Data inserted into the database!</p>
                </div>';
              //echo '<pre>';
              //print_r($json);
              //echo '</pre>';

          

                         
             foreach ($json as $key => $value) {
                  if (is_array($value)) {
                    foreach ($value as $key => $val) {
                          echo $key . '= ' . $val . '<br/>';
                     
                    }
                  } 
                  else 
                  {
                      echo $key . ': ' . $value . '<br/>'; 
                  }
                  
              }




       }


   } else {
     echo '<div class="alert alert-danger">
              		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              		<p> You need to select a file, please try again!</p>
            	  </div>';
    }
    }
    else {
      echo '<div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> You are not a researcher, you can not upload manifest!</p>
                </div>';
    }
}

?>

  <h2>Details</h2>
    <div class="well">
      <div class="well">
        <p>Manifest Name: kdlfd</p>
        <p>Author Name: kdlfd</p>
        <p>Date: kdlfd</p>
      </div>
      <div class="well">
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
>>>>>>> master
