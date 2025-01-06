<?php
session_start();
require_once('../../../conexion/conexion.php');
//print_r($_POST);
if($_POST['estadoPedido']=='PAGADO') $pago="pago='SI'"; else $pago="pago='NO'";
echo $sql = "UPDATE car_pedido SET estadoPedido='".$_POST['estadoPedido']."', $pago WHERE idPedido='".$_POST['idPedido']."'";
$mysqli->query($sql) or die(mysql_error);
header("location: ../../shopcar.php?c=".$_SESSION['slug']);
exit();
?>