<?php
	session_start();
	require 'database.php';
	require 'functionsphp.php';
	include 'header.php';
	canAccess($_SESSION['loggedin'], 'changeStatus.php', $_SESSION['rol']);
	$id_Selected = $_POST['evidence'];
	

 	//ALPHALAPZ:Queda pendientes las validaciones y los updates correctos para esta parte (STATUS 0|1 && STATUS XACEPTAR 'X' | ACEPTADO 'X')
	############################################################################################################################
	###								THIS PART WORKS PERFECTLY									 							 ###
	$sql = "UPDATE `S_EVIDENCE` SET `b_accept` = '1' WHERE `id_evidence` = $id_Selected;"; 	 	 							 ###
	$result = $conexion->query($sql);														 								 ###
	$sql = "UPDATE `S_EVIDENCE` SET `fk_usr_accept` =".$_SESSION['user_id']." WHERE `id_evidence` = $id_Selected;"; 	 	 ###
	$result = $conexion->query($sql);														 	 							 ###
	############################################################################################################################
	//SABER SI TODAS LAS EVIDENCIAS DE LAS REMISIONES DE UN FOLIO X YA ESTAN APROBADAS
	
	$sql = "SELECT SH.id_shipt as folio, SHR.id_row as remision, SH.fk_shipt_st as status
		FROM S_EVIDENCE AS EVI
		INNER JOIN S_SHIPT_ROW AS SHR ON EVI.fk_ship_row = SHR.id_row
		INNER JOIN S_SHIPT AS SH ON EVI.fk_ship_ship = SH.id_shipt
		WHERE EVI.id_evidence=$id_Selected AND NOT EVI.b_del AND NOT SH.b_del
		GROUP BY EVI.id_evidence;";
				
	$result = $conexion->query($sql);
	
	$row = $result->fetch_array(MYSQLI_NUM);
	$folio = $row[0];
	$remision = $row[1];
	$status = $row[2];
	
	$sql = "SELECT b_accept FROM S_EVIDENCE WHERE NOT b_del AND fk_ship_ship=$folio;";# AND fk_ship_row=$remision;";
	
	$result = $conexion->query($sql);
	$evidenceArray = array();
	while ($row2 = $result->fetch_array(MYSQLI_NUM)){
		array_push($evidenceArray,$row2[0]);
	}
	
	if(!in_array(0, $evidenceArray) && $status == 11){
		$completo = false;
		echo "<br>Folio completado.";
		$sql = "UPDATE S_SHIPT SET fk_shipt_st = 12 WHERE id_shipt=$folio";
		$result = $conexion->query($sql);		
	}else{
		
	}

	include 'logo.php';
?>

<div class="Myouter">
  <div class="Mymiddle">
    <div class="Myinner">
	 <h3>Cargando</h3>
     <div class="progress text-center">
	  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
	  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:85%">
	  <p> Aprobando evidencia:</p>
	  </div>
	</div>
    </div>
  </div>
</div>
<script>
	redirectjs("IndexCredit.php");
</script>
<?php include 'footer.php'; ?>