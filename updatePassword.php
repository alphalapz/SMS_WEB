<?php
	session_start();
	require 'functionsphp.php';
	canAccess($_SESSION['loggedin'], 'updatePassword.php', $_SESSION['rol']);
	require 'database.php';
	include 'header.php';
	
	$form_pass = $_POST['password'];
	
 	$hash = password_hash($form_pass, PASSWORD_BCRYPT); 
	
	$sql = "UPDATE `cu_usr` SET `pswd` = '" . $hash . "' WHERE `cu_usr`.`id_usr` = " . $_SESSION['user_id'] . ";";
	
	$result = $conexion->query($sql);
	
	session_destroy();
	if($result){
		include 'logo.php';
		echo "<div class='text-center'><h1> CONTRASEÑA CAMBIADA CON EXITO</h1><br>";
		echo "<a href='index.php'><input type='button' class='btn btn-danger' value='INGRESAR'/></a>";
		echo "</div>";
	}
	include 'footer.php';
?>