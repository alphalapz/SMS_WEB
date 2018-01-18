<?php
	require 'database.php';
	var_dump($_POST);
	
	if (isset($_POST['id']) and isset($_POST['actionT'])){
		if ($_POST['actionT'] == 'inactive'){
			$sql = "UPDATE `cu_usr` SET `b_del` = '1' WHERE `cu_usr`.`id_usr` = " . $_POST['id'] . ";";
			//$sql = "DELETE FROM `cu_usr` WHERE `cu_usr`.`id_usr` = " . $_POST['id'] . ";";
			echo $sql;
			if($result = $conexion->query($sql)){
				echo "Eliminado con éxito";
			}else{
				echo "No se pudo eliminar el usuario " . $_POST['id'] . ".";
			}
		}
		else {
			if ($_POST['actionT'] == 'active'){
				$sql = "UPDATE `cu_usr` SET `b_del` = '0' WHERE `cu_usr`.`id_usr` = " . $_POST['id'] . ";";
				//$sql = "DELETE FROM `cu_usr` WHERE `cu_usr`.`id_usr` = " . $_POST['id'] . ";";
				echo $sql;
				if($result = $conexion->query($sql)){
					echo "Activado con éxito";
				}else{
					echo "No se pudo activar el usuario " . $_POST['id'] . ".";
				}
			}
		}
	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>