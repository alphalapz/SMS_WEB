<?php
	function checkRol($rol){
		switch($rol){
				case 11:
					// echo "Rol admin <br>";
					redirectPHP('panel-control.php');
					break;
				case 21:
					// echo "Rol Crédito y cobranza<br>";
					redirectPHP('indexCredito.php');
					break;
				case 31:
					// echo "Rol Transportista <br>";
					redirectPHP('indexTransportista.php');
					break;
				default:
					break;
			}
	}

	function printAllImgD($dir){
		// $directory = "./"; #Directorio raíz
		$directory = "./$dir"; 

		$images = glob($directory . "*.{jpg,png,gif}", GLOB_BRACE);
		
		while($row){
			?>
			<form action="deleteFile.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas eliminar el archivo <?php echo $image; ?> ?')){return false;}"> 
				<a id="single-image" href="<?php echo $image; ?>"> <img style='width:50px;height:50px;' src="<?php echo $image; ?>"></a>
				<input type="text" class="hidden" name="MyFile" id="MyFile" value="<?php echo $image; ?>"/>
				<input type="submit" name='submit' id="btn" name="btn" class='btn btn-danger' value='ELIMINAR'/>
			</form>
			<?php 
		}
	}

	function printAllImg($dir){
		// $directory = "./"; #Directorio raíz
		$directory = "./$dir"; 

		$images = glob($directory . "*.{jpg,png,gif}", GLOB_BRACE);

		foreach($images as $image)
		{
			?>
			<form action="deleteFile.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas eliminar el archivo?')){return false;}"> 
				<a id="single-image" href="<?php echo $image; ?>"> <img style='width:50px;height:50px;' src="<?php echo $image; ?>"></a>
				<input type="text" class="hidden" name="MyFile" id="MyFile" value="<?php echo $image; ?>"/>
				<input type="submit" name='submit' id="btn" name="btn" class='btn btn-danger' value='ELIMINAR'/>
			</form>
			<?php 
		}
		
	}

	function deleteFile($file, $dir, $file_file){
		if (file_exists($file)) {
			if (!unlink($file)) {
			  echo ("Error borrando: $file");
			  }
			else {
			  echo ("Se borro: $file");
			  require 'database.php';
			  $sql="UPDATE S_EVIDENCE as EVI SET EVI.b_del = 1 WHERE EVI.file_name='" . $file_file . "' AND EVI.file_location='" . $dir . "';";
			  $result = $conexion->query($sql);
			  echo $sql;
			  }
		} else {
			echo "EL ARCHIVO $file NO EXISTE!";			
		}
	}

	function redirectPHP($url){
		?>
			<script>
			redirectjs('<?php echo $url;?>');
			</script>
		<?php
		header('Location:' . $url);
	}

	function canAccess($Session, $url, $rol){
		if ($Session == 1) {
			$Session = true;
		}
		//Check if can view the views
		if (isset($Session) && $Session == true) {
			if (!canView($url, $rol)){
				echo "DEBE REDIRECCIONAR!";
				redirectPHP('noPermission.php');
			}
		}
		else{
			redirectPHP('noLogin.php');
		}
	}

	function canView($url, $rol_Session){
		$string = file_get_contents("urls.json");
		$json_a = json_decode($string, true);

		$encontrado = false;

		foreach($json_a as $item){
			foreach ($item as $key){
				if(is_array($key)) {
					foreach ($key as $val){
						if ($encontrado && $val == $rol_Session && $item['url'] == $url){
							return true;
						}
					}
				}
				else{
					if ($key == $url){
						$encontrado = true;
					}
				}
			}
		}	
		// echo "NO ENCONTRADO!";
		return false;
	}

	function applyFiltersTransDate($type, $starDate, $endDate){
		$sql = "
		SELECT
			SHR.ID_ROW as REMISION,
			SH.ID_SHIPT AS FOLIO_EMBARQUE,
			SHR.delivery_number as Remision,
			sh.web_key as web_key,
			SH.NUMBER AS FOLIO,
			SH.DRIVER_NAME AS NOMBRE_CHOFER,
			SH.TS_USR_RELEASE AS FECHA_LIBERACION,
			SH.SHIPT_DATE AS FECHA_CREACION,
			SHIP.NAME AS TRANSPORTISTA,
			SHS.NAME AS ESTATUS,
			SHP.NAME AS FLETE,
			sum(SHR.ORDERS) AS N_ORDENES,
			SH.m2 AS M2,			
			SH.kg AS KILOGRAMOS
		FROM S_SHIPT AS SH
			INNER JOIN SS_SHIPT_ST AS SHS ON SHS.ID_SHIPT_ST = SH.FK_SHIPT_ST
			INNER JOIN SU_SHIPT_TP AS SHP ON SHP.ID_SHIPT_TP = SH.FK_SHIPT_TP
			INNER JOIN SU_CARGO_TP AS CA ON CA.ID_CARGO_TP = SH.FK_CARGO_TP
			INNER JOIN SU_HANDG_TP AS HA ON HA.ID_HANDG_TP = SH.FK_HANDG_TP
			INNER JOIN SU_VEHIC_TP AS VE ON VE.ID_VEHIC_TP = SH.FK_VEHIC_TP
			INNER JOIN S_SHIPT_ROW AS SHR ON SHR.ID_SHIPT = SH.ID_SHIPT
			INNER JOIN AU_CUS AS CU ON CU.ID_CUS = SHR.FK_CUSTOMER
			INNER JOIN SU_DESTIN AS DE ON DE.ID_DESTIN = SHR.FK_DESTIN
			INNER JOIN SU_SHIPPER AS SHIP ON SHIP.ID_SHIPPER = SH.FK_SHIPPER ";
		switch ($type) {
			case 1:
			echo "<h1 class='text-center'>Evidencias por subir:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=2 AND SH.TS_USR_RELEASE BETWEEN '$starDate' AND '$endDate 23:59:59' 
				GROUP BY SH.ID_SHIPT;";
				break;
			case 2:
			echo "<h1 class='text-center'>Evidencias por aceptar:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=11 AND SH.TS_USR_RELEASE BETWEEN '$starDate' AND '$endDate 23:59:59' 
				GROUP BY SH.ID_SHIPT;";
				break;
			case 3:
			echo "<h1 class='text-center'>Evidencias aceptadas:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=12 AND SH.TS_USR_RELEASE BETWEEN '$starDate' AND '$endDate 23:59:59' 
				GROUP BY SH.ID_SHIPT;";
				break;
			case 4:
			echo "<h1 class='text-center'>Todas las evidencias:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND (SHS.id_shipt_st=12 OR SHS.id_shipt_st=11 OR SHS.id_shipt_st=2) AND SH.TS_USR_RELEASE BETWEEN '$starDate' AND '$endDate 23:59:59' 
				GROUP BY SH.ID_SHIPT;";
				break;
			default:
			break;
		}
		return $sql;
	}

	function applyFiltersTrans($type){
		$sql = "
		SELECT
			SHR.ID_ROW as REMISION,
			SH.ID_SHIPT AS FOLIO_EMBARQUE,
			SHR.delivery_number as Remision,
			sh.web_key as web_key,
			SH.NUMBER AS FOLIO,
			SH.DRIVER_NAME AS NOMBRE_CHOFER,
			SH.TS_USR_RELEASE AS FECHA_LIBERACION,
			SH.SHIPT_DATE AS FECHA_CREACION,
			SHIP.NAME AS TRANSPORTISTA,
			SHS.NAME AS ESTATUS,
			SHP.NAME AS FLETE,
			sum(SHR.ORDERS) AS N_ORDENES,
			SH.m2 AS M2,			
			SH.kg AS KILOGRAMOS
		FROM S_SHIPT AS SH
			INNER JOIN SS_SHIPT_ST AS SHS ON SHS.ID_SHIPT_ST = SH.FK_SHIPT_ST
			INNER JOIN SU_SHIPT_TP AS SHP ON SHP.ID_SHIPT_TP = SH.FK_SHIPT_TP
			INNER JOIN SU_CARGO_TP AS CA ON CA.ID_CARGO_TP = SH.FK_CARGO_TP
			INNER JOIN SU_HANDG_TP AS HA ON HA.ID_HANDG_TP = SH.FK_HANDG_TP
			INNER JOIN SU_VEHIC_TP AS VE ON VE.ID_VEHIC_TP = SH.FK_VEHIC_TP
			INNER JOIN S_SHIPT_ROW AS SHR ON SHR.ID_SHIPT = SH.ID_SHIPT
			INNER JOIN AU_CUS AS CU ON CU.ID_CUS = SHR.FK_CUSTOMER
			INNER JOIN SU_DESTIN AS DE ON DE.ID_DESTIN = SHR.FK_DESTIN
			INNER JOIN SU_SHIPPER AS SHIP ON SHIP.ID_SHIPPER = SH.FK_SHIPPER ";
		switch ($type) {
			case 1:
			echo "<h1 class='text-center'>Evidencias por subir:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=2 GROUP BY SH.ID_SHIPT;";
				break;
			case 2:
			echo "<h1 class='text-center'>Evidencias por aceptar:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=11 GROUP BY SH.ID_SHIPT;";
				break;
			case 3:
			echo "<h1 class='text-center'>Evidencias aceptadas:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND SHS.id_shipt_st=12 GROUP BY SH.ID_SHIPT;";
				break;
			case 4:
			echo "<h1 class='text-center'>Todas las evidencias:</h1><br>";
				$sql = $sql . "
				WHERE
					SHIP.fk_usr = " . $_SESSION['user_id'] . " AND (SHS.id_shipt_st=12 OR SHS.id_shipt_st=11 OR SHS.id_shipt_st=2) GROUP BY SH.ID_SHIPT;";
				break;
			default:
			break;
		}
		return $sql;
	}
	
	function applyFiltersCoDate($type, $starDate, $endDate){

		$starDate = str_replace('-', ':', $starDate);
		$endDate = str_replace('-', ':', $endDate);
		$sql = "
			SELECT 
				E.id_evidence,
				SH.number,
				SHR.delivery_number,
				E.file_location,
				E.file_name,
				E.file_location,
				E.file_name,
				E.b_accept,
				SH.driver_name,
				SH.shipt_date,
				E.ts_usr_upload,
				E.ts_usr_accept,
				E.ts_usr_upd
			FROM 
				S_EVIDENCE AS E
				INNER JOIN S_SHIPT AS SH ON E.fk_ship_ship = SH.id_shipt 
				INNER JOIN S_SHIPT_ROW AS SHR ON SHR.ID_SHIPT = SH.ID_SHIPT ";
		switch ($type) {
			case 1:
			echo "<h1 class='text-center'>Evidencias por aceptar:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND SH.fk_shipt_st=11 AND SH.shipt_date BETWEEN '$starDate' AND '$endDate'
				GROUP BY E.id_evidence;";
				break;
			case 2:
			echo "<h1 class='text-center'>Evidencias aceptadas:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND SH.fk_shipt_st=12 AND SH.shipt_date BETWEEN '$starDate' AND '$endDate'
				GROUP BY E.id_evidence;";
				break;
			case 3:
			echo "<h1 class='text-center'>Todas las evidencias:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND (SH.fk_shipt_st=11 OR SH.fk_shipt_st=12) AND SH.shipt_date BETWEEN '$starDate' AND '$endDate'
				GROUP BY E.id_evidence;";
				break;
			default:
				$sql = $sql . "GROUP BY E.id_evidence;";
				break;
		}
		return $sql;
	}

	function applyFiltersCo($type){
		$sql = "
			SELECT 
				E.id_evidence,
				SH.number,
				SHR.delivery_number,
				E.file_location,
				E.file_name,
				E.file_location,
				E.file_name,
				E.b_accept,
				SH.driver_name,
				SH.shipt_date,
				E.ts_usr_upload,
				E.ts_usr_accept,
				E.ts_usr_upd
			FROM 
				S_EVIDENCE AS E
				INNER JOIN S_SHIPT AS SH ON E.fk_ship_ship = SH.id_shipt 
				INNER JOIN S_SHIPT_ROW AS SHR ON SHR.ID_SHIPT = SH.ID_SHIPT ";
		switch ($type) {
			case 1:
			echo "<h1 class='text-center'>Evidencias por aceptar:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND SH.fk_shipt_st=11
				GROUP BY E.id_evidence;";
				break;
			case 2:
			echo "<h1 class='text-center'>Evidencias aceptadas:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND SH.fk_shipt_st=12
				GROUP BY E.id_evidence;";
				break;
			case 3:
			echo "<h1 class='text-center'>Todas las evidencias:</h1><br>";
				$sql = $sql . "
				WHERE
					NOT E.b_del AND (SH.fk_shipt_st=11 OR SH.fk_shipt_st=12)
				GROUP BY E.id_evidence;";
				break;
			default:
				break;
		}
		return $sql;
	}

	function printTable($result){
		$info_field = $result->fetch_fields();
		
		echo " <table class='table table-hover myTable'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;
		foreach ($info_field as $valor) {
			$cont++;
			echo "<th>" . $valor->name . "</th>";
		}
		echo " </tr>";
		echo " </thead>";
		echo "<tbody>";
		while($row = $result->fetch_array(MYSQLI_NUM)) {
			echo "<tr>";
			for ($i = 0; $i < $cont; $i++){
				echo "<td>" . $row[$i] . "</td>";
			}
			echo "</tr>";
		}

	}
	//$buttons must be and array of arrays
	//i.e: printableB
	// $buttons = array(
	// 		array('Texto del boton', 'btn btn-warning') 
	// );
	// $form = array('test.php','¿Seguro?');
	function printTableB($result, $buttons, $form){
		$aNames = array();
		$info_field = $result->fetch_fields();
		echo "<div class='myScrollH'>";
		echo " <table class='table table-hover table-condensed myTable'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;			
		foreach ($info_field as $valor) {
			$cont++;
			if ($cont <= 4){
				echo "<th class='hidden'>" . $valor->name . "</th>";
			}else{
				echo "<th>" . $valor->name . "</th>";
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
				echo "<form class='form-control' action='$form[0]' method='POST' " . $text;
				$names = array_reverse($aNames);
			for ($i = 0; $i < $cont; $i++){
				if ($i < 4){
					echo "<input type='text' class='hidden' name='" . array_pop($names) . "' value='$row[$i]'/>";
				} else{
				echo "<td>";
					echo $row[$i];
					echo "<input type='text' class='hidden' name='" . array_pop($names) . "' value='$row[$i]'/>";
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
	}

	function printTableC($result, $buttons, $form, $hidden){
		$aNames = array();
		$info_field = $result->fetch_fields();

		echo " <table class='table table-hover table-condensed myTable'>";
			echo " <thead>";
				echo "<tr>";
			$cont = 0;			

		foreach ($info_field as $valor) {
			$cont++;
			if ($cont <= $hidden){
				echo "<th class='hidden'>" . $valor->name . "</th>";
			}else{
				echo "<th>" . $valor->name . "</th>";
			}
				array_push($aNames, $valor->name);
		}

		echo "<th>Acciones</th>";
		echo " </tr>";
		echo " </thead>";
		echo "<tbody>";

		while($row = $result->fetch_array(MYSQLI_NUM)) {
			echo "<tr>";
				$text = $row[1] == '' ? ">" : "onsubmit=\"if(!confirm('Ver remisiones para el embarque $row[1]?')){return false;}\" >";
				echo "<form class='form-control' action='$form[0]' method='POST' " . $text;
				$names = array_reverse($aNames);

			for ($i = 0; $i < $cont; $i++){
				if ($i < $hidden){
					echo "<input type='text' class='hidden' name='" . array_pop($names) . "' value='$row[$i]'/>";
				} else{
				echo "<td>";
					echo $row[$i];
					echo "<input type='text' class='hidden' name='" . array_pop($names) . "' value='$row[$i]'/>";
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

	}

	###############################################
	## $folio = id_shipt of the table S_SHIPT_ROW #
	###############################################
	function validateIfAllRemissionsHadEvidence($folio){
		require 'database.php';
		$sql = "SELECT id_row FROM S_SHIPT_ROW WHERE id_shipt =" . $folio ." GROUP BY id_row;";
		$result = $conexion->query($sql);
		$sql2 = "SELECT fk_ship_row FROM S_EVIDENCE WHERE NOT b_del;";
		$result2 = $conexion->query($sql2);
		$save = $result2;
		$completo = true;
		$evidenceArray = array();
		while ($row2 = $result2->fetch_array(MYSQLI_NUM)){
			array_push($evidenceArray,$row2[0]);
		}
		while ($row = $result->fetch_array(MYSQLI_NUM)){
			$found = false;
			if(in_array($row[0],$evidenceArray)){
				$found = true;
			}
			else{
				echo "<br> El folio # : " . $row[0] . " esta pendiente de que se suban evidencias :(";
				$completo = false;
				break;
			}
		}
		if($completo){
			$sql = "UPDATE S_SHIPT SET fk_shipt_st = 11 WHERE id_shipt=$folio";
			$result = $conexion->query($sql);
			echo "<br>EL FOLIO ESTA COMPLETO,<br> TODAS LAS REMISIONES POSEEN AL MENOS UNA EVIDENCIA.<br>Favor de esperar respuesta por parte de crédito y cobranza.";
		}
		else{
			$sql = "UPDATE S_SHIPT SET fk_shipt_st = 2 WHERE id_shipt=$folio";
			$result = $conexion->query($sql);
		}
	}

	function changeStatusRemisionEvidenceDelete($id){
		require 'database.php';
		$sql = "SELECT EVI.fk_ship_ship FROM S_EVIDENCE AS EVI WHERE id_evidence = $id;";
		$result = $conexion->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM);
		validateIfAllRemissionsHadEvidence($row[0]);
	}

	//Validate json urls.json
	function printJson(){
		$string = file_get_contents("urls.json");
		$json = json_decode($string, true);
		foreach($json_a as $item){
			foreach ($item as $key){
				if(is_array($key)) {
					foreach ($key as $val){
						echo $val . "<br>";
					}
				}
				else{
					echo $key . "<br>";
				}
			}
		}
	}
?>