<?php
 require 'database.php';
 require 'functionsphp.php';
 session_start();
 canAccess($_SESSION['loggedin'], 'reg_new.php', $_SESSION['rol']);
 // Receive the parameters by POST method
 $form_pass = $_POST['password'];
 $usrname = $_POST['username'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $sql = "SELECT * FROM cu_usr AS U WHERE U.name = '$_POST[username]' ";

 echo "<br>".$sql."<br>";
 $result = $conexion->query($sql);

 $count = $result->num_rows;
 
echo "<br>".$count."<br>";
 // validate if the current user-name is not assigned in the past tho other user.
if ($count == 1) {
	echo "<br>El Nombre de Usuario ya esta asignado a alguien mas.<br>";
	echo "<a href='index.php'>Por favor escoja otro Nombre</a>";
}
else{
$getId = "SELECT id_usr FROM CU_USR ORDER BY id_usr DESC LIMIT 1;";
$result = $conexion->query($getId);
$row = $result->fetch_array(MYSQLI_NUM);
$count = $row[0]+1;
	$query = "INSERT INTO `etla_com`.`CU_USR` (`id_usr`, `des_usr_id`, `name`, `pswd`, `b_web`, `b_del`, `b_sys`, `fk_usr_tp`, `fk_web_role`, `fk_usr_ins`, `fk_usr_upd`, `ts_usr_ins`, `ts_usr_upd`) VALUES ('$count', '0', '$usrname', '$hash', '1', '0', '0', '1', '21', ".$_SESSION['user_id'].", ".$_SESSION['user_id'].", now(), now());";
echo $query;
	if ($conexion->query($query) === TRUE) {
		 echo "<br>" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
		 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
		 echo "<h5>" . "Hacer Login: " . "<a href='index.php'>Login</a>" . "</h5>"; 
	}
	else {
		echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
	}
}
 mysqli_close($conexion);
?>