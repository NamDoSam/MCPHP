<?php 
//require_once('../../menu/menu.php');
//require_once('../../../conexion/conexion.php');
print_r($_POST);
$sql = "UPDATE car_pedido SET estado='".$_POST['estado']."' WHERE idPedido='".$_POST['idPedido']."'";
//$mysqli->query($sql) or die(mysql_error);
exit();
?>
