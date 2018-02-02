<?php 
	session_start();
	echo "<title>";
	echo "INICIO | TRASPORTISTA";
	echo "</title>";
	include 'header.php';
	require 'functionsphp.php';
	echo "<br>";
	echo "<br>";
	
	canAccess($_SESSION['loggedin'], 'indexTransportista.php', $_SESSION['rol']);
	if (isset($_SESSION['TEMP'])){
		unset($_SESSION['TEMP']);
	}
?>

<body>
	<?php
	include 'menu.php';
	?>
	<div class="container-fluid" disabled>
		<?php include 'logo.php'; ?>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 text-center">
			<p><h1><b>EVIDENCIAS:</b></h1></p>
			</div>
			<div class="col-md-4"></div>
		</div>
		
		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-4">
			<form action="filterTrans.php" method="POST" onSubmit="disableAllInputs()">
				<input type="submit" class="btn btn-danger3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Por subir">
					<input type="text" class="hidden" value="1" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4">
			  <form action="filterTrans.php" method="POST" onSubmit="disableAllInputs()">
				<input type="submit" class="btn btn-warning3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Por aceptar">
					<input type="text" class="hidden" value="2" name="bf1dc"/>
				</input>
			</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-4">
			<form action="filterTrans.php" method="POST" onSubmit="disableAllInputs()">
				<input type="submit" class="btn btn-success3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Aceptadas">
					<input type="text" class="hidden" value="3" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4">
			  <form action="filterTrans.php" method="POST" onSubmit="disableAllInputs()">
				<input type="submit" class="btn btn-primary3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Mostrar todas">
					<input type="text" class="hidden" value="4" name="bf1dc"/>
				</input>
			</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<br>
		<br>
		<br>
		<br>
			<?php include 'footer.php'; ?>
	</div>
	<script>
	function disableAllInputs(){
		
		var inputs = document.getElementsByTagName("INPUT");
		for (var i = 0; i < inputs.length; i++) {
			if (inputs[i].type === 'submit') {
				inputs[i].disabled = true;
			}
		}
	
	}
</script>
</body>