<?php
	require 'functionsphp.php';
	
	session_start();
	
	$myPost = array_values($_POST);
	$_SESSION['Folio']=$myPost[0];
	$_SESSION['Remision']=$myPost[1];
	$_SESSION['id']=$_POST['ID'];
	echo "<pre>";
	var_dump($_POST);
	echo "<br>";
	var_dump($myPost);
	echo "</pre>";
	redirectPHP('cargar.php');
?>