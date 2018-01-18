<?php
$host_db = "192.168.1.107";
// $host_db = "10.83.32.129:3306";
// $host_db = "localhost";
$user_db = "root";
$pass_db = "msroot";
$db_name = "etla_com";
$tbl_name = "cu_usr";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
$conexion->set_charset("utf8");
if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}
?>