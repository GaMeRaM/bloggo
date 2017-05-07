<?php
// Include the main class, the rest will be automatically loaded
require 'vendor/autoload.php';
include 'config.php';
// Create the controller, it is reusable and can render multiple templates
$core = new Dwoo\Core();
$tpl = new Dwoo\Template\File($theme_path.'edit.tpl');
//----------------------------
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("connetion failed: " . $conn->connect_error);
}

$result = $conn->query($sql);
if (isset($_POST[id])){
	$sql = "select * from test WHERE id=". $_POST[id];
	$result = $conn->query($sql);
	while ($row = $result->fetch_assoc()){
		$header=$row[header];
		$text=$row[text];
		$id=$row[id];
	}
}
//----------------------------
// Create some data
$data = new Dwoo\Data();
$data->assign('header', $header);
$data->assign('text', json_encode($text));
$data->assign('id', $id);
//-------------------------------
session_start();
if (isset($_SESSION["user"])){
	$logged=true;
	$data->assign('user', $_SESSION["user"]);
} else {
	$logged=false;
}
$data->assign('logged', $logged);
//-------------------------------

echo $core->get($tpl, $data);
//foreach($rows as $post){
	//echo $core->get($tpl, $post);
//}

?>

