<?php
require 'database.php';
require 'functionsphp.php';
require 'imgFunctions.php';
error_reporting(1);
?>
<title>
Pruebas
</title>
<div class="container-fluid">
<?php
include 'header.php';
    $imgTrans = new imageTransform();
    $imgTrans->sourceFile = "C:/1/imgIN.jpg";
    $imgTrans->targetFile = "C:/1/imgOut.jpg";
    $imgTrans->resizeToHeight = 1200;
    // $imgTrans->resizeToWeight = 800;
	
	if ($imgTrans->resize() == true){
		echo "TODO OK";
		$canSave = true;
	}
	else{
		echo "FALLO!";
		$canSave = false;
	}
	echo "<pre>";
	var_dump($imgTrans);
	echo "</pre>";
?>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<?php
			// $sql="
			// ##PENDIENTES *LIBERADOS* y *POR ACEPTAR*\n
			// SELECT
				// SH.number AS FOLIO,
				// SH.shipt_date AS FECHA_EMBARQUE,
				// SHS.name AS ESTATUS,
				// SHP.name AS TRANSPORTISTA
			// FROM S_SHIPT AS SH
				// INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				// INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			// WHERE NOT SH.b_del AND (fk_shipt_st=" . S_ST_POR_ACEPTAR . " OR fk_shipt_st=2);";
			// echo $sql;
			// $result = $conexion->query($sql);
			// $info_field = $result->fetch_fields();
			// printTable($result);

		?>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php include 'footer.php';?>