<?php
require('conexion.php');
	$usuario= test_input($_POST['txtusuario']);
	$password= test_input($_POST['txtpassword']);
	$nombre= test_input($_POST['txtnom']);
	$apellido= test_input($_POST['txtapellido']);
	$email= test_input($_POST['txtema']);
	$telefono= test_input($_POST['txttel']);
	$direccion= test_input($_POST['txtdir']);
	$cedula= test_input($_POST['txtcedula']);
	$consulta = "SELECT * FROM login where usuariof= '$usuario'";
	$result = mysqli_query($conexion, $consulta);
	$filas = mysqli_num_rows($result);
	if($filas){
		?>
		<?php
		include('usuario.php');
		echo "<p><b>Ya existe este usuario</b></p>";
		echo "<br>";
		?>
		<?php
	}
	else{
		$sql= "INSERT INTO usuarios (usuario ,nombre, apellido,cedula,direccion,email,telefono) VALUES ('$usuario','$nombre','$apellido','$cedula','$direccion','$email','$telefono')";
		if(mysqli_query($conexion, $sql)){
			echo "<br>";
			echo "Registro insertado";
			if(mysqli_query($conexion, $sql)){
			}
		}
		else{
			//echo "Error: ". $sql . "" . mysqli_error($conexion);
		}
		$contrasena = md5($password);
		$sql1= "INSERT INTO login(usuariof,password) VALUES('$usuario','$contrasena')";
		if(mysqli_query($conexion, $sql1)){
			if(mysqli_query($conexion, $sql1)){
			}
		}
		else{
			echo "Error: ". $sql1 . "" . mysqli_error($conexion);
		}
		



		$query="SELECT * FROM usuarios";
		$resultado=mysqli_query($conexion, $query) or die("Error en la query: ".mysqli_error(
			$conexion));
		$numregistros=mysqli_num_rows($resultado);
		echo "<p>El numerode registros de clientes es: ",$numregistros,".</p>";
		echo "<table border=2><tr><th>Usuario</th> <th>Nombre</th> <th>Apellido</th> <th>Teléfono</th> <th>Direccion</th> <th>Email</th> <th>Cedula</th> ";
		while ($registro=mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
			echo "<tr>";
			foreach ($registro as $campo) {
				echo "<td>", $campo, "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";

		?>
		<form action="#" method="post" class="form">
			<input type="submit" name="reporte" value="Generar reporte">
		</form>
		<?php

		mysqli_free_result($resultado);
	}
	mysqli_close($conexion);

?>