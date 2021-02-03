<?php
$servername = "localhost";
$username = "id16004948_admin";
$password = "Agrocornuae123*";
$database="id16004948_agrocorn";

$conexion= mysqli_connect($servername, $username, $password,$database);

	if (!$conexion){
		die("Conexion fallida: ".mysqli_connect_error());
	}

?>