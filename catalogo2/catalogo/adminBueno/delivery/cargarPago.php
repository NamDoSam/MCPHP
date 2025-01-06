<?php 
require_once("../conexion/cerrarSesion.php");
require_once('../conexion/conexion.php');
if($_SESSION['idComprador'] == ""){
/////////////CARGAR COMPRADOR//////////////////
$inser = "INSERT INTO car_comprador (nombreComp,celComp,fechaAlta) 
	VALUES ('".$_SESSION['nombreComp']."','".$_SESSION['celComp']."','".date('Y-m-d H:s')."')";
	$mysqli->query($inser) or die(mysql_errno());
	$_SESSION['idComprador'] = $mysqli->insert_id;

}
//echo "idComprador ".$_SESSION['idComprador'];
//exit();
/////////////CARGAR Productos//////////////////
$resultado = $mysqli->query("SELECT numPedido,idProducto,cantidad,precio FROM car_temp_pedido WHERE cliente='".$_SESSION['idCliente']."' AND token='".$_SESSION['token']."'");
while($row = $resultado->fetch_assoc()){
		$insec = "INSERT INTO car_tabla_pedido (cliente,token,idProducto,cantidad,precio) 
		VALUES ('".$_SESSION['idCliente']."','".$_SESSION['token']."','".$row['idProducto']."','".$row['cantidad']."','".$row['precio']."')";
		$mysqli->query($insec) or die(mysql_errno());

		$sql = "DELETE FROM car_temp_pedido WHERE numPedido='".$row['numPedido']."'";
		$mysqli->query($sql);
		$total+=$row['precio']*$row['cantidad'];
}	
/////////////CARGAR PEIDIO//////////////////
$r = $mysqli->query("SELECT idPedido,total FROM car_pedido WHERE idComprador='".$_SESSION['idComprador']."' AND token='".$_SESSION['token']."'");
$rowPedido = $r->fetch_assoc();
	if($rowPedido['idPedido']>0){
		$total1=$total+$rowPedido['total'];
		echo $sql = "UPDATE car_pedido SET total='".$total1."' WHERE idCliente='".$_SESSION['idCliente']."' AND token='".$_SESSION['token']."'";
			$mysqli->query($sql) or die(mysql_error);
	}else{
	$insert = "INSERT INTO car_pedido (envio,idCliente,idComprador,token,mesa,fechaPedido,total,tipoPago,pago,estado) 
		VALUES ('".$envio."',".$_SESSION['idCliente'].",".$_SESSION['idComprador'].",'".$_SESSION['token']."','".$_SESSION['mesa']."','".date('Y-m-d H:i')."','".$_SESSION['totalPago']."','".$_GET['pago']."','NO','PEDIDO')";
		$mysqli->query($insert) or die(mysql_errno());
	}
///////////////////////////////////////////////
header("location: ../finPago.php?c=".$_SESSION['slug']);
exit();
?>