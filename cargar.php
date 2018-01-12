	<?php
	include 'header.php'; 
	require 'functionsphp.php';
	require 'database.php';
	session_start(); 
	
	if (!empty($_POST)){
		$myPost = array_values($_POST);
		$_SESSION['Folio']=$myPost[0];
		$_SESSION['Remision']=$myPost[1];
		$_SESSION['id']=$_POST['ID'];
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
		
	}else{
		redirectPHP('index.php');
	}
		  ?>
    <script src="js/script.js"></script>
    <body>
	<?php include 'menuChofer.php'; ?>
        <div class="container-fluid">
		<?php include 'logo.php';?>
		<div class="row">
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<h1>Imagenes previamente cargadas</h1>
				<div id="imgs" class="text-center">
					<?php
						$sql="SELECT EVI.file_location, EVI.file_name, EVI.id_evidence, EVI.b_accept FROM S_EVIDENCE as EVI INNER JOIN S_SHIPT_ROW as SHR ON EVI.fk_ship_row=SHR.id_row WHERE SHR.DELIVERY_NUMBER=".$_SESSION['Remision'] ." AND NOT EVI.b_del GROUP BY SHR.delivery_number, EVI.file_name;";
						$result = $conexion->query($sql);
						while($row = $result->fetch_array(MYSQLI_NUM)){
							$image= $row[0].$row[1];
							?>
							<form action="deleteFile.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas eliminar el archivo <?php echo $image; ?> ?')){return false;}"> 
								<a id="single_image" href="<?php echo $image; ?>"> <img style='width:50px;height:50px;' src="<?php echo $image; ?>"></a>
								<input type="text" class="hidden" name="MyFile" value="<?php echo $image; ?>"/>
								<input type="text" class="hidden" name="MyFileDir" value="<?php echo $row[0]; ?>"/>
								<input type="text" class="hidden" name="MyFileFile" value="<?php echo $row[1]; ?>"/>
								<input type="text" class="hidden" name="del_id" value="<?php echo $row[2]; ?>"/>
								<?php if(!$row[3]){ ?>
									<input type="submit" name='submit' id="btn" name="btn" class='btn btn-danger' value='ELIMINAR'/>
								<?php } ?>
							</form>
							<?php 	
						}
					?>
				</div>
			</div>
			<div class="col-xs-4"></div>
		</div>
		<div class="row">
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4 text-center">
		<?php 
		##VERIFICAR SI ESTA EN STATUS PARA PONER O QUITAR EL BOTON DE CARGA DE IMAGENES##
		
		$sql = "SELECT SH.fk_shipt_st FROM S_SHIPT_ROW AS SHR 
			INNER JOIN S_SHIPT AS SH ON SH.id_shipt = SHR.id_shipt 
			WHERE SHR.DELIVERY_NUMBER=".$_SESSION['Remision']." AND SH.id_shipt=".$_SESSION['id'].";";
			// echo $sql;
			// echo "<pre>";
			// var_dump($_POST);
			// echo "</pre>";
		$result = $conexion->query($sql);
		$row = $result->fetch_array(MYSQLI_NUM);
		if ($row[0] !=12 ){
		?>
			<div id="forxsiv"> 
                <h2>Carga de evidencias para la remision: <b><?php echo $_POST['Remision'];?> </b></h2>
                <form enctype="multipart/form-data" action="upload.php" method="post" onSubmit="if(!confirm('¿Seguro que deseas cargar la(s) imagen(es)?')){return false;}">
                    <div id="filediv">
						<!--<label class="btn btn-default btn-file">
						</label>-->
							<input name="file[]" class="form-group" type="file" id="file"/>
					</div>
					<br/>
                    <input type="button" id="add_more" class="upload btn btn-success" disabled value="Add More Files" onClick="this.disabled=true;"/>
                    <input type="submit" value="Cargar" name="submit" id="upload" class="upload btn btn-danger"/>
                </form>
                <br/>
                <br/>
                <!-- <?php include "upload.php"; ?> -->
			</div>
		<?php } ?>
		</div>
		<div class="col-xs-4">
		</div>
	</div>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>