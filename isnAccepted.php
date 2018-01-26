<?php 
	include 'header.php'; 
	session_start();
?>
<html>
	<head>
		<title>
			Sin modificaciones
		</title>
	</head>
	<body>
		<div class="container-fluid">
			<?php include 'logo.php';?>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8 text-center">
					<p> <h3> Las evidencias para este folio no se pueden modificar por el momento.</h3></p><br>
					Contacta a los encargados del area correspondiente si tienes alguna duda.
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		</div>
		<?php 
		include 'footer.php';
		session_destroy();
		?>
	</body>
</html>