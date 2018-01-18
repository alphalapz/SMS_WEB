<?php
	session_start();

	require 'database.php';
	require 'functionsphp.php';
	include 'header.php';
	canAccess($_SESSION['loggedin'], 'filterTrans.php', $_SESSION['rol']);
echo "<div class='container-fluid'>";

	include 'menuTransportista.php';
	include 'logo.php';
	echo "<div class='row'>";
		echo "<div class='col-md-1'></div>";
		echo "<div class='col-md-10 text-right'>";
		echo "<br>";
			echo "<form action='filterTrans.php' method='POST' >";
				echo "<p><h2> Filtrar por fecha</h2></p>";
				echo "<input type='text' name='daterange' value='' />";
				echo "<input type='text' class='hidden' name='btn1' value='" . $_POST['btn1'] . "' >";
				echo "<input type='submit' class='btn btn-success' value='Aplicar Filtro'>";
			echo "</form>";
		echo "</div>";
		
		echo "<div class='col-md-1'></div>";
	echo "</div>";
	echo "<div class='row'>";
		echo "<div class='col-xs-1'>";
		echo "</div>";
		echo "<div class='col-xs-10'>";

		if (!isset($_POST['btn1'])){
			redirectPHP('index.php');
		}else{
		$_SESSION['btn'] = $_POST['btn1'];
		}
		if (isset($_POST['daterange'])){
			echo "<div class='text-right'>";
			echo "<br>FILTRO APLICADO:";
			echo "<br>Inicio: <b>" . $startDate = substr($_POST['daterange'],0,10) . "</b>";
			
			echo "<br>Fin: <b>" . $endDate = substr($_POST['daterange'],-10) . "</b>";
			
			echo "<form action='filterTrans.php' method='POST' >";
				echo "<input type='text' class='hidden' name='btn1' value='" . $_POST['btn1'] . "' >";
				echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
			echo "</form>";
			echo "</div>";
			$sql = applyFiltersTransDate($_POST['btn1'], $startDate, $endDate);
		}
		else{
			$sql = applyFiltersTrans($_POST['btn1']);
		}
		
		$result = $conexion->query($sql);
	
			$buttons = array(array('Ver Remisiones', 'btn btn-primary'));
			$form = array('folios.php','');
			$aNames = array();
			$info_field = $result->fetch_fields();
		echo "<div class='myScrollH'>";
		echo " <table class='table table-hover table-condensed myTable'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;			
		foreach ($info_field as $valor) {
			$cont++;
			if ($cont <= 4){
				echo "<th class='hidden'>" . $valor->name . "</th>";
			}else{
				echo "<th>" . $valor->name . "</th>";
			}
				array_push($aNames, $valor->name);
		}
		echo "<th>Acciones</th>";
		echo " </tr>";
		echo " </thead>";
		echo "<tbody>";
		while($row = $result->fetch_array(MYSQLI_NUM)) {
			echo "<tr>";
				$text = $form[1] == '' ? ">" : "onsubmit=\"if(!confirm('Ver remisiones para el embarque $row[1]?')){return false;}\" >";
				echo "<form class='form-control' action='$form[0]' method='POST' " . $text;
				$names = array_reverse($aNames);
			for ($i = 0; $i < $cont; $i++){
				if ($i < 4){
					echo "<input type='text' class='hidden' name='" . array_pop($names). "' value='$row[$i]'/>";
				} else{
				echo "<td>";
					echo $row[$i];
					echo "<input type='text' class='hidden' name='" . array_pop($names). "' value='$row[$i]'/>";
				echo "</td>";
				}
			}
			foreach($buttons as $btn){
				echo "<td><input type='submit' value='$btn[0]' class='$btn[1]'/></td>";
			}
				echo "</form>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";		
		echo "</div>";
		echo "</div>";
		echo "<div class='col-xs-1'>";
		echo "</div>";
		
	echo "</div>";
	echo "<br><div class='row'>";
		echo "<div class='col-xs-4'>";
		echo "</div>";
		echo "<div class='col-xs-4'>";
			echo "<div class='text-right'>";
				echo "<a href='index.php'><input type='button' class='btn btn-danger' value='Volver'></a>";
			echo "</div>";
		echo "</div>";
		echo "<div class='col-xs-4'>";
		echo "</div>";
	echo "</div>";
	 include 'footer.php';
echo "</div>";
?>
	<script type="text/javascript">
	$(function() {
		$('input[name="daterange"]').daterangepicker({
			"ranges": {
			"Hoy": [
				new Date(),
				new Date(),
			],
			"Ultima Semana": [
				moment().subtract('days', 7), moment(),
				new Date(),
			],
			"Ultimo mes": [
				moment().subtract('months', 1), moment(),
				new Date(),
			],
			"Ultimo año": [
				moment().subtract('years', 1), moment(),
				new Date(),
			],
			},
			"alwaysShowCalendars": false,
			"startDate": new Date(),
			"endDate": new Date(),
			"opens": "left",
			
			locale: {
				format: 'YYYY-MM-DD'
			},
		});
	});
	</script>
