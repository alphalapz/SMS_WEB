<?php
require 'database.php';
require 'functionsphp.php';
//canAccess($_SESSION['loggedin'], 'filterCredit.php', $_SESSION['rol']);
$opt = $_REQUEST['opt'];
echo "OPT = ". $opt;
?>
<title>
Pruebas
</title>
<div class="container-fluid">
<?php
include 'header.php';

?>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		<?php

switch ($opt){
	case 1:
		$sql = "## ORDENES DE EMBARQUE PENDIENTES *LIBERADOS* y *POR ACEPTAR*\n
			SELECT
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT AS SH
				INNER JOIN SU_SHIPPER AS SHP ON SH.fk_shipper= SHP.id_shipper
				INNER JOIN SS_SHIPT_ST AS SHS ON SH.fk_shipt_st=SHS.id_shipt_st
			WHERE NOT SH.b_del AND (fk_shipt_st = " . S_ST_POR_ACEPTAR . " OR fk_shipt_st = " . S_ST_LIBERADO . ");";
		break;
	case 2:
		$sql = "## ORDENDES DE EMBARQUE PENDIENTES DE SUBIR EVIDENCIA \n
			SELECT 
				SH.number AS FOLIO,
				SH.shipt_date AS FECHA_EMBARQUE,
				SHS.name AS ESTATUS,
				SHP.name AS TRANSPORTISTA
			FROM S_SHIPT  AS SH
				LEFT OUTER JOIN S_EVIDENCE  AS EVI ON SH.id_shipt = EVI.fk_ship_ship AND NOT EVI.b_del
			WHERE EVI.fk_ship_ship IS NULL
			GROUP BY SH.id_shipt ORDER BY sh.id_shipt;";
		break;
	case 3:
		$sql = "## \n
			SELECT
				AS Talón,
				AS Remisión,
				AS Proveedor,
				AS Operador,
				AS Teléfono,
				AS Placas,
				AS Cliente
			FROM";
		break;
	default:
	break;
}
			
			echo $sql;
			$result = $conexion->query($sql);
			$info_field = $result->fetch_fields();
			printTable($result);

		?>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>
<?php include 'footer.php';?>