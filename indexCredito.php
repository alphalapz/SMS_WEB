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

		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8 text-center">
			<h1><b>Órdenes de embarque</b></h1>
			</div>
			<div class="col-md-2">
			</div>
		</div>
		<div class="row">
		  <div class="col-md-2"></div>
		  <div class="col-md-4">
			<form action="eviFolios.php" method="POST">
				<input type="submit" class="btn btn-danger3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Por aceptar">
					<input type="text" class="hidden" value="<?php echo FILTER_POR_ACEPTAR; ?>" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4">
			  <form action="eviFolios.php" method="POST">
				<input type="submit" class="btn btn-success3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Aceptadas">
					<input type="text" class="hidden" value="<?php echo FILTER_POR_ACEPTADAS; ?>" name="bf1dc"/>
				</input>
			  </form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
		  <div class="col-md-4"></div>
		  <div class="col-md-4 text-center">

			<form action="eviFolios.php" method="POST">
				<input type="submit" class="btn btn-primary3 button-xlarge btn3d" style="font-size:36px; font-weight:bold;" value="Todas las órdenes">
					<input type="text" class="hidden" value="<?php echo FILTER_POR_ALL; ?>" name="bf1dc"/>
				</input>
			</form>
		  </div>
			<div class="col-md-4"></div>
		</div>
		<?php include 'footer.php'; ?>
	</div>
</body>
