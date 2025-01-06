<?php 
session_start();
require_once('../conexion/conexion.php');
//print_r($_SESSION);
$formaPago=$_GET['modo'];
$titulo=$_GET['titulo'];
$slug=$_GET['slug'];
$id_Cliente=$_GET['idCliente'];
////////////////////////////////
if($_GET['vendedor']){
	$p="SELECT email FROM vendedores WHERE idCliente=".$id_Cliente." AND nombre='".$_GET['vendedor']."'";
	$ve = $mysqli->query($p);
	$em = $ve->fetch_assoc();
	$emailV = $em['email'];
}
//echo $emailV['email']; exit();
//////////////////////////////
$sql="UPDATE car_pedido SET fechaEntrega='".date('Y-m-d H:i')."',tipoPago='".$formaPago."',pago='SI' WHERE idPedido=".$_SESSION['sesiones'][5]."";
$mysqli->query($sql) or die(mysql_error);
$idComprador=$_SESSION['sesiones'][1];
$_SESSION['sesiones'][0]='';
////ENVIO DE EMAIL///////////////////////////////
$pedi="SELECT email_1,email_2,celPedido FROM car_configuracion WHERE idCliente=".$id_Cliente."";
	$pe = $mysqli->query($pedi);
	$cliente = $pe->fetch_assoc();
	if($cliente['email_1']!='' || $cliente['email_2']!='' || $emailV!=''){
		require('email/enviarPedido.php');
	}
	
///////////////////////////////////
header("location: ../finPedido.php?c=".$_GET['slug']);
exit();
?>