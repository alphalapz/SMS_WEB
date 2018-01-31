<html lang="es">
<?php
	echo "<title>";
	echo "REGISTRO | NUEVO";
	echo "</title>";
	include 'header.php';
	require 'functionsphp.php';
	session_start();
	canAccess($_SESSION['loggedin'], 'registry.php', $_SESSION['rol']);
?>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<img src="assets/logo.svg" style="margin-top:20px"><br>
				<br><br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-4 text-center">
				<header class="text-center">
					<h1>Registro de nuevo usuario:</h1>
				</header> 
				
				<form action="reg_new.php" method="post"> 
				
					<hr />
					<h3>Crea una cuenta</h3>
					<!--Nombre Usuario-->
					<label for="nombre">Nombre de Usuario:</label><br>
					<input type="text" name="username" maxlength="100" placeholder="Ingresa tu nombre" required>
					<br/><br/>
					<!--Password-->
					<label for="pass">Password:</label><br>
					<input id="pass" type="password" name="password" maxlength="40" placeholder="Ingresa tu contraseña" required>
					<br>
					<label for="pass">Repite tu password:</label><br>
					<input id="pass2" type="password" name="password2" placeholder="Vuelve a poner tu contraseña" required>
					<br/><br/>
					<!--email-->
					<label for="mail">email:</label><br>
					<input type="mail" name="mail" placeholder="ejemplo: email@dominio.ext" required>
					<br/><br/>
					<label for="rol">Tipo de usuario:</label><br>
					<input name="rol" type="radio" value="2">Crédito y Cobranza</input><br>
					<input name="rol" type="radio" value="3">Transportista</input><br>
					<input name="rol" type="radio" value="4">Chofer</input><br>

					<br>
					<!--	UNCOMENT THIS LINE IF YOU NEED TO CLEAR THE FORM -->
					<!--	<input type="reset" class="btn btn-danger" name="clear" value="Borrar">	-->
					<input type="submit" class="btn btn-primary" name="submit" value="Registrar">
				</form>
				<br>
				<br>
				<br>
				<p class="text-right"><a href="panel-control.php"><input type="button" class="btn btn-danger btn-lg" value="Volver"></a></p>
			</div>
			<div class="col-md-4">
			</div>
		</div>
		<?php include 'footer.php'; ?>
	</div>
 </body>
</html>