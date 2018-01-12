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
		var_dump($_SESSION);
	?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
				<h1>Login de Usuarios</h1>
				<br><br>
				<form class="form-group" action="checklogin.php" method="post" >
					<label><span class="glyphicon glyphicon-user">&nbsp;</span>Nombre Usuario:</label><br>
					<input name="username" class="form-control" type="text" id="username" placeholder="Nombre de usuario" required>
					<br><br>
					<label><span class="glyphicon glyphicon-lock">&nbsp;</span>Password:</label><br>
					<input name="password" class="form-control" type="password" id="password" placeholder="Contraseña">
					<br><br>
					<input class="btn btn-primary" type="submit" name="Submit" value="LOGIN">
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	<?php include 'footer.php' ?>
	</div>
</body>
</html>