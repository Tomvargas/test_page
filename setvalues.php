<?php
include('conexion.php');

session_start();

$name = $_GET['name'];
$ha = floatval($_GET['ha']);
$dh = floatval($_GET['dh']);
$dd = floatval($_GET['dd']);
$tr = intval($_GET['tr']);
$pl = intval($_GET['pl']);
$qt = intval($_GET['qt']);
$gn = floatval($_GET['gn']);


$consulta = 'UPDATE registro	SET hectareas='.$ha.', D_horizontal='.$dh.', D_diagonal='.$dd.', trancas='.$tr.', plantas='.$pl.', quintales='.$qt.', subtotal='.$gn.'	WHERE nombre="'.$name.'";';

if(mysqli_query($conexion, $consulta)){
					
	echo "<script>document.location='control.php'; alert('Los datos de su cultivo se han guardado correctamente')</script>";
	;
}
else{
	echo "FALLO LA CONSULTA";
}

mysqli_close($conexion);


?>