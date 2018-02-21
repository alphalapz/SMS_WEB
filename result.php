<?php
##	THIS WAS CREATED FOR THE ISSUE DETECTED ON REFRESH F5 IN THE NAVIGATOR CHROME
include 'header.php';
require 'functionsphp.php';
session_start();
// Validate if $_SESSION['CONTENT'] was established ELSE REDIRECT TO INDEX
if(isset($_SESSION['CONTENT'])){
	
    include 'menu.php';
	//print the result of the upload
	echo $_SESSION['CONTENT'];
	//clear the $_SESSION['CONTENT']
	unset($_SESSION['CONTENT']);
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	echo "<div class='row text-left'>";
		echo "<div class='col-md-2'>";
		echo "</div>";
		echo "<div class='col-md-8'>";
			echo "<h2>Cargar otra evidencia de la misma remision:</h2>";
			btnBack('cargar.php');
			echo "<br>";
			echo "<h2>Cargar evidencia para otra remision de la misma orden de embarque:</h2>";
			btnBack('folios.php');
		echo "</div>";
		echo "<div class='col-md-2'>";
		echo "</div>";
	echo "</div>";
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	include 'footer.php';
}
else{
	redirectPHP('index.php');
}
?>	