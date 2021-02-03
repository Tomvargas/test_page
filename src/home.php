<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../styles/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Poppins:wght@300&display=swap" rel="stylesheet">
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
	<div class="">
		<img class="img" src="../img/banner1.jpeg" width="1000" height="500">
	</div>
	<main class="main">

		<div class="container">	

			<?php
			
			$usuario = $_SESSION['usuario'];  
			$convert= $_SESSION['convert'];


			echo "<h1>Bienvenido, $usuario.....</h1>";
			echo "<h3>Registre un cultivo</h3>"
			?>

			<form action="enviarregistro.php" method="post" class="form">
				<label>Fecha de su cultivo</label>
				<input type="date" name="fecha" id="fecha">
				<label>Nombre de su cultivo</label>
				<input type="text" name="nombre" id="nombre">
				<input type="submit" name="registrar" value="Registrar">

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


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="../scripts/scripts.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>