<?php 
session_start();
echo "<title>";
echo "Evidencias | Folio";
echo "</title>";
include 'header_p.php';
require 'database.php';
require 'functionsphp.php';

canAccess($_SESSION['loggedin'], 'eviPorFolio.php', $_SESSION['rol']);
if (!isset($_REQUEST['bf1dc'])){
	redirectPHP('indexCredito.php');
}
switch ($_REQUEST['bf1dc']){
	case 1:
		$sql =
			"SELECT
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT AS SH
				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE 
				NOT SH.b_del AND 
				fk_shipt_st=" . S_ST_POR_ACEPTAR . "
			ORDER BY SH.number;";
		break;
	case 2:
		$sql =
			"SELECT
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT AS SH
				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE 
				NOT SH.b_del AND 
				fk_shipt_st=" . S_ST_ACEPTADO . "
			ORDER BY SH.number;";
		break;
	case 3:
		$sql =
			"SELECT
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT AS SH
				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE 
				NOT SH.b_del AND 
				(fk_shipt_st=" . S_ST_POR_ACEPTAR . " OR fk_shipt_st=" . S_ST_ACEPTADO . ") 
			ORDER BY SH.number;";
		break;
	default;
}
echo "<div class=\"container-fluid\">";

	include 'menu.php';
	include 'logo.php';
	echo "<div class='row'>";
	echo "<div class='col-md-2'>";
	echo "</div>";
	echo "<div class='col-md-8'>";

		$result = $conexion->query($sql);

	echo "<div class='myScrollH'>";
		echo "<div class='text-right' onclick=\"$('#myInput01').focus();\">
				<label>
				<input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(0)' placeholder='Buscar por folio...' title='Buscar folio'>
				<span class='glyphicon glyphicon-search'>
				</span>
				</label> 
			</div>";
			$buttons = array(array('Ver Remisiones', 'btn btn-primary', "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;&nbsp;Ver"));
			$form = array('eviPorFolio.php','');

			$info_field = $result->fetch_fields();
			$index = array();
			printTableC($result, $buttons, $form, null, $index);
			echo "</div>";
			include 'pager_controls.php';
		echo "</div>";
		echo "<div class='col-md-2'>";
	echo "</div>";
		echo "</div>";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		btnBack('indexCredito.php');
	
	 include 'footer.php';
echo "</div>";
?>
<script>
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