
<?php
include('conexion.php');


session_start();


$fecha= test_input($_POST['fecha']);
$nombre= test_input($_POST['nombre']);
//$_SESSION['convert']= $convert;

//$_SESSION['usuario']=$usuario;
	$convert=$_SESSION['convert'];

	$consulta= "SELECT * FROM registro where nombre='$nombre' and codigo='$convert'";
	$resultado= mysqli_query($conexion, $consulta);

	$filas=mysqli_num_rows($resultado);
	if($filas){

		echo "Registro existente";
		require('home.php');
		header("location: home.php");

	}
	else{
		//session_start();
		$convert=$_SESSION['convert'];
		$sql1= "INSERT INTO registro (codigo,nombre, fecha) VALUES ('$convert', '$nombre','$fecha')";
		if(mysqli_query($conexion, $sql1)){
			
		require('home.php');

		echo "<SCRIPT >
document.location=('control.php');
alert('Registro guardado exitosamente');

</SCRIPT>";
						
			//header("location: control.php");

			
		}
		else{
			//echo "Error: ". $sql . "" . mysqli_error($conexion);
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