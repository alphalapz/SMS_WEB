<html>
 <title>
 ASIGNAR CONTRASEÑA
 </title>
<?php
	include 'header.php';
	session_start();
	require 'functionsphp.php';
	canAccess($_SESSION['loggedin'], 'changePassword.php', $_SESSION['rol']);
?>

<body>
<div class="container">
	<div class="jumbotron">
		<?php include 'logo.php'; ?>
		<div class="row">
			<div class="col-sm-12 text-center">
				<h3>ASIGNAR CONTRASEÑA <br><b> <?php echo strtoupper($_SESSION['username']);?></b></h3>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="updatePassword.php" id="formCheckPassword" class="form-group" method="POST">
					<br>
					<br>
					<label>Ingresar nueva contraseña:*</label><br><input type="password" class="form-control" name="password" id="password"/><br><br>
					<label>Confirmar nueva contraseña:*</label><br><input type="password" class="form-control" name="cfmPassword" id="cfmPassword" /><br><br><br><br>
					<div style="float:left"><input type="button" class="btn btn-warning text-left" 
					value="CANCELAR" onclick="window.location.replace('logout.php')"></div>
					<div style="float:right"><input type="submit" class="btn btn-primary text-right" value="ENVIAR"></div>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</div>
	<script>
	$("#formCheckPassword").validate({
		rules: {
			password: { 
				required: true,
				minlength: 6,
				maxlength: 20,
			} , 
			cfmPassword: { 
				equalTo: "#password",
				minlength: 6,
				maxlength: 20
			}
		},
		messages:{
			password: { 
				required:"Este campo es requerido."
			}
		}
	});
	</script>
</body>
</html>