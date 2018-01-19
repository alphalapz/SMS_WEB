
<?php
	session_start(); 
	include 'header.php';
	include 'database.php';	
	include 'functionsphp.php';
?>
<body>
	<div class="container">
		<div class="row text-center">
			<img src="assets/logo.svg" style="margin-top:20px"><br>
			<br><br>
		</div>
		<div class="row">
			<div class="col-sm-4">

			</div>
			<div class="col-sm-4 text-center">

				<?php

					if (isset($_POST['username']) OR (isset($_POST['password'])) ){
						$user = $_POST['username'];
						$password = $_POST['password'];
						$sql = "SELECT * FROM $tbl_name WHERE name = '$user' AND NOT b_del AND b_web = 1";
						$result = $conexion->query($sql);
						$row = $result->fetch_array(MYSQLI_ASSOC);

						 if ((strlen($row['pswd'])== 0) && $result->num_rows > 0){
							 
								 $_SESSION['loggedin'] = true;			
								 $_SESSION['username'] = $user;
								 $_SESSION['user_id'] = $row['id_usr'];
								 $_SESSION['rol'] = $row['fk_web_role'];
								 redirectPHP('changePassword.php');
						 }
						 
						 if (password_verify($password, $row['pswd'])) {
							 if ($row['b_del']){
							
								 echo "Estas inactivo <br>";
								 echo "<a href='index.php'><input type='button' class='btn btn-danger' value='Volver'/></a>";

							 }
							$_SESSION['loggedin'] = true;
							$_SESSION['username'] = $user;
							$_SESSION['user_id'] = $row['id_usr'];
							$_SESSION['start'] = time();
							$_SESSION['rol'] = $row['fk_web_role'];
							// $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
							
							checkRol($_SESSION['rol']);
							
							
							echo "Bienvenido! " . $_SESSION['username'];
							echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
						
						} else {
						   echo "Usuario o Contraseña incorrectos.";
						   echo "<br>";
						   echo "<br>";
						   echo "<a href='index.php'><input type='button' class='btn btn-danger' value='Intentar de nuevo'/></a>";
						}
						
						mysqli_close($conexion); 
					} else {
						redirectPHP('index.php');
					}
				?>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	<?php include 'footer.php' ?>
	</div>
</body>