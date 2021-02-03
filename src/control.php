<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" ></script>
	</head>
<body>
	<header class="header">
		<div class="container logo-nav-container">
			<div class="logdiv">
				<img src="../img/logo.png" class="logoimg" width="50" height="50">
				<a href="#" class="logo">Agrocorn</a>
			</div>
			<span class="menu-icon">
				<i class="fas fa-bars"></i>
			</span>
			<nav class="navigation">
				<ul>
					<li><a href="home.php">Registro</a></li>
					<li><a href="control.php">Control</a></li>
					<li><a href="cuidado.php?n=null">Cuidado</a></li>

                    
                    <li><a href="logout.php"><i class="far fa-user"></i>Cerrar sesión</a></li>
				</ul>
			
			</nav>
		</div>
	</header>
	<div >
		<img class="img" src="../img/banner1.jpeg" width="1000" height="400">
	</div>
	<main class="main">

		<div class="container">	
	        <?php
	        
					$convert= $_SESSION['convert'];
					$user= $_SESSION['usuario'];

					echo "<h1>Bienvenido $user.....</h1>";
			?> 

			<form action="" >
				<label>Seleccione un cultivo: </label>
				<select name="cb1"  id="combo" >
					<option value="0">Seleccionar</option>
						<?php

						require('conexion.php');
						
						$consulta="SELECT codigo, nombre, hectareas FROM registro where codigo=$convert";
						$resultado = mysqli_query($conexion,$consulta);
						
						while ($valores = mysqli_fetch_array($resultado)) {
						?>
					<option value="<?php echo $valores['nombre']?>"><?php echo $valores['nombre']?> </option>;
						<?php
					}
						?>
				</select>

				<input style="max-width:300px;  margin-left: 35%; align-items:center " type="button"  value="EMPEZAR" onclick="showForms(cb1.value)" />
						
				
	        </form> 
			<div id="showForm" style="display: none">
					<h1 style="color:green" id="titlec"></h1>


					<form action="" style="max-width: 520px; margin-left:25%">

						<label>Hectáreas de su cultivo: </label>
						<input name="hec" style="width: 120px;margin-left: 100px" type="number" placeholder="Hectáreas">
						
						<label>Distancia horizontal de su espacio de cultivo: </label>
						<input name="h" style="width: 120px;margin-left: 100px" type="number" placeholder="Metros">

						<label>Distancia diagonal de su espacio de cultivo: </label>
						<input name="d" style="width: 120px;margin-left: 100px" type="number" placeholder="Metros">

						<input value="CALCULAR" type="button" onclick="calculate(h.value, d.value, hec.value)" >			
					
					</form>
					
					<div id = "resultados" style= "display: none; width:600px; box-shadow: 0px 0px 5px 5px rgba(0, 0, 0, 0.2); padding: 20px; margin-bottom:30px; margin-left:20%"> 	
						<h1 style="color: green">RESULTADOS</h1>
						<form  class="form">
							<label>Nombre de su cultivo:</label> <input name="nam" id="name" type="text" >
							<label>Hectareas de su cultivo:</label> <input  name="ha" id="hectareas" type="text" >
							<label>Distancia horizontal de un espacio: </label><input  name="dh" id="horizontal" type="text" >
							<label>Distancia diagonal de un espacio: </label><input  name="dd" id="diagonal" type="text" >
							<label>Trancas para el cultivo:</label> <input  name="tr" id="trancas" type="text" >
							<label>Plantas esperadas:</label> <input  name="pl" id="plantas" type="text" >
							<label>Quintales de cosecha:</label> <input  name="qt" id="quintales" type="text" >
							<label>Subtotal esperado:</label> <input name="gn" id="ganancia" type="text" >
							<input type="button" value="GUARDAR ESTOS DATOS" onclick="sub(nam.value, ha.value, dh.value, dd.value, tr.value, pl.value, qt.value, gn.value)">
							
						</form>
					</div>

	</main>

	<footer class="footer-exterior">
		<div class="container-footer">
			<div class="footer">
				<p>Agrocorn@2021</p>
			</div>
			<div class="footer">
	            <div class="sociales">
	            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
	            <a href="#" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
	            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
	            </div>
        	</div>
		</div>
	</footer>

	<script src="../scripts/scripts.js"></script>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>