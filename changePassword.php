<html>
<?php
 include 'header.php';
 session_start();
 
 	require 'functionsphp.php';
	canAccess($_SESSION['loggedin'], 'changePassword.php', $_SESSION['rol']);
?>
	
<body>
<div class="container">
	<div class="jumbotron">
		<div class="row">
			<div class="col-sm-12 text-center">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
				<h3>ASIGNAR NUEVA CONTRASEÑA PARA <?php echo strtoupper($_SESSION['username']);?></h3>
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
					
					<div style="float:left"><input type="button" class="btn btn-warning text-left" value="CANCELAR"></div>
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
			maxlength: 10,
		} , 
		cfmPassword: { 
			equalTo: "#password",
			minlength: 6,
			maxlength: 10
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