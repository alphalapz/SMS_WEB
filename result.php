<?php
include 'header.php';
require 'functionsphp.php';
session_start();
if(isset($_SESSION['TEMP'])){
	
    include 'menuChofer.php';
	include 'footer.php';
	echo $_SESSION['TEMP'];
	// unset($_SESSION['TEMP']);
}
else{
	redirectPHP('index.php');
}
?>	