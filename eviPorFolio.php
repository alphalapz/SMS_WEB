<?php 
session_start();
echo "<title>";
echo "Evidencias | Folio";
echo "</title>";
include 'header.php';
require 'database.php';
require 'functionsphp.php';
canAccess($_SESSION['loggedin'], 'eviPorFolio.php', $_SESSION['rol']);
	echo "<div class='container-fluid'>";

	include 'menu.php';

	echo "<div class='row'>";
		echo "<div class='col-md-4'></div>";
		echo "<div class='col-md-4 text-left'>";
		$bol = false;
		
		if(isset($_POST['FOLIO'])){
			$bol = true;
			$_SESSION['Embarque'] = $_POST['FOLIO'];
			$_SESSION['FECHA_EMBARQUE'] = $_POST['Fecha'];
			$_SESSION['TRANSPORTISTA'] = $_POST['TRANSPORTISTA'];	
		}
		if ($bol){
			echo "Embarque: <b>" . $_SESSION['Embarque'] . "</b><br>";
			echo "Fecha: <b>" . $_POST['Fecha'] . "</b><br>";
			echo "Transportista: <b>" . $_SESSION['TRANSPORTISTA'] . "</b><br>";
		}

		echo "</div>";
		echo "<div class='col-md-3 text-left'>";
		// echo "<br>";
			// echo "<form action='eviPorFolio.php' method='POST' >";
				
				// echo "<input type='text' class='myBtnInputTex' name='daterange' value='' />";
				// echo "&nbsp;<button type='submit' class='btn btn-success'><span class='glyphicon glyphicon-play'></span>&nbsp;&nbsp;Aplicar</button>";
			// echo "</form>";
		echo "</div>";
		echo "<div class='col-md-1'></div>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row'>";
		echo "<div class='col-md-4'>";
		echo "</div>";
		echo "<div class='col-md-4'>";
			echo "<h1 class='text-center'> Evidencias de órden de embarque</h1><br>";
			echo "Folio: <b>";
			echo isset($_POST['Folio']) ? $_SESSION['nFolio'] = $_POST['Folio'] : $_SESSION['nFolio'];
			echo "</b><br>";
			echo "Fecha: <b>";
			echo $_POST['Fecha'];
				// echo isset($_POST['Fecha_embarque']) ? $_SESSION['nFecha_embarque'] = $_POST['Fecha_embarque'] : $_SESSION['nFecha_embarque'];
			echo "</b><br>";
			echo "Transportista: <b>";
				echo isset($_POST['Transportista']) ? $_SESSION['nTransportista'] = $_POST['Transportista'] : $_SESSION['nTransportista'];
			echo "</b><br><br>";
				
		echo "</div>";
		echo "<div class='col-md-4'>";
		echo "</div>";
	echo "</div>";
	echo "<div class='row'>";
		echo "<div class='col-md-4'>";
		echo "</div>";
		echo "<div class='col-md-4'>";
		$sql = "SELECT
				E.id_evidence,
				SH.number,
				SHR.bol_id,
				E.file_location,
				E.file_name,
				E.file_location,
				E.file_name,
				E.b_accept,
				SHP.name,
				SH.shipt_date,
				E.ts_usr_upload,
				E.ts_usr_accept,
				E.ts_usr_upd
			FROM
				S_EVIDENCE AS E
				INNER JOIN S_SHIPT AS SH ON E.fk_ship_ship = SH.id_shipt
				INNER JOIN S_SHIPT_ROW AS SHR ON E.fk_ship_row = SHR.id_row
				AND SHR.ID_SHIPT = SH.ID_SHIPT
				INNER JOIN SU_SHIPPER AS SHP ON SHP.id_shipper = SH.fk_shipper
				WHERE SHR.id_shipt = " . $_SESSION['nFolio'] . " " ;
		if (isset($_REQUEST['daterange'])){
			echo "<div class='text-right'>";
				echo "<br>FILTRO APLICADO:";
				echo "<br>Inicio: <b>" . $startDate = substr($_REQUEST['daterange'],0,10) . "</b>";
				echo "<br>Fin: <b>" . $endDate = substr($_REQUEST['daterange'],-10) . "</b>";
					echo "<form action='eviPorFolio.php' method='POST' >";
						echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
					echo "</form>";
			echo "</div>";
			$sql = $sql . " AND NOT E.b_del AND (SH.fk_shipt_st=11 OR SH.fk_shipt_st=12) AND SH.shipt_date BETWEEN '$startDate' AND '$endDate'";
		}
		else{
			$sql = $sql . " AND NOT E.b_del AND (SH.fk_shipt_st=11 OR SH.fk_shipt_st=12)";
		}
			$sql = $sql . " GROUP BY E.id_evidence;";

		$result = $conexion->query($sql);
		
		
	echo "<div class='myScrollH'>";
		echo "<div class='text-right' onclick='$('#myInput01').focus();'>
				<label>
				<input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(1)' placeholder='Buscar por remision...' title='Buscar remision'>
				<span class='glyphicon glyphicon-search'>
				</span>
				</label> 
			</div>";
			echo " <table class='table table-hover table-condensed myTable' id='myTable'>";
					echo " <thead>";
						echo "<tr>";
							// echo "<th>FOLIO</th>";
							echo "<th>Remisión</th>";
							echo "<th>Imágen</th>";
							echo "<th>Estatus</th>";
							// echo "<th>TRANSPORTISTA</th>";
							// echo "<th>FECHA_EMBARQUE</th>";
							// echo "<th>FECHA_ENTREGA</th>";
							// echo "<th>FECHA_SUBIDA</th>";
							// echo "<th>FECHA_REVISION</th>";
						echo " </tr>";
					echo " </thead>";
					echo "<tbody>";
					$cont=0;
				while($row = $result->fetch_array(MYSQLI_ASSOC)) {
					$cont++;
						echo "<tr>";
							?>
							<form enctype="multipart/form-data" action="changeStatus.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas cambiar el estatus?')){return false;}">
								<?php
								echo "<input type='label' name='evidence' class='hidden' value='" . $row['id_evidence'] ."'>";
								// echo "<td>" . $row['number'] . "</td>";
								echo "<td>" . $row['bol_id'] . "</td>";
								echo "<td><a id='single_image' href='" . $row['file_location'] . $row['file_name'] . "'>
									<img class='img-rounded' src='" . $row['file_location'] . $row['file_name'] . "' style='width:30px;height:30px;border:2px solid transparent;border-color:white'/></a></td>";
								echo "<td>";
								if($row['b_accept'] == false){
									echo "<input type='submit' name='submit' class='btn btn-primary' value='Pendiente'/>";
								}else {
									echo "<label class='label label-warning'>Aprobado</label>";
								}
								echo "</td>";
								// echo "<td>" . $row['name'] . "</td>";
								// echo "<td>" . $row['shipt_date'] . "</td>";
								// echo "<td>" . $row['ts_usr_upload'] . "</td>";
								// echo "<td>" . $row['ts_usr_accept'] . "</td>";
								// echo "<td>" . $row['ts_usr_upd'] . "</td>";
								?>
							</form>
							<?php
						echo " </tr>";
				}

				echo "</tbody>";
				echo "</table>";
			echo "</div>";
		echo "</div>";
		echo "<div class='col-md-4'>";
		echo "</div>";
	echo "</div>";
		echo "<div class='row'>";
		echo "<div class='col-md-2'>";
		echo "</div>";
		echo "<div class='col-md-8'>";
			btnBack('eviFolios.php');
		echo "</div>";
		echo "<div class='col-md-2'>";
		echo "</div>";
		echo "</div>";
	 include 'footer.php';
echo "</div>";
?>

<script type="text/javascript">
	<?php include 'dateRangePicker.php';?>
	
	function filterTable(col) {
		var input, filter, table, tr, td, i;
		input = document.getElementById("myInput01");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[col];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}       
		}
	}
</script>
