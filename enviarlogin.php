<?php
include('conexion.php');


session_start();


$usuario= test_input($_POST['usuario']);
$password= test_input($_POST['password']);
$_SESSION['usuario']=$usuario;
$contrasena= md5($password);



	$consulta= "SELECT * FROM login where usuariof='$usuario' and password='$contrasena'";
	$resultado= mysqli_query($conexion, $consulta);

	$filas=mysqli_num_rows($resultado);
	if($filas){
		$codigo= "SELECT codigo from login where usuariof='$usuario' and password='$contrasena'";
		$codigoresult=mysqli_query($conexion, $codigo);
		mysqli_data_seek($codigoresult, 0);
		$extraido = mysqli_fetch_array($codigoresult);
		$convert = $extraido['codigo'];
		$_SESSION['convert']=$convert;

		
		require('home.php');
		header("location:home.php");


	}
	else{
		
		include("login.html");
		$consulta1= "SELECT * FROM login where usuariof='$usuario'";
		$resultado1= mysqli_query($conexion, $consulta1);
		$filas1=mysqli_num_rows($resultado1);
		if($filas1){
			?>
			<script>
				document.getElementById("mensaje").innerHTML="Usuario existente, contraseña incorrecta.</p>";
			</script> 
			<?php
		}
		else{
			?>
			<script>
				document.getElementById("mensaje").innerHTML="Usuario no existente.</p>";
			</script> 
			<?php
		}

	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);


	function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;

	}


?>