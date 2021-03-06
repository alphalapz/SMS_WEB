<?php 
	include 'database.php';
	require 'functionsphp.php';
	session_start();
	canAccess($_SESSION['loggedin'], "panel-control.php", $_SESSION['rol']);
?>
	<title>
	PANEL | CONTROL
	</title>
	<?php include 'header.php'; ?>
	<body>
	<?php include 'menu.php'; ?>
	<div class="container-fluid	">
		
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8 ">
			<h3 class="text-center">Bienvenido <?php echo " " . strtoupper($_SESSION['username']) . "!"; ?></h3><br>
			<div class="myScrollH">
				<table class="table table-hover table-condensed myTable">
					<th>Nombre de usuario</th>
					<th>Tipo de usuario</th>
					<th>Acciones</th>
					<?php
						//THIS 2 LINES FOR INCLUDE THE PAGER
						$startrow = pagerStartrow();
						$numOfrows = pagerNumOfRows();
						if ($startrow < 0){
							$startrow = 0;
						}
						$sql = "SELECT
									CU.id_usr AS id,
									CU.b_del AS b_del,
									CU.b_del AS actionT,
									CU.b_del AS ACTIVO,
									CU.name AS USERNAME,
									WR.name as ROL
								FROM cu_usr AS CU
									INNER JOIN SS_WEB_ROLE AS WR ON CU.fk_web_role = WR.id_web_role
								WHERE CU.b_web LIMIT $startrow, $numOfrows;";

						$result = $conexion->query($sql);

						## VALIDATE IF HAD 0 ROWS THE $result, this indicate no more records and go back to the last "page";
						$totalRows = $result->num_rows;
						if ($totalRows == 0){
						$startrow = $startrow - $numOfrows;
						if ($startrow < 0){
							$startrow = 0;
						}
								$sql = "SELECT
									CU.id_usr AS id,
									CU.b_del AS b_del,
									CU.b_del AS actionT,
									CU.b_del AS ACTIVO,
									CU.name AS USERNAME,
									WR.name as ROL
								FROM cu_usr AS CU
									INNER JOIN SS_WEB_ROLE AS WR ON CU.fk_web_role = WR.id_web_role
								WHERE CU.b_web LIMIT $startrow, $numOfrows;";
						// RUN THE QUERY AGAIN FOR GET THE SAME LAST RESULT
						$result = $conexion->query($sql);
						}
			$buttons = array(
						array('↑', 'btn btn-success',"<span class='glyphicon glyphicon-refresh'></span>&nbsp;&nbsp;&nbsp;")
					);
			$index = array();
			$form = array('deleteUser.php','');
			// printTableC($result, $buttons, $form, 3, $index);
			
			while($row = $result->fetch_array(MYSQLI_ASSOC)) {
				echo "<tr>";
					?>
					<form class='form-control' action='deleteUser.php' method='POST' onSubmit="if(!confirm('¿Seguro que deseas cambiar el estatus al usuario
						<?php echo $row['name']; ?> ?')){return false;}">
					 <?php
						echo "<input type='text' class='hidden' name='id' id='id' value='" . $row['id'] . "'/>";
						
						echo "<td>" . $row['USERNAME'] . "</td>";
						echo "<td>" . $row['ROL'] . "</td>";
						
						echo "<td>";
							if ($row['b_del']){
								echo "<input type='text' class='hidden' name='actionT' id='actionT' value=1/>";
								echo "<input type='submit' class='btn btn-success' value='Activar'>&nbsp;&nbsp;&nbsp;";
							}
							else{
								echo "<input type='text' class='hidden' name='actionT' id='actionT' value=0/>";
								echo "<input type='submit' class='btn btn-warning' value='Inhabilitar'>&nbsp;&nbsp;&nbsp;";
							}
				
						echo "</td>";
					echo "</form>";
				echo "</tr>";				
			}

				echo "</table>";
			echo "</div>";
			echo "<div class='row'>
					<div class='col-xs-5'>
						<button type='button' class='btn btn-primary' onclick='prev()'><span class='glyphicon glyphicon-backward'>
							</span>&nbsp;$numOfrows registros
						</button>
					</div>
					<div class='col-xs-5'>
						<button type='button' class='btn btn-primary' onclick='next()'>$numOfrows registros
							<span class='glyphicon glyphicon-forward'></span>
						</button>
					</div>
					<div class='col-xs-2'>
				<select id='range' name='range' class='pagesize'>";
				for ($i = 1; $i <= 5; $i++){
					$value = $i * 10;

					if($numOfrows == $value){
						echo "<option selected='selected' value=".$value.">".$value."</option>";
					}else{
						echo "<option value=".$value.">".$value."</option>";
					}
				}
				echo "</select>";
				echo "</div>";
				?>
				</div>

				<div class="text-right">
				<br>
			<a href=registry.php><input type="button" class="btn btn-success" value="Crear nuevo usuario"></input></a>
			</div>
			</div>
			<div class="col-sm-2 text-center">
			<br>
			<br>
			<br>
			<br>
				<a href=logout.php><input type="button" class="btn btn-danger" value="Cerrar Sesion"></input></a>
			</div>
		</div>
	</div>
	<?php
		include 'footer.php';
	?>
<script>
	function next(){
			<?php $url = $_SERVER['PHP_SELF'] . "?0d2366f384b6c702db8e9dd8b74534db&startrow=" . ($startrow + $numOfrows) . "&0d2366f384b6c702db8e9dd8b74534db&range="?>
			var val = document.getElementById("range").value;
			window.location.replace('<?php echo $url;?>' + val);
	}

	function prev(){
			<?php 
			$sum = $startrow - $numOfrows;
				if ($sum < 0){
					$sum = 0;
				}
				
			?>
			<?php $url = $_SERVER['PHP_SELF'] . "?0d2366f384b6c702db8e9dd8b74534db&startrow=" . ($sum) . "&0d2366f384b6c702db8e9dd8b74534db&range="?>
			var val = document.getElementById("range").value;
			window.location.replace('<?php echo $url;?>' + val);
	}
</script>
	</body>
</html>