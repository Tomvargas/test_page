<!DOCTYPE html>
<html lang="es">
<head>
	<title> Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="container logo-nav-container">
			<div class="logdiv">
				<img src="img/logo.png" class="logoimg" width="50" height="50">
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
	<div class="" align="center">
		<img class="img" src="img/banner1.jpeg" width="900" height="400" style="margin-top: -50px;">
	</div>
	<main class="main">

		<div style="margin-top: -90px;" class="container">	

			<?php
                if (session_status() !== PHP_SESSION_ACTIVE){
                    session_start();
                }
                $usuario = $_SESSION['usuario'];  
                $convert= $_SESSION['convert'];
                echo "<h1>$usuario, seleccione un cultivo que ya haya registrado el subtotal</h1>";
            ?>

            <div>
                <form action="" >
				
				<select style="padding: 10px;" name="cb1"  id="combo" >
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
                            mysqli_close($conexion);				
                        ?>
				</select>

				<input style="max-width:300px;  margin-left: 35%; align-items:center " type="button"  value="EMPEZAR" onclick="showForms(cb1.value)" />
						
				
	        </form> 
            </div>
			
		</div>

        <div id="showForm" style="display: none">
            <h1 style="color:green" id="titlec"></h1>
            <h3>insertar datos de inversión</h3>

            <form action="" style=" margin-left:30px; ">

                <label style="float: left">Inversión en maquinaria: </label>
                <input name="maq" style="width: 120px" type="number" placeholder="$">
                
                <label style="float: left">Inversión en abono: </label>
                <input name="ab" style="width: 120px" type="number" placeholder="$">

                <label style="float: left">Inversion en pesticidas: </label>
                <input name="pe" style="width: 120px" type="number" placeholder="$">

                <label style="float: left;margin-right: 10px">Inversion en semillas: </label>
                <input name="se" style="width: 120px" type="number" placeholder="$">

                <input value="CALCULAR EFECTIVIDAD" type="button" onclick="calculate(maq.value, ab.value, pe.value, se.value)" >			
            
            </form>

                <div id="res" style="display: none; width:700px; border-color: green; border-style: solid; margin-left: 20%; border-radius:20px">
                    <h1>RESULTADOS</h1>
                    <h3 id="tinv">Total de inversiones: $200</h3>
                    <h3 id="tot">Total a generar: $850</h3>
                    <h3 id="eff">Efectividad de cosecha: $807</h3>
                    <p>95% del total generado</p>
                    <h3 id="perd">Perdida de cosecha: $42.50</h3>
                    <p>5% del total generado</p>
                </div>

		</div>

        <div>
        <hr/>
            <h1>CALENDARIO PARA CULTIVO</h1>
            <form >
                <h4>SELECCIONAR UNA FECHA</h4>
                <select style="padding: 10px;" name="cb2"  id="combo2" >
                    <option value="0">Seleccionar</option>
                        <?php

                            require('conexion.php');    
                            
                            $consulta="SELECT codigo, fecha FROM registro where codigo=$convert";
                            $resultado = mysqli_query($conexion,$consulta);
                            
                            
                            while ($valores = mysqli_fetch_array($resultado)) {
                        ?>
                    <option value="<?php echo $valores['fecha']?>"><?php echo $valores['fecha']?> </option>;
                        <?php
                            }					
                        ?>
                </select>

                <input style="align-items:center " type="button"  value="IMPRIMIR DATOS"  />
                        
                    
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


    <script>

        function calculate(maq, abo, pes, sem){

            var maquina = parseFloat(maq)
            var abono = parseFloat(abo)
            var pesticida = parseFloat(pes)
            var semilla = parseFloat(sem)

            document.getElementById('res').style.display="block";

        }

        function showForms(value){							
            console.log(value);
            if(value === "0"){
                alert("Debe seleccionar un cultivo para empezar.")
            }else{

                setTitle(value);
                document.getElementById('showForm').style.display='block';
            }						
        }

        function setTitle(value){
            
            var v= "-- "+value+" --"
            document.getElementById('titlec').innerHTML = v;
        }

	</script>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="scripts.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>