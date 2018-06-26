<?php
	session_start();
	require 'functionsphp.php';
	require 'database.php';
	echo "<title>";
	echo "REMISIONES";
	echo "</title>";
	include 'header.php';
	echo "<br>";
	echo "<br>";
	if(!isset($_SESSION['loggedin'])){
		redirectPHP('noPermission.php');
	}
?>
<body>
	<?php include 'menu.php'; ?>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-xs-1">
		</div>	
		<div class="col-xs-10">
		<div class="text-center"><h1> Remisiones de órden de embarque</h1></div>
		<?php
		
		if (isset($_SESSION['Embarque']) && isset($_SESSION['fecha_embarque'])){
			echo "<h4>Folio: <b>" . $_SESSION['Embarque'] . "</b><br>Fecha: <b>" . $_SESSION['fecha_embarque'] . "</b></h4><br>";
		}else{
			if (isset($_POST['FOLIO']) && isset($_POST['FECHA_CREACION'])){
				$_SESSION['Embarque'] = $_POST['FOLIO'];
				$_SESSION['fecha_embarque'] = $_POST['FECHA_CREACION'];
				echo "<h4>Folio: <b>" . $_POST['FOLIO'] . "</b><br>Fecha: <b>" . $_POST['FECHA_CREACION'] . "</b></h4><br>";	
			}
		}
			//THIS 2 LINES FOR INCLUDE THE PAGER $startrow && $numOfrows
			$startrow = pagerStartrow();
			$numOfrows = pagerNumOfRows();
			if (!isset($_SESSION['key'])){
				if (isset($_POST['web_key']))
				$_SESSION['key'] = $_POST['web_key'];
			}
//				DE.name AS Destino,

		$sql = "
			SELECT
				SHR.delivery_id AS delivery_id,
				SH.number AS Embarque,
				SH.id_shipt AS ID,
				SHR.id_row AS Folio,
				SHR.bol_id AS Remisión,
				cu.name AS Cliente,
				SHR.bales AS Pacas,
				SHR.m2 AS m2,
				SHR.kg AS kg
			FROM s_shipt AS SH
				INNER JOIN ss_shipt_st AS SHS ON SHS.id_shipt_st = SH.fk_shipt_st
				INNER JOIN s_shipt_row AS SHR ON SHR.id_shipt = SH.id_shipt
				INNER JOIN au_cus AS cu ON cu.id_cus = SHR.fk_customer
				INNER JOIN su_destin AS DE ON DE.id_destin = SHR.fk_destin
				INNER JOIN su_shipper AS SHIP ON SHIP.id_shipper = SH.fk_shipper
			WHERE
				SH.web_key='" . $_SESSION['key'] . "' 
			ORDER BY SHR.bol_id;";# LIMIT $startrow, $numOfrows;";

			$result = $conexion->query($sql);
			$buttons = array(
						array('↑', 'btn btn-success',"<span class='glyphicon glyphicon-upload'></span>&nbsp;&nbsp;&nbsp;<span class='glyphicon glyphicon-camera'></span>")
					);
			##	THE VALUES for $index refers to the next values
				// 8 = SHR.m2 AS m2,
				// 9 = SHR.kg AS kg,
			$index = array(7, 8, 9);
			$form = array('cargar.php','');
			echo "<div class='myScrollH'>";
				echo "Filtrar: <input type='text' id='myInput01' onkeyup='filterTable(0)' placeholder='Buscar remisión...' title='Filtrar por remisión...'>";
				printTableC($result, $buttons, $form, 4, $index, 1);
			echo "</div>";

		?>
		</div>
		<div class="col-xs-1">
		</div>
	</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-4 text-right">
			<br>
			<?php if (!isset($_SESSION['fake'])){?>
				<form action="filterTrans.php" method="POST">
					<input type="text" name="bf1dc" class="hidden" value="<?php if(isset($_SESSION['btn'])){echo $_SESSION['btn'];}else{echo 1;}?>">
					<input type="submit" class="btn btn-primary" value="VOLVER">
				</form>
			<?php }?>
			</div>
			<div class="col-xs-5"></div>
		</div>
	<?php include 'footer.php';?>
</div>
	<?php include 'applyfilter.php';?>
</body>
