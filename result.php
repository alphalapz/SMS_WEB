<?php
##	THIS WAS CREATED FOR THE ISSUE DETECTED ON REFRESH F5 IN THE NAVIGATOR CHROME
include 'header.php';
require 'functionsphp.php';
session_start();
// Validate if $_SESSION['CONTENT'] was established ELSE REDIRECT TO INDEX
if(isset($_SESSION['CONTENT'])){
	include 'logo.php';
    include 'menuChofer.php';
	//print the result of the upload
	echo $_SESSION['CONTENT'];
	//clear the $_SESSION['CONTENT']
	unset($_SESSION['CONTENT']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	echo "Cargar otra evidencia de la misma orden de embarque:";
	btnBack('folios.php');
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	include 'footer.php';
}
else{
	redirectPHP('index.php');
}
?>	