<?php
 include 'database.php';
 session_start();
 canAccess($_SESSION['loggedin'], 'reg_new.php', $_SESSION['rol']);
 $form_pass = $_POST['password'];
 
 $hash = password_hash($form_pass, PASSWORD_BCRYPT); 

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE user = '$_POST[username]' ";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br>El Nombre de Usuario ya esta asignado a alguien mas.<br>";

 echo "<a href='index.php'>Por favor escoja otro Nombre</a>";
 }
 else{

 $query = "INSERT INTO login (user, password, rol ,email)
           VALUES ('$_POST[username]', '$hash', ' $_POST[rol]',' $_POST[mail]')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='index.php'>Login</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>