<!DOCTYPE html>
<html>
<head>
	<title>Registrar nuevo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Poppins:wght@300&display=swap" rel="stylesheet">
	<style>
		.formulario{
			display: grid;
			grid-template-columns: 1fr 1fr;
			gap: 20px;
		}

		.formulario_btn_enviar{
			grid-column: span 2;
		}

		.error p{
			font-size: 7
			background: #E1E0E1;
			margin-bottom: 0;
		}
		.content{
			font-size: 7
			background: #E1E0E1;
		}
	
	</style>
	<script>

		function validacion(id){
			var elem = document.getElementById(id);
			if(elem.checkValidity())
				elem.style.borderColor= "green";
			else
				elem.style.borderColor="red";
		}
		function enviado()
		{
			var usuarioValido= document.getElementById('txtusuario').checkValidity();
			var cedulaValido= document.getElementById('txtcedula').checkValidity();
			var passwordValido= document.getElementById('txtpassword').checkValidity();
			var password2Valido= document.getElementById('txtpassword2').checkValidity();
			var nombreValido= document.getElementById('txtnom').checkValidity();
			var direccionValido= document.getElementById('txtdir').checkValidity();
			var emailValido= document.getElementById('txtema').checkValidity();
			var telefonoValido= document.getElementById('txttel').checkValidity();

			if(usuarioValido && cedulaValido && passwordValido && password2Valido && nombreValido && direccionValido && emailValido && telefonoValido){
				document.getElementById("demo").innerHTML ="Información ingresada";
			}
			else
				document.getElementById("demo").innerHTML ="Complete los campos correctamente....."

		}


	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
	    setTimeout(function() {
	        $(".content").fadeOut(1500);
	    },10000);
	 
	    setTimeout(function() {
	        $(".content2").fadeIn(1500);
	    },6000);
	});
	</script>

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
					<li><a href="index.html">Inicio</a></li>
					<li><a href="#">Registro</a></li>
					<li><a href="#">Control</a></li>
					<li><a href="#">Cuidado</a></li>

                    
                    <li><a href="login.html"><i class="far fa-user"></i>Iniciar sesión</a></li>
				</ul>
			
			</nav>
		</div>
	</header>
	
	<main class="main">
		<div class="container">

			<h2>Formulario Clientes</h2>
			<div class="form-usuario">
				<form method="post" action="enviarusuario.php" class="formulario">
					<div class="formulario_btn_enviar">
					<p id="demo"></p>
					<p id="nom"></p>
					<p id="ape"></p>
					<p id="dir"></p>
					<p id="pass"></p>
					<p id="p"></p>
					</div>
					
					<div>
						<label>Usuario:*</label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener letras, números y guiones</div>
						<input type="text" name="txtusuario" id="txtusuario" value="<?php if(isset($_POST["txtusuario"])){ echo $_POST["txtusuario"];} ?>" oninput="validacion('txtusuario')" pattern="(^[a-zA-Z0-9_-]{3,10}$)" required="required" maxlength="10" placeholder="Ingrese su Usuario">
						
					</div>
					<div>
						<label>Cedula:* <br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener 10 digitos</div>
						<input type="text" name="txtcedula" id="txtcedula" value="<?php if(isset($_POST["txtcedula"])){ echo $_POST["txtcedula"];} ?>" oninput="validacion('txtcedula')" pattern="(^[0-9]{10}$)" maxlength="10" required="required" placeholder="Ingrese su cedula" ></br>
					</div>
					<div>
						<label>Contraseña:* <br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener letras, números y guiones</div>
						<input type="password" name="txtpassword" id="txtpassword" value="<?php if(isset($_POST["txtpassword"])){ echo $_POST["txtpassword"];} ?>" oninput="validacion('txtpassword')" pattern="(^[a-zA-Z0-9_-]{3,30}$)"  maxlength="30"  required="required" placeholder="Ingrese su contraseña" ></br>
					</div>
					<div>
						<label>Confirmar Contraseña:* <br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener letras, números y guiones</div>
						<input type="password" name="txtpassword2" id="txtpassword2" value="<?php if(isset($_POST["txtpassword2"])){ echo $_POST["txtpassword2"];} ?>" oninput="validacion('txtpassword2')" pattern="(^[a-zA-Z0-9_-]{3,30}$)"  maxlength="30" required="required" placeholder="Confirme su contraseña" ></br>
					</div>
					
					<div>
						<label>Nombre:*<br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener solo letras</div>
						<input type="text" name="txtnom" id="txtnom" value="<?php if(isset($_POST["txtnom"])){ echo $_POST["txtnom"];} ?>" oninput="validacion('txtnom')" pattern="(^[a-zA-Z\s]{3,40})" maxlength="30" required="required" placeholder="Ingrese su nombre" >
						</br>
					</div>
					<div>
						<label>Apellido:*<br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener solo letras</div>
						<input type="text" name="txtapellido" id="txtapellido" value="<?php if(isset($_POST["txtapellido"])){ echo $_POST["txtapellido"];} ?>" oninput="validacion('txtapellido')" pattern="(^[a-zA-Z\á\s]{3,40})" maxlength="30" required="required" placeholder="Ingrese su nombre" >
						</br>
					</div>

					<div>
						<label>Dirección:<br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener letras y números</div>
						<input type="text" name="txtdir" id="txtdir" value="<?php if(isset($_POST["txtdir"])){ echo $_POST["txtdir"];} ?>" oninput="validacion('txtdir')" pattern="(^[a-zA-Z0-9\.\s]{3,40}$)" maxlength="50" placeholder="Ingrese su direccion" ></br>
					</div>
					<div>
						<label>E-mail:<br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener letras, números, guiones y puntos</div>
						<input type="text" name="txtema" id="txtema" value="<?php if(isset($_POST["txtema"])){ echo $_POST["txtema"];} ?>" oninput="validacion('txtema')" pattern="(^[a-zA-Z0-9\.\@\-\_\s]{3,40}$)"  maxlength="30" placeholder="correo@correo.com" ></br>
					</div>
					<div class="formulario_btn_enviar">
						<label>Teléfono:<br></label>
						<div class="content" style="color: #8E8E8E; font-size: 12px;">Debe contener solo números</div>
						<input type="text" name="txttel" id="txttel" value="<?php if(isset($_POST["txttel"])){ echo $_POST["txttel"];} ?>" oninput="validacion('txttel')" pattern="(^[0-9\+]{5,15}$)" maxlength="15" placeholder="Ingrese su telefono" ></br>
					</div>
					<div class="formulario_btn_enviar">
						<input type="submit" name="enviar" value="Enviar" onclick="enviado()" />
						
						</br>
					</div>
				</form>
			</div>
			
		</div>
	</main>
	<div>
			<?php 
			if(isset($_POST['txtusuario'], $_POST['txtpassword'])){

				$txtusuario= test_input($_POST['txtusuario']);
				$txtpassword= test_input($_POST['txtpassword']);
				$txtpassword2= test_input($_POST['txtpassword2']);
				$txtcedula= test_input($_POST['txtcedula']);
				$txttel= test_input($_POST['txttel']);
				$txtnom= test_input($_POST['txtnom']);
				$txtapellido= test_input($_POST['txtapellido']);
				$txtema= test_input($_POST['txtema']);
				$txtdir= test_input($_POST['txtdir']);
				$txtcedula= test_input($_POST['txtcedula']);

				$campos= array();

				if(empty($txtnom)){
					?>
					<script>
						document.getElementById("nom").innerHTML="El campo nombre no puede estar vacío.</p>";
					</script> 
					<?php
					}
				if(empty($txtapellido)){
					?>
					<script>
						document.getElementById("ape").innerHTML="El campo apellido no puede estar vacío.</p>";
					</script> 
					<?php
					}
				if(empty($txtdir)){
					?>
					<script>
						document.getElementById("dir").innerHTML="El campo dirección no puede estar vacío.</p>";
					</script> 
					<?php
					}
				elseif(strlen($txtdir)<3){
					?>
					<script>
						document.getElementById("dir").innerHTML="La dir debe tener más de 3 caracteres.</p>";
					</script> 
					<?php
					echo "<p id='resultado'>La dir debe tener más de 3 caracteres.</p>";
				}
				
				if($txtpassword==$txtpassword2){
					?>
					<script>
						document.getElementById("pass").innerHTML="Las contraseñas coinciden correctamente.</p>";
					</script> 
					<?php
				}
				else{
					?>
					<script>
						document.getElementById("pass").innerHTML="Las contraseñas NO coinciden.</p>";
					</script> 
					<?php
				}

				$strcedula= $txtcedula;

				if(is_null($strcedula) || empty($strcedula) || $strcedula=='2222222222'){
					?>
					<script>
						document.getElementById("p").innerHTML="Por favor ingrese la cedula correctamente.";
					</script> 
					<?php

				}else{
					if(is_numeric($strcedula)){
						$total_caracteres= strlen($strcedula);
						if($total_caracteres==10){
							$num_region= substr($strcedula, 0,2);
							if($num_region>=1 && $num_region<=24){
								$ult_digito= substr($strcedula, -1,1);
								$valor2= substr($strcedula, 1, 1);
								$valor4= substr($strcedula, 3, 1);
								$valor6= substr($strcedula, 5, 1);
								$valor8= substr($strcedula, 7, 1);
								$suma_pares= ($valor2+$valor4+$valor6+$valor8);
								$valor1= substr($strcedula, 0, 1);
								$valor1= ($valor1*2);
								if($valor1>9){
									$valor1=($valor1-9);
								}else{}
								$valor3= substr($strcedula, 2, 1);
								$valor3= ($valor3*2);
								if($valor3>9){
									$valor3=($valor3-9);
								}else{}
								$valor5= substr($strcedula, 4, 1);
								$valor5= ($valor5*2);
								if($valor5>9){
									$valor5=($valor5-9);
								}else{}
								$valor7= substr($strcedula, 6, 1);
								$valor7= ($valor7*2);
								if($valor7>9){
									$valor7=($valor7-9);
								}else{}
								$valor9= substr($strcedula, 8, 1);
								$valor9= ($valor9*2);
								if($valor9>9){
									$valor9=($valor9-9);
								}else{}

								$suma_impares= ($valor1+$valor3+$valor5+$valor7+$valor9);
								$suma=($suma_pares+$suma_impares);
								$dis=substr($suma, 0, 1);
								$dis= (($dis+1)*10);
								$digito=($dis-$suma);
								if($digito==10){
									$digito= '0';
								}else{}

								if($digito== $ult_digito){
									?>
									<script>
										document.getElementById("p").innerHTML="Cedula correcta.";
									</script> 
									<?php
								}else{
									?>
									<script>
										document.getElementById("p").innerHTML="Cedula incorrecta.";
									</script> 
									<?php
								}
							}else{
								?>
									<script>
										document.getElementById("p").innerHTML="La cedula no corresponde a ninguna provincia del Ecuador.";
									</script> 
									<?php
							}
						}else{
							?>
							<script>
								document.getElementById("p").innerHTML="La cedula tiene menos de 10 números";
							</script> 
							<?php
						}
					}else{
						?>
						<script>
							document.getElementById("p").innerHTML="Esta cedula no corresponde a un Nro de Ecuador.";
						</script> 
						<?php
					}
				}
			}
			//include('validar.php');
			?>
	</div>
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
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
</html>