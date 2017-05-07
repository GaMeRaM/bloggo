<?php
	session_start();
	header("Cache-control: private");
	session_unset();
	header("Location: ./index.php");
?>