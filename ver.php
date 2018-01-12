<!DOCTYPE html>
<html lang="es">
	<?php
		include 'database.php';
		include 'header.php'; 
	?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			
			</div>
			<div class="col-sm-8 text-center">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
				<h1>Imagenes ####</h1>
				<br><br>
				
				<?php 
				echo " <table class='table'>";
					echo " <thead>";
						echo "<tr>";
							echo "<th>FOLIO</th>";
							echo "<th>REMISION</th>";
							echo "<th>IMAGEN</th>";
							echo "<th>ESTATUS</th>";
							echo "<th>TRANSPORTISTA</th>";
							echo "<th>FECHA ENTREGA</th>";
							echo "<th>FECHA SUBIDA</th>";
							echo "<th>FECHA REVISION</th>";
						echo " </tr>";
					echo " </thead>";
				$tbl_name = 'S_EVIDENCE';
				$sql = "SELECT * FROM $tbl_name as E INNER JOIN S_SHIPT as S ON E.fk_ship_ship = S.id_shipt";
				$result = $conexion->query($sql);
					echo "<tbody>";
					$cont=0;
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$cont++;
						echo "<tr>";
							echo "<td>FOLIO###</td>";
							echo "<td>REMISION###</td>";
							echo "<td><a id='single_image' href='" . $row['file_location'] . $row['file_name']."'>
								<img  src='" . $row['file_location'] . $row['file_name']."' style='width:50px;height:50px;''/></a></td>";
							echo "<td>";
							if($row['b_accept']){
								echo "<label class='label label-success'>ON";
							}else {
								echo "<label class='label label-danger'>OFF";
							}
							echo "</label>";
							echo "</td>";
							echo "<td>" .$row['driver_name'] ."</td>";
							echo "<td>FECHA".$row['ts_usr_upload']."</td>";
							echo "<td>FECHA".$row['ts_usr_accept']."</td>";
							echo "<td>FECHA".$row['ts_usr_upd']."</td>";
						echo " </tr>";
				}

				echo "</tbody>";
					echo "</table>";
				?>
				
			</div>
			<div class="col-sm-2">
			</div>
		</div>
	<?php include 'footer.php' ?>
	</div>
</body>
</html>