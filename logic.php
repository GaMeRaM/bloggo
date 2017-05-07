<?php

    // Переменные с формы
    session_start();
    $header = $_POST['header'];
    $text = $_POST['text'];
    $id = $_POST[id];
    $user = $_SESSION["user"];
     
    // Параметры для подключения
    include 'config.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
    echo $_POST['delete'];
    if (isset($_POST['delete'])){
        $sql="DELETE FROM test WHERE id=". $_POST[id];
    } else if (isset($_POST['edit']) && isset($_POST['header']) && isset($_POST['text'])){
        $sql= "update test set header='".$header."', text='".$text."' where id=".$id;
    }else if (isset($_POST['header']) && isset($_POST['text'])){
        $sql= "INSERT INTO test (header,text, user) VALUES ('" . $header . "','" . $text . "', '". $user ."');";
    }
    $conn->query($sql);
    mysqli_close($conn);
    header('Location: ./index.php');

?>