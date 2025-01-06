<?php 
require_once('conexion.php');
$sql = "UPDATE car_pedido SET visible='1' WHERE idPedido='".$_GET['idPedido']."'";
$mysqli->query($sql);
header("location: ../ultimosPedidos.php?c=".$_GET['c']);
exit();
?>