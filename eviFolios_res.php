

<?php 
session_start();
echo "<title>";
echo "Evidencias | Folio";
echo "</title>";
include 'header_p.php';
require 'database.php';
require 'functionsphp.php';
canAccess($_SESSION['loggedin'], 'eviPorFolio.php', $_SESSION['rol']);
	echo "<div class=\"container-fluid\">";

	include 'menuCredit.php';
	include 'logo.php';
	echo "<div class='row'>";
		echo "<div class='col-md-1'></div>";
		echo "<div class='col-md-10 text-right'>";
		echo "<br>";
			echo "<form action='eviPorFolio.php' method='POST' >";
				echo "<p><h2> Filtrar por fecha</h2></p>";
				echo "<input type='text' class='myBtnInputTex' name='daterange' value='' />";
				echo "<input type='submit' class='btn btn-success' value='Aplicar Filtro'>";
			echo "</form>";
		echo "</div>";
		
		echo "<div class='col-md-1'></div>";
	echo "</div>";
	echo "<div class=\"row\">";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		echo "<div class=\"col-xs-10\">";
	if (isset($_REQUEST['daterange'])){
			echo "<div class='text-right'>";
				echo "<br>FILTRO APLICADO:";
				echo "<br>Inicio: <b>" . $startDate = substr($_REQUEST['daterange'],0,10) . "</b>";
				echo "<br>Fin: <b>" . $endDate = substr($_REQUEST['daterange'],-10) . "</b>";
					echo "<form action='eviPorFolio.php' method='POST' >";
						echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
					echo "</form>";
			echo "</div>";
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
				(fk_shipt_st=" . S_ST_POR_ACEPTAR . " OR fk_shipt_st=" . S_ST_ACEPTADO . ") SH.shipt_date BETWEEN '$startDate' AND '$endDate'
			ORDER BY SH.number;";
		}
		else{
			$sql=
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
			$buttons = array(array('Ver Remisiones', 'btn btn-primary', "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;&nbsp;Ver"));
			$form = array('eviPorFolio.php','');

			$info_field = $result->fetch_fields();
			$index = array();
			printTableC($result, $buttons, $form, null, $index);
			echo "</div>";
			include 'pager_controls.php';
		echo "</div>";
		echo "<div class=\"col-xs-1\">";
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
			"Ultims 7 dias": [
				moment().subtract('days', 7), moment(),
				new Date(),
			],
			"Ultimos 30 dias": [
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
