<?php
	session_start();
	require 'functionsphp.php';
	require 'database.php';
	include 'header.php';
	echo "<br>";
	echo "<br>";
?>
<body>
	<?php include 'menuChofer.php'; ?>
<div class="container-fluid">
	<?php include 'logo.php'; ?>
	<div class="row">
		<div class="col-xs-1">
		</div>
		<div class="col-xs-10">
		<?PHP
		if (!isset($_SESSION['key'])){
			$_SESSION['key'] = $_POST['web_key'];
		}
		if (!isset($_SESSION['TEMP'])){
			$sql ="
			SELECT
			  SH.number AS Embarque,
			  SHR.delivery_number as Remision,
			  SH.driver_name AS Nombre_chofer,
			  SHIP.name AS Transportista,
			  SHR.m2 as m2,
			  SHR.kg as Kilogramos,
			  SHR.bales as Pacas,
			  DE.name as Destino,
			  SHS.name AS Estatus,
			  SHIP.id_shipper as idShipper,
			  SHR.id_row AS Folio,
			  SHR.delivery_id AS delivery_id,
			  SH.id_shipt AS ID
			FROM s_shipt AS SH
			  INNER JOIN ss_shipt_st AS SHS ON SHS.id_shipt_st = SH.fk_shipt_st
			  INNER JOIN s_shipt_row AS SHR ON SHR.id_shipt = SH.id_shipt
			  INNER JOIN au_cus AS cu ON cu.id_cus = SHR.fk_customer
			  INNER JOIN su_destin AS DE ON DE.id_destin = SHR.fk_destin
			  INNER JOIN su_shipper AS SHIP ON SHIP.id_shipper = SH.fk_shipper
			WHERE SH.web_key='" . $_POST['web_key'] . "'";

			$_SESSION['TEMP'] = $sql;
		}
			$result = $conexion->query($_SESSION['TEMP']);
			$x = array(
				array('Gestionar imagenes', 'btn btn-warning')
			);
			$form = array('cargar.php','');
			printTableB($result, $x, $form);
		?>
		</div>
		<div class="col-xs-1">
		</div>
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-4">
				<input type="button" class="btn btn-danger" value="VOLVER">
			</div>
			<div class="col-xs-5"></div>
		</div>
	</div>
	<?php include 'footer.php';?>
</div>
</body>
