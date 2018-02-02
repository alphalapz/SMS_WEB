<?php 
	session_start();
	include 'header.php';
	require 'functionsphp.php';
	echo "<br>";
	echo "<br>";
	
	canAccess($_SESSION['loggedin'], 'indexCredito.php', $_SESSION['rol']);
?>
<body>
	<?php
	include 'menu.php';
	?>
	<div class="container-fluid">
		<?php include 'logo.php'; ?>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8 text-center">
			<h1><b>Órdenes de embarque:</b></h1>
			</div>
			<div class="col-md-2">
			</div>
		</div>
		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-4">
			<form action="eviFolios.php" method="POST"> 
				<input type="submit" class="btn btn-danger3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Por Aprobar">
					<input type="text" class="hidden" value="1" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4">
			  <form action="eviFolios.php" method="POST"> 
				<input type="submit" class="btn btn-success3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Aprobadas">
					<input type="text" class="hidden" value="2" name="bf1dc"/>
				</input>
			  </form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
		  <div class="col-md-4"></div>
		  <div class="col-md-4 text-center">
		  
			<form action="eviFolios.php" method="POST"> 
				<input type="submit" class="btn btn-primary3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Mostrar todas">
					<input type="text" class="hidden" value="3" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4"></div>
		</div>
		<?php include 'footer.php'; ?>
	</div>
</body>