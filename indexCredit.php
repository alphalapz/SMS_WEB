
	<?php
		session_start();
		include 'database.php';
		include 'header.php';
		include 'functionsphp.php';

		canAccess($_SESSION['loggedin'], 'indexCredit.php', $_SESSION['rol']);
	?>

<body>
<?php	include 'menuCredit.php';

?>
	<div class="container-fluid">
	<?php include 'logo.php' ?>
		<div class="row">
			<div class="col-sm-1">

			</div>
			<div class="col-sm-10 text-center">
				<br><br>
				<h3>Bienvenido <?php echo strtoupper($_SESSION['username'])."!"; ?></h3>
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
				
				$sql = "SELECT * FROM S_EVIDENCE AS E  
							INNER JOIN S_SHIPT AS SH ON E.fk_ship_ship = SH.id_shipt 
							INNER JOIN S_SHIPT_ROW AS SHR ON SHR.ID_SHIPT = SH.ID_SHIPT 
							WHERE NOT E.b_del AND SH.fk_shipt_st=11 
							GROUP BY E.id_evidence;";

				$result = $conexion->query($sql);
					echo "<tbody>";
					$cont=0;
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$cont++;
						echo "<tr>";
							?>
							<form enctype="multipart/form-data" action="changeStatus.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas cambiar el estatus?')){return false;}">
								<?php
								echo "<input type='label' name='evidence' class='hidden' value='". $row['id_evidence'] ."'>";
								echo "<td>".$row['number']."</td>";
								echo "<td>".$row['delivery_number']."</td>";
								echo "<td><a id='single_image' href='" . $row['file_location'] . $row['file_name']."'>
									<img  src='" . $row['file_location'] . $row['file_name']."' style='width:50px;height:50px;''/></a></td>";
								echo "<td>";
								if($row['b_accept'] == false){
									echo "<input type='submit' name='submit' class='btn btn-primary' value='Pendiente'/>";
								}else {
									echo "<label class='label label-warning'>Aprobado</label>";
								}
								echo "</td>";
								echo "<td>" .$row['driver_name'] ."</td>";
								echo "<td>".$row['ts_usr_upload']."</td>";
								echo "<td>".$row['ts_usr_accept']."</td>";
								echo "<td>".$row['ts_usr_upd']."</td>";
								?>
							</form>
							<?php
						echo " </tr>";
				}

				echo "</tbody>";
					echo "</table>";
				?>

			</div>
			<div class="col-sm-1">
			</div>
		</div>
	<?php include 'footer.php' ?>
	</div>
</body>
</html>