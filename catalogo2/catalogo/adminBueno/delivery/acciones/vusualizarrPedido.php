<?php 
require_once('../../../conexion/conexion.php');
//print_r($_POST);
$sql = "UPDATE car_pedido SET ocultar=0 WHERE idPedido='".$_GET['idPedido']."'";
$mysqli->query($sql) or die(mysql_error);
header("location: ../../shopcar.php?slug=".$_GET['slug']);
exit();
?>
