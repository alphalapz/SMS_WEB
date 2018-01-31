<?php
require 'database.php';
require 'functionsphp.php';
?>
<title>
Pruebas
</title>
<div class="container-fluid">
<?php
include 'header.php';
include 'logo.php';
?>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<?php
			$sql="
			SELECT
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT AS SH
				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE NOT SH.b_del AND (fk_shipt_st=" . S_ST_POR_ACEPTAR . " OR fk_shipt_st=2);";
			$result = $conexion->query($sql);
			$buttons = array(array('Ver Remisiones', 'btn btn-primary', "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;&nbsp;&nbsp;Ver"));
			$form = array('eviPorFolio.php','');

			$info_field = $result->fetch_fields();
			$index = array();
			printTableC($result, $buttons, $form, null, $index);
		?>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php include 'footer.php';?>