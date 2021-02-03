<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title> Inicio</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="tab.css">
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
	<div align="center">
		<img class="img" src="img/banner1.jpeg" width="900" height="400" style="margin-top: -50px;">
	</div>
	<main class="main">

		<div style="margin-top: -90px;" class="container">	

			<?php
                
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
                            
                            $consulta="SELECT codigo, nombre FROM registro where codigo=$convert";
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
        <div id="pos"></div>

        <div id="showForm" style="display: none; margin-top: 50px">
            <h1 style="color:green; margin-top:100px" id="titlec"></h1>
            <h3 style="margin-top:50px">insertar datos de inversión</h3>

            <form action="" style=" margin-left:30%; ">

                <label style="float: left">Inversión en maquinaria: </label>
                <input name="maq" style="width: 120px" type="number" placeholder="$">
                
                <label style="float: left">Inversión en abono: </label>
                <input name="ab" style="width: 120px" type="number" placeholder="$">

                <label style="float: left">Inversion en pesticidas: </label>
                <input name="pe" style="width: 120px" type="number" placeholder="$">

                <label style="float: left;margin-right: 10px">Inversion en semillas: </label>
                <input name="se" style="width: 120px" type="number" placeholder="$">

                <input style="width: 850px" value="GUARDAR Y MOSTAR LOS RESULTADOS" type="button" onclick="calculate(maq.value, ab.value, pe.value, se.value)" >			
            
            </form>

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
                            mysqli_close($conexion);				
                        ?>
                </select>

                <input style="align-items:center " type="button"  value="MOSTRAR DATOS" onclick="set_table(cb2.value)" />
                        
                    
            </form> 

            <div id="tabli" class="tablita">
                <h2 id="fech_cult"></h2>
                <table class="tablita">
                    <tr>
                        <th>Fechas de abono</th>
                        <th>Abono a utilizar</th>
                        <th>Fecha de fumigación</th>
                        <th>Pestizida a utilizar</th>
                        <th>Fecha de cosecha</th>
                    </tr>
                    <tr>
                        <th id="fech1_fech"></th>
                        <th id="fech1_abono"></th>
                        <th id="fech1_fumi"></th>
                        <th id="fech1_pes"></th>
                        <th id="fech1_cos"></th>
                    </tr>
                    <tr>
                        <th id="fech2_fech"></th>
                        <th id="fech2_abono"></th>
                        <th id="fech2_fumi"></th>
                        <th id="fech2_pes"></th>
                        <th id="fech2_cos"></th>
                    </tr>
                    <tr>
                        <th id="fech3_fech"></th>
                        <th id="fech3_abono"></th>
                        <th id="fech3_fumi"></th>
                        <th id="fech3_pes"></th>
                        <th id="fech3_cos"></th>
                    </tr>
                </table>
            </div>
            <div onclick="javascript:window.imprimirDIV('tabli');"  style="background-color:lightgreen; padding:20px; width:600px; margin-left: 35%; margin-bottom:50px; cursor:pointer; border-radius:15px; color:white">IMPRIMIR</div>


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

    <?php 
        require('conexion.php');

        $nam = $_GET['n'];
        
        if ($nam != 'null'){
            $consulta="SELECT subtotal FROM registro where nombre='".$nam."';";
            $resultado = mysqli_query($conexion,$consulta);
            $valores = mysqli_fetch_array($resultado);
            echo "<script>if('".$valores['subtotal']."' === ''){
                alert('Usted no ha registrado el calculo en control, Por favor, Calcule y Guarde los datos en la página control');
            }else{
                
                if('$nam' !== 'null'){
                    setTitle('$nam')
                    document.getElementById('showForm').style.display='block';
                }
        
                function setTitle(value){
                    
                    var v= '-- '+value+' --'
                    document.getElementById('titlec').innerHTML = v;
                }    

            }
            
            </script>";
            mysqli_close($conexion);
        }
    ?>

    <script>

        function imprimirDIV(contenido) {
            var ficha = document.getElementById(contenido);
            var ventanaImpresion = window.open(' ', 'popUp');
            ventanaImpresion.document.write(ficha.innerHTML);
            ventanaImpresion.document.close();
            ventanaImpresion.print();
            ventanaImpresion.close();
        }

        function set_table(Dat){
            if (Dat === "0"){
                alert('Debe seleccionar una fecha')
            }else{
                var fecha = new Date(Dat);
            var dias = 3; // Número de días a agregar + 1
            var diasn = -3;
            var f1 = fecha;
            fecha.setDate(fecha.getDate() + dias);
            
            console.log(fecha)//---------------------------imprime la fecha despues de 3 dias
            document.getElementById('fech1_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(3 días luego del inicio del cultivo)";
            fecha.setDate(fecha.getDate() + diasn);

            dias = 13; // Número de días a agregar + 1
            diasn = -13
            fecha.setDate(fecha.getDate() + dias);
            document.getElementById('fech2_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(13 días luego del inicio del cultivo)";
            console.log(fecha)//---------------------------imprime la fecha despues de 13 dias
            fecha.setDate(fecha.getDate() + diasn);

            dias = 30; // Número de días a agregar + 1
            diasn = -30
            fecha.setDate(fecha.getDate() + dias);
            document.getElementById('fech3_fech').innerHTML = fecha.toISOString().slice(0,10)+"<br>(30 días luego del inicio del cultivo)";
            console.log(fecha)//---------------------------imprime la fecha despues de 30 dias
            fecha.setDate(fecha.getDate() + diasn);


            document.getElementById('fech1_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
            document.getElementById('fech1_fumi').innerHTML = "fumigación en contra de semillas no deseadas";

            document.getElementById('fech2_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
            document.getElementById('fech2_fumi').innerHTML = "fumigación en contra de insectos no deseados";

            document.getElementById('fech3_abono').innerHTML = "2 a 3 bolsas de 50Kg de Urea por cada hectarea";
            document.getElementById('fech3_fumi').innerHTML = "fumigación en contra de insectos o plagas no deseadas";
            
            dias = 60; // Número de días a agregar + 1
            diasn = -60
            fecha.setDate(fecha.getDate() + dias);
            document.getElementById('fech3_cos').innerHTML = fecha.toISOString().slice(0,10)+"<br>(60 días luego del inicio del cultivo ya puede cosechar)";
            console.log(fecha)//---------------------------imprime la fecha despues de 30 dias
            fecha.setDate(fecha.getDate() + diasn);
            }
            
            
        }

        
    </script>
    <?php
        require('conexion.php');
        $nam = $_GET['n'];

        $consulta="SELECT subtotal FROM registro where nombre='".$nam."';";
        $resultado = mysqli_query($conexion,$consulta);
        $valores = mysqli_fetch_array($resultado);

        echo "<script>
        function calculate(maq, abo, pes, sem){

            var maquina = parseFloat(maq)
            var abono = parseFloat(abo)
            var pesticida = parseFloat(pes)
            var semilla = parseFloat(sem)

            if(maq==='' || abo==='' || pes==='' || sem===''){
                alert('Debe ingresar todos los datos de inversión')
            }else{
                var subtot = parseFloat('".$valores['subtotal']."');

            var InTot = maquina+abono+pesticida+semilla;
            var tot = subtot-InTot;
            var eff = (tot*95)/100;
            var per = (tot*5)/100;

            console.log(InTot);
            console.log(tot);
            console.log(eff);
            console.log(per);            
            
            
            setTimeout(gosavedb(maq, abo, pes, sem, InTot, tot, eff, per), 4000);
            }

        }

        function showForms(value){							
            console.log(value);
            if(value === '0'){
                alert('Debe seleccionar un cultivo para empezar.')
            }else{
                document.location='cuidado.php?n='+value+'#pos';
            }						
        }
        function gosavedb(maq, abo, pes, sem, InTot, tot, eff, per){
            var op = confirm('¿Está seguro de guardar los datos? Será redireccionado a la página de sus resultados al aceptar.');

            if (op == true){
                var name = getParameterByName('n');
                console.log(name);
                var ur = 'savedata.php?ma='+maq+'&ab='+abo+'&pe='+pes+'&se='+sem+'&invt='+InTot+'&tot='+tot+'&eff='+eff+'&per='+per+'&name='+name;
                document.location=ur;
            }
        }

        function getParameterByName(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)'),
            results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        </script>";
        
    ?>


	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="scripts.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>