<?php
$servername = "localhost";
$username = "root";
$password = "";
$database="agrocorn";


$conexion= mysqli_connect($servername, $username, $password,$database);

if (!$conexion){
	die("Conexion fallida: ".mysqli_connect_error());
}
//echo"Conexion completada";
//mysqli_close($conexion);
?>