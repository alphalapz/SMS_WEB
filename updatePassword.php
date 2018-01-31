<?php
	session_start();
	require 'functionsphp.php';
	canAccess($_SESSION['loggedin'], 'updatePassword.php', $_SESSION['rol']);
	require 'database.php';
	include 'header.php';
	//Get the password by POST method
	$form_pass = $_POST['password'];
	//generate the hash with the password
 	$hash = password_hash($form_pass, PASSWORD_BCRYPT); 
	
	//start the transaction
	mysqli_autocommit($conexion, false);
		// This flag is for check if the queries can commit or rol back
		$flag = true;
		// Queries for update password
		$query1 = "SELECT pswd FROM CU_USR WHERE id_usr=" . $_SESSION['user_id'] . ";";
		$query2 = "UPDATE `cu_usr` SET `pswd` = '" . $hash . "' WHERE `cu_usr`.`id_usr` = " . $_SESSION['user_id'] . ";";

		$result = mysqli_query($conexion, $query1);
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if (!$result) {
			$flag = false;
			echo "Error details: " . mysqli_error($conexion) . ".";
		}
		// Validate length password
		if (strlen($row['pswd']) >0){
			$flag = false;
		}
		
		$result = mysqli_query($conexion, $query2);

		if (!$result) {
			$flag = false;
			echo "Error details: " . mysqli_error($conexion) . ".";
		}

		if ($flag) {
			// It´s OK and commit.
			mysqli_commit($conexion);
				include 'logo.php';
				echo "<div class='text-center'><h1> CONTRASEÑA CAMBIADA CON EXITO</h1><br>";
				echo "<a href='index.php'><input type='button' class='btn btn-danger' value='INGRESAR'/></a>";
				echo "</div>";
			include 'footer.php';
		} else {
			// An error surprise the user
			mysqli_rollback($conexion);
				include 'logo.php';
				echo "<div class='text-center'><h1>ERROR, YA SE HA ASIGNADO UNA CONTRASEÑA PARA ESTE USUARIO.</h1><br>";
				echo "<a href='index.php'><input type='button' class='btn btn-danger' value='INGRESAR'/></a>";
				echo "</div>";
				include 'footer.php';
		}
			//Destroy the temporal Session, necessary for the user to access using his new password
			session_destroy();
	mysqli_close($conexion);
?>