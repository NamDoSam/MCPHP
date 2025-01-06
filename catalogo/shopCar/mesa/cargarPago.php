<?php
session_start();
require_once("../imgCliente/".$_GET['c']."/config/config.php");
require_once('../conexion/conexion.php');
//print_r($_SESSION);
//exit();
if(($_GET['pago']=='TARJETA' && $_GET['resultado']=='success') || $_GET['pago']=='EFECTIVO' || $_SESSION['token']!='') {
	if($_GET['pago']!='') $_SESSION['pago']=$_GET['pago'];
/////////////CARGAR Productos//////////////////
if($_GET['pago']=='EFECTIVO'){ 
	$r = $mysqli->query("SELECT idPedido,total FROM car_pedido WHERE idComprador='".$_SESSION['idComprador']."' AND token='".$_SESSION['token']."'");
	$prod = $r->fetch_assoc();
	if($prod['idPedido'] > 0){ 
	$total=$prod['total']+$_SESSION['totalPago']; 
	$sql = "UPDATE car_pedido SET fechaPedido='".date('Y-m-d H:i')."',total='".$total."' WHERE idPedido=".$prod['idPedido']."";
		$mysqli->query($sql) or die(mysql_error);
	}else{ 
	$total=$_SESSION['totalPago'];
	$inser = "INSERT INTO car_pedido (envio,idCliente,idComprador,token,mesa,fechaPedido,total,tipoPago,estadoPedido) 
VALUES ('MESA','".$idCliente."','".$_SESSION['idComprador']."','".$_SESSION['token']."','".$_SESSION['mesa']."','".date('Y-m-d H:i')."','".$_SESSION['totalPago']."','".$_SESSION['pago']."','PEDIDO REALIZADO')"; 
	$mysqli->query($inser) or die(mysql_error);
	}

}
//exit();
$resultado = $mysqli->query("SELECT * FROM car_temp_pedido WHERE cliente='".$idCliente."' AND token='".$_SESSION['token']."'");
while($row = $resultado->fetch_assoc()){
		$insec = "INSERT INTO car_tabla_pedido (cliente,token,categoria,idProducto,producto,cantidad,precio) 
		VALUES ('".$idCliente."','".$_SESSION['token']."','".$row['categoria']."','".$row['idProducto']."','".$row['producto']."','".$row['cantidad']."','".$row['precio']."')";
		$mysqli->query($insec);

		$sql = "DELETE FROM car_temp_pedido WHERE numPedido='".$row['numPedido']."'";
		$mysqli->query($sql);
		$total+=$row['precio']*$row['cantidad'];
}
/////////////PAGO TARJETA//////////////////
		if($_SESSION['pago']=='TARJETA'){ 
		$insert = "INSERT INTO car_pedido (envio,idCliente,idComprador,token,mesa,fechaPedido,total,tipoPago,pago,estadoPedido) 
		VALUES ('".$_SESSION['envio']."',".$idCliente.",".$_SESSION['idComprador'].",'".$_SESSION['token']."','".$_SESSION['mesa']."','".date('Y-m-d H:i')."','".$_SESSION['totalPago']."','TARJETA','SI','PEDIDO REALIZADO')";
		$mysqli->query($insert);
		$idPedido=$mysqli->insert_id;
		if($_SESSION['pago']=='TARJETA'){
		$in = "INSERT INTO car_status (idPedido,collection_id,merchant_order_id,payment_type,collection_status) 
		VALUES ('".$idPedido."',".$_GET['collection_id'].",".$_GET['merchant_order_id'].",'".$_GET['payment_type']."','".$_GET['collection_status']."')";
		$mysqli->query($in);
		}}
///////////////////////////////////////////////
?>
<script type="text/javascript">
	window.location="../finPago.php?c=<?php echo SLUG ?>";
</script>
<?php }?>
