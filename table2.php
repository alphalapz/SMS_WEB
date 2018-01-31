<!DOCTYPE html>
<html>
<body>
<?php 
include 'header_p.php';
require 'database.php';
?>
<h2>Tabla de pruebas</h2>

		<?php
		$sql="SELECT * FROM erp.bpsu_bpb";
		$result = $conexion->query($sql);
		$info_field = $result->fetch_fields();
		echo "<div class='text-right' onclick=\"$('#myInput01').focus();\">
				<label>
				<input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(0)' placeholder='Buscar por folio...' title='Buscar folio'>
				<span class='glyphicon glyphicon-search'>
				</span>
				</label> 
			</div>";
		echo " <table id='myTable' class='table table-hover table-condensed myTable tablesorter'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;
		foreach ($info_field as $valor) {
			$cont++;
			echo "<th>" . $valor->name . "</th>";
		}
		echo " </tr>";
		echo " </thead>";
		echo "<tbody>";
		while($row = $result->fetch_array(MYSQLI_NUM)) {
			echo "<tr>";
			for ($i = 0; $i < $cont; $i++){
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		include 'pager_controls.php';
		?>

<script type="text/javascript">
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
</body>
</html>
