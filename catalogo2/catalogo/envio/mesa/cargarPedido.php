<?php 
session_start();
$_SESSION['sesiones'][4]=$_POST['mesa'];
print_r($_SESSION);
exit();
require("../../conexion/conexion.php");
$m=$mysqli->query("SELECT idPedido FROM car_pedido WHERE token='".$_SESSION['sesiones'][0]."' AND idComprador='".$_SESSION['sesiones'][1]."'");
$id = $m->fetch_assoc();
if($id['idPedido']==''){
		$inser = "INSERT INTO car_pedido (envio,idCliente,idComprador,token,mesa,fechaPedido,total,vendedor,estadoPedido) 
		VALUES ('".$_GET['envio']."','".$_GET['idCliente']."','".$_SESSION['sesiones'][1]."','".$_SESSION['sesiones'][0]."','".$_POST['mesa']."','".date('Y-m-d H:i')."','".$_SESSION['sesiones'][3]."','".$_GET['vendedor']."','PEDIDO RECIBIDO')"; 
		$mysqli->query($inser);
		$_SESSION['sesiones'][5]=$mysqli->insert_id;
}else{
	$update="SELECT idPedido,total FROM car_pedido WHERE token='".$_SESSION['sesiones'][0]."' AND idComprador='".$_SESSION['sesiones'][1]."'";
	$m=$mysqli->query($update);
	$rox = $m->fetch_assoc();
	$_SESSION['sesiones'][3]=$rox['total']+$_SESSION['sesiones'][3];
	$sql = "UPDATE car_pedido SET fechaPedido='".date('Y-m-d H:i')."',total='".$_SESSION['sesiones'][3]."',mesa='".$_SESSION['sesiones'][4]."',vendedor='".$_GET['vendedor']."',estadoPedido='PEDIDO RECIBIDO' WHERE idPedido=".$rox['idPedido']."";
	$mysqli->query($sql);
}
//exit();
$m=$mysqli->query("SELECT * FROM car_temp_pedido WHERE token='".$_SESSION['sesiones'][0]."' AND cliente='".$_GET['idCliente']."'");
	while($row = $m->fetch_assoc()){
		$inser = "INSERT INTO car_tabla_pedido (cliente,token,categoria,idProducto,producto,cantidad,nota,precio) 
		VALUES ('".$row['cliente']."','".$row['token']."','".$row['categoria']."','".$row['idProducto']."','".$row['producto']."','".$row['cantidad']."','".$row['nota']."','".$row['precio']."')"; 
		$mysqli->query($inser);
		$consulta = "DELETE FROM car_temp_pedido WHERE numPedido=".$row['numPedido']."";
		$mysqli->query($consulta);
	}

?>
<!--<script type="text/javascript">
	window.location="../../finPedido.php?c=<?php echo $_GET['c'] ?>";
</script>-->