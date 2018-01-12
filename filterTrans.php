<?php
	session_start();

	require 'database.php';
	require 'functionsphp.php';
	include 'header.php';

echo "<div class=\"container-fluid\">";

	include 'menuTransportista.php';
	include 'logo.php';

	echo "<div class=\"row\">";
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
		echo "<div class=\"col-xs-10\">";

		if (!isset($_POST['btn1'])){
			redirectPHP('index.php');
		}
		$sql = applyFiltersTrans($_POST['btn1']);

		$result = $conexion->query($sql);

			$buttons = array(array('Ver Remisiones', 'btn btn-primary'));
			$form = array('folios.php','');
			$aNames = array();
			$info_field = $result->fetch_fields();
		
		echo " <table class='table table-hover' style='background-color:#C1AE9D'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;			
		foreach ($info_field as $valor) {
			$cont++;
			if ($cont <= 4){
				echo "<th class='hidden'>".$valor->name."</th>";
			}else{
				echo "<th>".$valor->name."</th>";
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
				echo "<form class='form-control' action='$form[0]' method='POST' " .$text;
				$names = array_reverse($aNames);
			for ($i = 0; $i < $cont; $i++){
				if ($i < 4){
					echo "<input type='text' class='hidden' name='". array_pop($names)."' value='$row[$i]'/>";
				} else{
				echo "<td>";
					echo $row[$i];
					echo "<input type='text' class='hidden' name='". array_pop($names)."' value='$row[$i]'/>";
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
		echo "<div class=\"col-xs-1\">";
		echo "</div>";
	echo "</div>";
	 include 'footer.php';
echo "</div>";
	 ?>
