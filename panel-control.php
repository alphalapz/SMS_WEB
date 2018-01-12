<?php 
	include 'database.php';
	require 'functionsphp.php';
	session_start();
	canAccess($_SESSION['loggedin'], "panel-control.php", $_SESSION['rol']);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login Complete</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
	<div class="container-fluid	">
		<div class="row">
			<div class="col-md-12 text-center">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4 ">
			<h3 class="text-center">Bienvenido <?php echo " " . $_SESSION['username']."!"; ?></h3><br>
			<table class="table table-hover" style="background-color:#C1AE9D">
				<th>Id usuario</th>
				<th>Nombre usuario</th>
				
				<th>Acciones</th>
				<?php
					$sql = "SELECT * FROM $tbl_name WHERE b_web";
					$result = $conexion->query($sql);
					while($row = $result->fetch_array(MYSQLI_ASSOC)) {
						echo "<tr>";
							?>
							<form class='form-control' action='deleteUser.php' method='POST' onSubmit="if(!confirm('¿Seguro que deseas cambiar el estatus al usuario <?php echo $row['name']; ?> ?')){return false;}">
							<?php
							echo "<input type='text' class='hidden' name='id' id='id' value='" . $row['id_usr'] . "'/>";
							echo "<td>" . $row['id_usr'] . "</td>";
							echo "<td>" . $row['name'] . "</td>";
							
							echo "<td>";
								if ($row['b_del']){
									echo "<input type='text' class='hidden' name='actionT' id='actionT' value='active'/>";
									echo "<input type='submit' class='btn btn-success' value='Activar'>&nbsp;&nbsp;&nbsp;";
								}
								else{
									echo "<input type='text' class='hidden' name='actionT' id='actionT' value='inactive'/>";
									echo "<input type='submit' class='btn btn-warning' value='Inhabilitar'>&nbsp;&nbsp;&nbsp;";
								}
					
							echo "</td>";
							echo "</form>";
						echo "</tr>";				
					}
				?>
			</table>
			<a href=registry.php><input type="button" class="btn btn-primary" value="Crear nuevo usuario"></input></a>
			</div>
			<div class="col-sm-4 text-center">
			<br>
			<br>
			<br>
			<br>
				<a href=logout.php><input type="button" class="btn btn-danger" value="Cerrar Sesion"></input></a>
			</div>
		</div>
	</div>
	<?php
		
	?>
	</body>
</html>