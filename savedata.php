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
    <?php
        require('conexion.php');

        $na = $_GET['name'];
        $maquina = $_GET['ma'];
        $abono = $_GET['ab'];
        $pesti = $_GET['pe'];
        $semi = $_GET['se'];
        $inversiont = $_GET['invt'];
        $tot = $_GET['tot'];
        $eff = $_GET['eff'];
        $per = $_GET['per'];

        $consulta= 'UPDATE registro	SET inversion_Maquinaria ='.$maquina.', inversion_abono='.$abono.', inversion_pesticida='.$pesti.', inversion_semillas='.$semi.', inversion_total='.$inversiont.', ganancia_estimada='.$tot.', ganancia_asegurada='.$eff.', perdida_estimada='.$per.'	WHERE nombre="'.$na .'";';
        $resultado = mysqli_query($conexion,$consulta);
        mysqli_close($conexion);        
    ?>
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
	

    <div id="res" style="margin:100px;width:700px; border-color: green; border-style: solid; margin-left: 33%; border-radius:20px">
        <h1 style="color:green">RESULTADOS</h1>
        <h3 id="Nom"></h3>
        <h3 id="Fech"></h3>
        <h3 id="Hec"></h3>
        <h3 id="DH"></h3>
        <h3 id="DD"></h3>
        <h3 id="Tr"></h3>
        <h3 id="Pl"></h3>
        <h3 id="Qt"></h3>
        <h3 id="Subtot"></h3>
        <h3 id="tinv"></h3>
        <h3 id="tot"></h3>
        <h3 id="eff"></h3>
        <p>95% del total generado</p>
        <h3 id="perd"></h3>
        <p>5% del total generado</p>

        <div style="margin-top:30px; background-color: green; color: white; padding: 50px; cursor: default; border-radius:15px">LOS DATOS SE GUARDARON AUTOMATICAMENTE</div>
    </div>
    <div onclick="javascript:window.imprimirDIV('res');"  style="background-color:lightgreen; padding:20px; width:600px; margin-left: 35%; margin-top:-50px; margin-bottom:50px; cursor:pointer; border-radius:15px; color:white">IMPRIMIR</div>




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
        function imprimirDIV(contenido) {
            var ficha = document.getElementById(contenido);
            var ventanaImpresion = window.open(' ', 'popUp');
            ventanaImpresion.document.write(ficha.innerHTML);
            ventanaImpresion.document.close();
            ventanaImpresion.print();
            ventanaImpresion.close();
        }
    
        <?php
            require('conexion.php');
            $nom = $_GET['name'];
                            
            $consulta="SELECT nombre, fecha, hectareas, D_horizontal, D_diagonal, trancas, plantas, quintales, subtotal, inversion_total, ganancia_estimada, ganancia_asegurada, perdida_estimada FROM registro where nombre='".$nom."';";
            $resultado = mysqli_query($conexion,$consulta);
            $valores = mysqli_fetch_array($resultado);

            $nombre=$valores['nombre'];
            $fecha = $valores['fecha'];     
            $hect=$valores['hectareas'];
            $dh=$valores['D_horizontal']; 
            $dd=$valores['D_diagonal']; 
            $trancas=$valores['trancas'];
            $pl=$valores['plantas'];
            $qui = $valores['quintales'];     
            $subt=$valores['subtotal'];
            $intot=$valores['inversion_total']; 
            $gesti=$valores['ganancia_estimada']; 
            $gaseg=$valores['ganancia_asegurada'];
            $pestimada=$valores['perdida_estimada'];

            echo "
            document.getElementById('Nom').innerHTML = 'Nombre del cultivo: '+'$nombre';
            document.getElementById('Fech').innerHTML = 'Fecha de inicio: '+'$fecha';
            document.getElementById('Hec').innerHTML = 'Hectareas: '+'$hect'+' Ha.';
            document.getElementById('DH').innerHTML = 'Distancia horizontal de un espacio: '+'$dh'+'m.';
            document.getElementById('DD').innerHTML = 'Distancia diagonal de un espacio: '+'$dd'+'m.';
            document.getElementById('Tr').innerHTML = 'Trancas: '+'$trancas';
            document.getElementById('Pl').innerHTML = 'Plantas: '+'$pl';
            document.getElementById('Qt').innerHTML = 'Quintales: '+'$qui';
            document.getElementById('Subtot').innerHTML = 'Subtotal: $'+'$subt';
            document.getElementById('tinv').innerHTML = 'Total de inversiones: $'+'$intot';
            document.getElementById('tot').innerHTML = 'Total estimado: $'+'$gesti';
            document.getElementById('eff').innerHTML = 'Efectividad de cosecha: $'+'$gaseg';
            document.getElementById('perd').innerHTML = 'Perdida de cosecha: $'+'$pestimada';
            ";
        ?>

    </script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="scripts.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>







<!--

-->
