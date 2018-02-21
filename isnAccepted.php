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
<br>
<br>
<br>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center">
					<?php include 'logo.php'?>
<br>
<br>
<br>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8 text-center">
					<p> <h3> Las evidencias para este folio no se pueden modificar por el momento.</h3></p><br>
					Contacta a los encargados del area correspondiente si crees que hay algun error.
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