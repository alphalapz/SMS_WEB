<?php
	session_start();

	require 'database.php';
	require 'functionsphp.php';
	include 'header.php';
	canAccess($_SESSION['loggedin'], 'filterCredit.php', $_SESSION['rol']);

echo "<div class=\"container-fluid\">";

	include 'menu.php';
	
	echo "<div class='row'>";
		echo "<div class='col-md-1'></div>";
		echo "<div class='col-md-10 text-right'>";
		echo "<br>";
			echo "<form action='filterCredit.php' method='POST' >";
				echo "<p><h2> Filtrar por fecha</h2></p>";
				echo "<input type='text' class='myBtnInputTex' name='daterange' value='' />";
				echo "<input type='text' class='hidden' name='bf1dc' value='" . $_REQUEST['bf1dc'] . "' >";
				echo "&nbsp;<button type='submit' class='btn btn-success'><span class='glyphicon glyphicon-play'></span>&nbsp;&nbsp;Aplicar</button>";
			echo "</form>";
		echo "</div>";
		
		echo "<div class='col-md-1'></div>";
	echo "</div>";
	echo "<div class=\"row\">";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		echo "<div class=\"col-xs-10\">";

		if (!isset($_REQUEST['bf1dc'])){
			redirectPHP('indexCredito.php');
		}
		
		if (isset($_REQUEST['daterange'])){
			echo "<div class='text-right'>";
			echo "<br>FILTRO APLICADO:";
			echo "<br>Inicio: <b>" . $startDate = substr($_REQUEST['daterange'],0,10) . "</b>";

			echo "<br>Fin: <b>" . $endDate = substr($_REQUEST['daterange'],-10) . "</b>";

			echo "<form action='filterCredit.php' method='POST' >";
				echo "<input type='text' class='hidden' name='bf1dc' value='" . $_REQUEST['bf1dc'] . "' >";
				echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
			echo "</form>";
			echo "</div>";
			$sql = applyFilterCredit($_REQUEST['bf1dc'], $startDate, $endDate);
		}
		else{
			$sql = applyFilterCredit($_REQUEST['bf1dc'], null, null);
		}

		$result = $conexion->query($sql);
		echo "<div class='myScrollH'>";
		echo "<div class='text-right' onclick=\"$('#myInput01').focus();\">
				<label>
				<input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(1)' placeholder='Buscar por remision...' title='Buscar remision'>
				<span class='glyphicon glyphicon-search'>
				</span>
				</label> 
			</div>";
			echo " <table class='table table-hover table-condensed myTable' id='myTable'>";
					echo " <thead>";
						echo "<tr>";
							echo "<th>FOLIO</th>";
							echo "<th>REMISION</th>";
							echo "<th>IMAGEN</th>";
							echo "<th>ESTATUS</th>";
							echo "<th>TRANSPORTISTA</th>";
							echo "<th>FECHA_EMBARQUE</th>";
							echo "<th>FECHA_ENTREGA</th>";
							echo "<th>FECHA_SUBIDA</th>";
							echo "<th>FECHA_REVISION</th>";
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
								echo "<td>" . $row['number'] . "</td>";
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
								echo "<td>" . $row['name'] . "</td>";
								echo "<td>" . $row['shipt_date'] . "</td>";
								echo "<td>" . $row['ts_usr_upload'] . "</td>";
								echo "<td>" . $row['ts_usr_accept'] . "</td>";
								echo "<td>" . $row['ts_usr_upd'] . "</td>";
								?>
							</form>
							<?php
						echo " </tr>";
				}

				echo "</tbody>";
				echo "</table>";
			echo "</div>";
		echo "</div>";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		btnBack('indexCredito.php');
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
