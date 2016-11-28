
<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission_level = $_SESSION['permission'];
    $name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>

 <form method = "POST" action = "../index.php">
        <button class="col-md-1" type="submit" name="upload_manifest">Return</button>
        </form>
<head>
<title>Upload Manifest</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/main.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      
      <a class="navbar-brand" href="../index.php">HOME</a>
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
<div class="container">

<br>
<br>
<div class="well add_shadow">

	<h2><b>Upload Manifest</b></h2><br>
	<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

	    <input class="ph-button ph-btn-grey" type="file" name="ufile" \><br><br> 
	    <input class="ph-button ph-btn-blue" type="submit" value="Upload" name="submit"\>


	</form>
	<br>
      <form method = "POST" action = "../index.php">
        <button class="ph-button ph-btn-red" type="submit" name="upload_manifest">Cancel</button>
      </form>
      <br>
      <br>

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
              		<p> File ' . $newName . ' UPLOADED!</p>
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
             
             //$doc = array($json);
            
             $collection->insert($json);
             echo'<div class="alert alert-info">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <p> Data inserted into the database!</p>
                </div>';
              

            // foreach ($json as $key => $value) {
            //       if (is_array($value)) {
            //               foreach ($value as $key2 => $val => $va) {
            //               echo $key . '= ' 
            //               echo $val . '= ' . $va . '<br/>';
            //          }
            //         } else {
                      
            //           echo $key . ': ' . $value . '<br/>'; 
            //       }
                  
            //   }
            //  }
                
              echo ' <div class="well">  <h2>Details</h2>';
              echo '<pre>';
              print_r($json);
              echo '</pre> </div>';

          

                        
             



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


    <div class="well add_shadow">
    <h2> <b>Type your JSON here!</b> </h2>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
      <textarea rows = "20" cols="149"> 
      </textarea> 
      <br>
      <br>
      <button class="ph-button ph-btn-green" type="submit" name="subs">Submit</button>

      </form>

      </div>
    </div>
</div>
</body>
</html>
