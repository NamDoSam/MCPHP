<?php 
session_start();
require_once('../../conexion/conexion.php');
if($_GET['numPedido']>0){
$sql = "DELETE FROM car_temp_pedido WHERE numPedido='".$_GET['numPedido']."'";
$mysqli->query($sql);
header("location: ../../listadoPedido.php?c=".$_GET['slug']);
exit();
}