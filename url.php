<?php 
	include 'header.php';
	require 'functionsphp.php';
	include 'menu.php'; 
?>
<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
			<?php
			session_start();
			//	Validate the web_key Exist and is not null.
			if ($_GET['key'] == null){ //This line can be changed for: =>>>=>=>>> if (empty($_GET['key'])){
				redirectPHP('noPermission.php');
			}
			require 'database.php';
			$_SESSION['key'] = $_GET['key'];
			$sql ="
				SELECT
					SH.number AS Embarque,
					SH.shipt_date AS fecha_embarque,
					SHR.bol_id as Remision,
					SH.driver_name AS Nombre_chofer,
					SHIP.name AS Transportista,
					SHR.m2 as m2,
					SHR.kg as Kilogramos,
					SHR.bales as Pacas,
					DE.name as Destino_Embarque,
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
				WHERE SH.web_key='" . $_SESSION['key'] . "'";

				//$_SESSION['TEMP'] = $sql;
				$result = $conexion->query($sql);
				echo "<br>";
				mysqli_num_rows($result);
				if ($result->num_rows > 0) {
					$row = $result->fetch_array(MYSQLI_ASSOC);
					$_SESSION['user_id'] = $row['idShipper'];
					$_SESSION['username'] = $row['Nombre_chofer'];
					$_SESSION['fake'] = true;
					$_SESSION['loggedin'] = true;
					$_SESSION['rol'] = 99;
					$_SESSION['name'] = "Chofer: " . $row['Nombre_chofer'];
					$_SESSION['Embarque'] = $row['Embarque'];
					$_SESSION['fecha_embarque'] = $row['fecha_embarque'];
					redirectPHP('folios.php');
				} else {
					redirectPHP('isnAccepted.php');
				}

				mysqli_close($conexion); 
			?>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
