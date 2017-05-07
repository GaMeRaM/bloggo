<?php
// Include the main class, the rest will be automatically loaded
require 'vendor/autoload.php';
include 'config.php';
// Create the controller, it is reusable and can render multiple templates
$parsedown = new Parsedown();
$core = new Dwoo\Core();
$tpl = new Dwoo\Template\File($theme_path . "index.tpl");

//----------------------------


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("connetion failed: " . $conn->connect_error);
}
if (isset($_GET[user])){
	$sql = "select * from test WHERE user='".$_GET[user]."' ORDER BY time DESC;";
} else {
	$sql = "select * from test ORDER BY time DESC;";
}


$result = $conn->query($sql);
if ($result->num_rows > 0){
	while ($rows[]=mysqli_fetch_assoc($result));
	array_pop($rows);
}
//----------------------------
// Create some data
$counter=0;
foreach ($rows as $stuff){
	$rows[$counter]['text']= $parsedown->text(htmlspecialchars_decode($stuff['text']));
	$counter=$counter+1;
}

$data = new Dwoo\Data();
$data->assign('title', 'Bloggiez');
$data->assign('posts', $rows);
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

