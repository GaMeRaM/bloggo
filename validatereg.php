<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
	<title>Login Failed</title>
</head>
<body>
	<div class="container">
	<?php
	include 'config.php';
	$user=$_POST[login];
	$user_password=sha1($_POST[password]);
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM users WHERE login='".$user."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
        echo "<div class='center'><h1>User exists</h1>";
        echo "<a href='./index.php' class='btn-large'>BACK</a></div>";
    }else{
    	$sql = "INSERT INTO `users`(`login`, `password`) VALUES ('". $user . "','". $user_password ."')";
    	if ($conn->query($sql) === TRUE) {
        	echo "Registered";
        }
        session_start();
        header("Cache-control: private");
        $_SESSION["access"] = "granted";
  		header("Location: ./index.php");
    }
	mysqli_close($conn);
	?>
	</div>
</body>
</html>
