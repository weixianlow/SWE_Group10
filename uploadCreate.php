<?php    
    session_start();
    $username = $_SESSION['username'];
    $permission_level = $_SESSION['permission'];
    $name = $_SESSION['name'];

    echo 'hello ' . $name;
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
			<br>
			<br>
			<p style="display:inline">File Picker</p>
			<input type="text" name="file_picker">
			<button type="submit">Choose File</button>
		</div>
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

