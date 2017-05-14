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
    #    $sql="DELETE FROM test WHERE id=". $_POST[id];
        $sql="DELETE FROM test WHERE id=(?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$_POST[id]);

    } else if (isset($_POST['edit']) && isset($_POST['header']) && isset($_POST['text'])){
        #$sql= "update test set header='".$header."', text='".$text."' where id=".$id;
        $sql= "update test set header=(?), text=(?) where id=(?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $header, $text, $id);
    }else if (isset($_POST['header']) && isset($_POST['text'])){
        #$sql= "INSERT INTO test (header,text, user) VALUES ('" . $header . "','" . $text . "', '". $user ."');";
        $sql= "INSERT INTO test (header,text, user) VALUES (?,?,?);";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $header,$text,$user);
    }
    $stmt->execute();
    #$conn->query($sql);
    mysqli_close($conn);
    header('Location: ./index.php');

?>