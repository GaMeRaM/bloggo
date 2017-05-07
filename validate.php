<?php
	if (isset($_POST[login])&&isset($_POST[password])){
	include 'config.php';
	$user=$_POST[login];
	$user_password=sha1($_POST[password]);
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM users WHERE login='".$user."' AND password='". $user_password ."'";
	$result = $conn->query($sql);
	mysqli_close($conn);
	if ($result->num_rows > 0){
        echo "Logged in";
        session_start();
        header("Cache-control: private");
        $_SESSION["access"] = "granted";
        $_SESSION["user"] = $user;
  		header("Location: ./index.php");
    }else{
        echo "<div class='center'><h1>Wrong login or password</h1>";
        echo "<a href='./index.php' class='btn-large'>BACK</a></div>";
    }
	mysqli_close($conn);
	}
	else {
		header("Location: ./index.php");
	}
?>