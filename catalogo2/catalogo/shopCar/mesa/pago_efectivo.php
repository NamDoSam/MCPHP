<?php 
session_start();
require_once('../../conexion/conexion.php');
//print_r($_SESSION);
$sql = "UPDATE car_pedido SET fechaEntrega='".date('Y-m-d H:i')."',tipoPago='EFECTIVO',pago='SI' WHERE idPedido=".$_SESSION['idPedido']."";
$mysqli->query($sql) or die(mysql_error);
header("location: ../../finPago.php?c=".$_GET['slug']);
exit();
?>