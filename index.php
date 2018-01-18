<!DOCTYPE html>
<html lang="es">
	<?php
		include 'header.php'; 
		include 'functionsphp.php'; 
		session_start();
		if(isset($_SESSION['loggedin']) && isset($_SESSION['rol'])){
			checkRol($_SESSION['rol']);
		}
		if(isset($_SESSION['fake']) && $_SESSION['fake'] == true){
			session_destroy();
		}
	?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4 wrapper">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
				<h1>Acceso Usuario</h1>
				<br><br>
				<form class="form-group" action="checklogin.php" method="post" >
					<label><span class="glyphicon glyphicon-user">&nbsp;</span>Nombre Usuario:</label><br>
					<input name="username" class="form-control" type="text" id="username" placeholder="Nombre de usuario" required>
					<br><br>
					<label><span class="glyphicon glyphicon-lock">&nbsp;</span>Contraseña:</label><br>
					<input name="password" class="form-control" type="password" id="password" placeholder="Contraseña">
					<br><br>
					<p class="text-right">
					<input class="btn btn-lg btn-primary btn-block" type="submit" name="Submit" value="Ingresar">
					</p>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	<?php include 'footer.php' ?>
	</div>
</body>
</html>