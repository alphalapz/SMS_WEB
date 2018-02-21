
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
						$sql = "SELECT 
								USR.pswd AS pswd,
								USR.id_usr AS id_usr,
								USR.fk_web_role AS fk_web_role,
								USR.name AS name,
								USR.b_del AS b_del
							FROM CU_USR AS USR
							WHERE USR.name = '$user' 
								AND NOT USR.b_del 
								AND USR.b_web";

						$result = $conexion->query($sql);
						$row = $result->fetch_array(MYSQLI_ASSOC);

						 if ((strlen($row['pswd'])== 0) && $result->num_rows > 0){
							$_SESSION['loggedin'] = true;			
							$_SESSION['username'] = $user;
							$_SESSION['user_id'] = $row['id_usr'];
							$_SESSION['rol'] = $row['fk_web_role'];
							$_SESSION['name'] = $row ['name2'];
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
							
							switch ($_SESSION['rol']) {
								case ROL_ADMIN:
									$_SESSION['name'] = "Administrador: " . $user;
									break;
								case ROL_CREDIT:
									$_SESSION['name'] = "Crédito y cobranza: " . $user;
								break;
								case ROL_TRANS:
									$sql = "
									SELECT 
										USR.pswd AS pswd,
										USR.id_usr AS id_usr,
										USR.fk_web_role AS fk_web_role,
										USR.name AS name,
										SHP.name AS name2,
										USR.b_del AS b_del
									FROM CU_USR AS USR
									INNER JOIN SU_SHIPPER AS SHP ON USR.id_usr = SHP.fk_usr
									WHERE USR.name = '$user' 
										AND NOT USR.b_del 
										AND USR.b_web";

									$result = $conexion->query($sql);
									$row = $result->fetch_array(MYSQLI_ASSOC);
									$_SESSION['name'] = "Transportista: " . $row ['name2'];
								break;
								default:
									echo "NO PUEDES PASAR";
									exit();
									break;
							}
							checkRol($_SESSION['rol']);

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