	<?php
	echo "<title>";
	echo "CARGA DE EVIDENCIAS";
	echo "</title>";

	include 'header.php'; 
	require_once 'functionsphp.php';
	require_once 'database.php';
	session_start(); 

	if (!empty($_POST)){
		$_SESSION['Folio'] = $_POST['Embarque'];
		$_SESSION['Remision'] = $_POST['Remisión'];
		$_SESSION['id'] = $_POST['ID'];
	}
	if (isset($_SESSION['loggedin']) AND $_SESSION['loggedin'] = true){

	}else{
		redirectPHP('noPermission.php');
	}
	?>

    <script src="js/script.js"></script>
<body>
	<?php include 'menu.php'; ?>
	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2>Orden de embarque #:&nbsp<b><?php echo $_SESSION['Embarque'];?> </b></h2>
				<h2>Remision #:&nbsp<b><?php echo $_SESSION['Remision'];?> </b></h2>
				<form action="folios.php" method="POST">
					<input type="text" class="hidden" value="<?php echo $_SESSION['web_key'];?>">
					<input type="submit" class="btn btn-danger" value="VOLVER">
				</form>
			</div>
		</div>
		
		<?php
			$sql = "
			SELECT 
				EVI.file_location, 
				EVI.file_name, 
				EVI.id_evidence, 
				EVI.b_accept 
			FROM S_EVIDENCE as EVI 
				INNER JOIN S_SHIPT_ROW as SHR ON EVI.fk_ship_row=SHR.id_row AND
				EVI.fk_ship_ship = SHR.id_shipt
				
			WHERE bol_id=" . $_SESSION['Remision'] . " 
				AND SHR.id_shipt=" . $_SESSION['id'] . " 
				AND NOT EVI.b_del 
			GROUP BY SHR.bol_id, EVI.file_name ORDER BY EVI.b_accept DESC;";

			$result = $conexion->query($sql);
			if ($result->num_rows > 0){
				
			echo "<div class='row'>";
				echo "<div class='col-xs-12 text-center'>";
					echo "<h2>Evidencias cargadas</h2>";
				echo "</div>";
			echo "</div>";
			echo "<div class='row'>";
				echo "<div class='col-xs-4'></div>";
				echo "<div class='col-xs-4'>";
					echo "<div id='imgs' class='text-center'>";
					
				while($row = $result->fetch_array(MYSQLI_NUM)){
					$image = $row[0] . $row[1];
					?>
					<form action="deleteFile.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas eliminar el archivo? <?php //echo $image; ?> ')){return false;}"> 
						<a id="single_image" href="<?php echo $image; ?>"> <img style='width:50px;height:50px;' src="<?php echo $image; ?>"></a>
						<input type="text" class="hidden" name="MyFile" value="<?php echo $image; ?>"/>
						<input type="text" class="hidden" name="MyFileDir" value="<?php echo $row[0]; ?>"/>
						<input type="text" class="hidden" name="MyFileFile" value="<?php echo $row[1]; ?>"/>
						<input type="text" class="hidden" name="del_id" value="<?php echo $row[2]; ?>"/>
						<?php if(!$row[3]){ ?>
							<input type="submit" name='submit' id="btn" name="btn" class='btn btn-danger' value='ELIMINAR'/>
						<?php }else{ ?>
							<input type="button" class='btn btn-success' value='ACEPTADA' disabled/>
						<?php } ?>
					</form>
					<?php 	
				}
			}
			echo "</div>";
				echo "</div>";
				echo "<div class='col-xs-4'>";
				echo "</div>";
			echo "</div>";
		?>

		<?php 
			##//Verify if the status is 0 or 1 for insert or not the button of Load Images\\##
			
			$sql = "
			SELECT 
				SH.fk_shipt_st 
			FROM S_SHIPT_ROW AS SHR 
				INNER JOIN S_SHIPT AS SH ON SH.id_shipt = SHR.id_shipt 
			WHERE 
				SHR.bol_id=" . $_SESSION['Remision'] . " AND SH.id_shipt=" . $_SESSION['id'] . ";";
			$result = $conexion->query($sql);
			$row = $result->fetch_array(MYSQLI_NUM);

			if ($row[0] != 12 ){
		?>
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2>Evidencias por cargar.</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4">
				<div class="text-center" id="forxsiv"> 
					<form class="text-center form-group" enctype="multipart/form-data" action="upload.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas cargar la(s) imagen(es)?')){return false;}">
						<div id="filediv">
							<input name="file[]" class="form-group" type="file" id="file" accept="image/*,application/pdf"/>
						</div>
						<br/>
						<p class="text-center">
							<input type="button" id="add_more" style="display: inline-block;" class="upload btn btn-success btn-lg hidden	" disabled value="+" onClick="this.disabled=true;">
							<input type="submit" value="Cargar" style="display: inline-block;" name="submit" id="upload" class="upload btn btn-danger">
						</p>
					</form>
					<br/>
					<br/>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
			<?php } ?>
		
	<?php include 'footer.php'; ?>
	</div>
	<script src="js/custom-file-input.js"></script>
</body>
</html>