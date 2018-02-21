<?php
	session_start();

	require 'database.php';
	require 'functionsphp.php';
	echo "<title>";
	echo "EVIDENCIAS";
	echo "</title>";

	include 'header.php';
	canAccess($_SESSION['loggedin'], 'filterTrans.php', $_SESSION['rol']);
echo "<div class='container-fluid'>";

	include 'menu.php';
	
	echo "<div class='row'>";
		echo "<div class='col-md-1'></div>";
		echo "<div class='col-md-10 text-right'>";
		echo "<br>";
			echo "<form action='filterTrans.php' method='POST' >";
				echo "<p><h2> Filtrar por fecha</h2></p>";
				echo "<input class='myBtnInputTex' type='text' name='daterange' value='' />";
				echo "<input type='text' class='hidden' name='bf1dc' value='" . $_REQUEST['bf1dc'] . "' >";
				echo "<input type='submit' class='btn btn-success' value='Aplicar Filtro'>";
			echo "</form>";
		echo "</div>";

		echo "<div class='col-md-1'></div>";
	echo "</div>";
	echo "<div class='row'>";
		echo "<div class='col-xs-1'>";
		echo "</div>";
		echo "<div class='col-xs-10'>";

		if (!isset($_REQUEST['bf1dc'])){
			redirectPHP('index.php');
		}else{
		$_SESSION['btn'] = $_REQUEST['bf1dc'];
		}
		if (isset($_POST['daterange'])){
			echo "<div class='text-right'>";
			echo "<br>FILTRO APLICADO:";
			echo "<br>Inicio: <b>" . $startDate = substr($_POST['daterange'],0,10) . "</b>";
			echo "<br>Fin: <b>" . $endDate = substr($_POST['daterange'],-10) . "</b>";
			echo "<form action='filterTrans.php' method='POST' >";
				echo "<input type='text' class='hidden' name='bf1dc' value='" . $_REQUEST['bf1dc'] . "' >";
				echo "<input type='submit' class='btn btn-danger' value='Eliminar Filtro'>";
			echo "</form>";
			echo "</div>";
			$sql = applyFiltersTrans($_REQUEST['bf1dc'], $startDate, $endDate);
		}
		else{
			$sql = applyFiltersTrans($_REQUEST['bf1dc'], null, null);
		}

		$result = $conexion->query($sql);

			$info_field = $result->fetch_fields();
			echo "<div class='myScrollH text-right'>";
			echo "<p>Filtrar: <input type='text' class='myBtnInputTex' id='myInput01' onkeyup='filterTable(0)' placeholder='Buscar...' title='Filtrar...'/></p>";

			$buttons = array(array('Ver Remisiones', 'btn btn-primary', "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;&nbsp;Ver"));
			$form = array('folios.php','');

			$info_field = $result->fetch_fields();
			##	THE VALUES for $index refers to the next values
				// 9 = SH.m2 AS M2,
				// 10 = SH.kg AS KILOGRAMOS
			$index = array(12,13);

			printTableC($result, $buttons, $form, 5, $index, 2);
			
		echo "</div>";
		echo "</div>";
		echo "<div class='col-xs-1'>";
		echo "</div>";

	echo "</div>";
	btnBack('indexTransportista.php');
	include 'footer.php';
echo "</div>";
?>
<script>
	// $(document).ready(function() { 
    // $("table") 
    // .tablesorter({widthFixed: true, widgets: ['zebra']}) 
    // .tablesorterPager({container: $("#pager")}); 
	// });     

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
