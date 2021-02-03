<?php

session_start();

$usuario= test_input($_POST['txtusuario']);
$password= test_input($_POST['txtpassword']);
$password2= test_input($_POST['txtpassword2']);
$nombre= test_input($_POST['txtnom']);
$apellido= test_input($_POST['txtapellido']);
$email= test_input($_POST['txtema']);
$telefono= test_input($_POST['txttel']);
$direccion= test_input($_POST['txtdir']);
$cedula= test_input($_POST['txtcedula']);

$campos= array();

	if(empty($direccion)){

		$vardir=1;
	}else{
		$vardir=0;
	}
	if(strlen($telefono)>10){

		$vartel=1;
	}else{
		$vartel=0;
	}
	if(empty($email)){
		$varemail=1;
	}else{
		$varemail=0;
	}

	if(empty($nombre)){

		$varnombre=1;
	}else{
		$varnombre=0;
	}

	if(empty($apellido)){
		$varapellido=1;
	}else{
		$varapellido=0;
	}

	if(empty($usuario)){

		$varusuario=1;
	}else{
		$varusuario=0;
	}


	if(strlen($usuario)<3){
		$varusuario1=1;
	}else{
		$varusuario1=0;
	}

	if(empty($password)){
		$varpass=1;
	}else{
		$varpass=0;
	}
	if(strlen($password)<3){
		$varpass1=1;
	}else{
		$varpass1=0;
	}

	if(strlen($telefono)<10){
		$cont= strlen($telefono);
		$vartel1=1;
	}else{
		$vartel1=0;
	}

	if($password==$password2){
		$confirmar=0;
	}else{
		$confirmar=1;
	}

	$strcedula= $cedula;

	

	if(is_null($strcedula) || empty($strcedula) || $strcedula=='2222222222'){
		$varcedula=1;

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
						$varcedula=0;
					}else{
						$varcedula=1;
					}
				}else{
					$varcedula=1;
				}
			}else{
				$varcedula=1;
			}
		}else{
			$varcedula=1;
		}
	}

	require('usuario.php');



	if(($varusuario==1) && ($varusuario1==1) && ($varpass==1) && ($varpass1==1) && ($vardir==1) && ($vartel==1) && ($vartel1==1) &&($varcedula==1) && ($varnombre==1) && ($confirmar==1) && ($varapellido==1)){
		echo"Ingreso incorrecto";
		
	}
	if(($varusuario==0) && ($varusuario1==0) && ($varpass==0) && ($varpass1==0) && ($vardir==0) && ($vartel==0) && ($vartel1==0) && ($varcedula==0) && ($varnombre==0) &&($confirmar==0) && ($varapellido==0)){
		require('registro.php');

	}

	
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>