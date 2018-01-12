<html>
<head>
<title>
	Sin modificaciones
</title>
<?php 
	include 'header.php'; 
	session_start();
?>
</head>
<body>
<div class="container-fluid">
	<?php include 'logo.php';?>
	<div class="row">
		<div class="col-sm-2">
		</div>
		<div class="col-sm-8 text-center">
			<p> <h3> Las evidencias para el folio <?php echo " " .$_SESSION['id_shipt']." ";?> no se pueden modificar por el momento.</h3></p><br>	
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