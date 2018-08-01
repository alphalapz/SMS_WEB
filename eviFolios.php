﻿<?php
session_start();
echo "<title>";
echo "Evidencias | Folio";
echo "</title>";
include 'header.php';
require 'database.php';
require 'functionsphp.php';

canAccess($_SESSION['loggedin'], 'eviPorFolio.php', $_SESSION['rol']);
if (!isset($_REQUEST['bf1dc'])){
	redirectPHP('indexCredito.php');
}
//		$sql =
//			"SELECT
//				SH.number AS Folio,
//				SH.shipt_date AS Fecha,
//				SHS.name AS Estatus,
//				SHP.name AS Transportista
//			FROM S_SHIPT AS SH
//				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
//				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
//			WHERE
//				NOT SH.b_del AND ";

		$sql = "SELECT

				SH.number AS Folio,
				SH.shipt_date AS Fecha,
				SHS.name AS Estatus,
				SHP.name AS Transportista,
				GROUP_CONCAT(SHR.bol_id SEPARATOR ',  ') AS Remisiones
			FROM
				S_EVIDENCE AS E
				INNER JOIN S_SHIPT AS SH ON E.fk_ship_ship = SH.id_shipt
				INNER JOIN S_SHIPT_ROW AS SHR ON E.fk_ship_row = SHR.id_row AND SHR.ID_SHIPT = SH.ID_SHIPT
				INNER JOIN SU_SHIPPER AS SHP ON SHP.id_shipper = SH.fk_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE
				NOT SH.b_del AND NOT E.B_DEL ";
		switch ($_REQUEST['bf1dc']){
			case FILTER_POR_ACEPTAR:
					$topTable = "Órdenes de embarque por aprobar";
					$sql .=  " AND fk_shipt_st=" . S_ST_POR_ACEPTAR;
				break;
			case FILTER_POR_ACEPTADAS:
					$topTable = "Órdenes de embarque aprobadas";
					$sql .=  " AND fk_shipt_st=" . S_ST_ACEPTADO;
				break;
			case FILTER_POR_ALL:
					$topTable = "Todas las órdenes de embarque";
					$sql .= " AND (fk_shipt_st=" . S_ST_POR_ACEPTAR . " OR fk_shipt_st=" . S_ST_ACEPTADO . ")";
				break;
			default;
		}

// Applying Date Range Filter
if ($_REQUEST['bf1dc'] != FILTER_POR_ACEPTAR){
	if (isset($_REQUEST['daterange'])){
		$startDate = substr($_REQUEST['daterange'],0,10);
		$endDate = substr($_REQUEST['daterange'],-10);
		$sql .=  " AND SH.shipt_date BETWEEN '$startDate' AND '$endDate'";
	}else{
		$currentDate = date("Y/m/d");
		$startDate = date("Y-m-t", strtotime($currentDate));
		$endDate = date("Y-m-1", strtotime($currentDate));
		$sql .=  " AND SH.shipt_date BETWEEN '$startDate' AND '$endDate'";
	}
}
//
			$sql .=  " GROUP BY SH.number ORDER BY SH.number;";
echo "<div class=\"container-fluid\">";

	include 'menu.php';

	echo "<div class='row'>";
	echo "<div class='col-md-2'>";



	echo "</div>";
	echo "<div class='col-md-8'>";
//debug echo here!
		$result = $conexion->query($sql);
	echo "<h1 class='text-center hidden-xs hidden-sm'>" . $topTable."</h1><br>";
	echo "<h2 class='text-center hidden-md hidden-lg'>" . $topTable."</h2><br>";
	echo "<div class='myScrollH'>";
		echo "<div class='text-right' onclick=\"$('#myInput01').focus();\">
				<label>
					<input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(5)' placeholder='Buscar por remision...' title='Buscar remision'>
					<span class='glyphicon glyphicon-search'>
					</span>
				</label>
			</div>";
			$buttons = array(array('Ver Remisiones', 'btn btn-primary', "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;&nbsp;Ver"));
			$form = array('eviPorFolio.php?bf1dc=' . $_REQUEST['bf1dc'],'');
			$info_field = $result->fetch_fields();
			$index = array();
			printTableC($result, $buttons, $form, null, $index, 2);
			echo "</div>";
			include 'pager_controls.php';
		echo "</div>";
		echo "<div class='col-md-2'>";
		echo "<br>";
		//	Date Range Step 1 of 3
		if($_REQUEST['bf1dc'] != 1){
			echo "<form action='eviFolios.php?bf1dc=" . $_REQUEST['bf1dc'] . "' method='POST' >";
				echo "<input type='text' class='myBtnInputTex' name='daterange' value='' />";
				echo "&nbsp;<button type='submit' class='btn btn-success'><span class='glyphicon glyphicon-

play'></span>&nbsp;&nbsp;Aplicar</button>";
			echo "</form>";
		}
			//	Date Range Step 2 of 3
			if (isset($_REQUEST['daterange'])){
			echo "<div class='text-right'>";
				echo "<br>FILTRO APLICADO:";
				echo "<br>Inicio: <b>" . $startDate = substr($_REQUEST['daterange'],0,10) . "</b>";
				echo "<br>Fin: <b>" . $endDate = substr($_REQUEST['daterange'],-10) . "</b>";
					echo "<form action='eviFolios.php?bf1dc=" . $_REQUEST['bf1dc'] . "' method='POST' >";
						echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
					echo "</form>";
			echo "</div>";

		}

	echo "</div>";
		echo "</div>";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		btnBack('indexCredito.php');

	 include 'footer.php';
echo "</div>";
?>
<script type="text/javascript">
	//	Date Range Step 3 of 3
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
