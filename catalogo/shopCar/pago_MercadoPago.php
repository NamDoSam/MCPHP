<?php 
session_start();
require_once('../conexion/conexion.php');
/*print_r($_SESSION);
echo "<br><br>";
print_r($_POST);*/
$slug=$_GET['slug'];
if($_POST['payment_status']=='approved'){
$sql = "UPDATE car_pedido SET tipoPago='MERCADO PAGO',pago='SI' WHERE idPedido=".$_SESSION['sesiones'][5]."";
$mysqli->query($sql);
$_SESSION['sesiones'][0]='';

$m=$mysqli->query("SELECT idCliente FROM car_pedido WHERE idPedido=".$_SESSION['sesiones'][5]."");
$pag = $m->fetch_assoc(); 
////ENVIO DE EMAIL///////////////////////////////
$formaPago='MERCADO PAGO';
$pedi="SELECT email_1,email_2 FROM car_configuracion WHERE idCliente=".$pag['idCliente']."";
	$pe = $mysqli->query($pedi);
	$cliente = $pe->fetch_assoc();
		if($cliente['email_1']!='' || $cliente['email_2']!=''){
			require('email/enviarPedido.php');
		}
}
///////////////////////////////////
?>
<script type="text/javascript">
	//window.location="../ultimosPedidos.php?c=<?php echo $_GET['c'] ?>";
	window.location="../finPedido.php?c=<?php echo $_GET['c'] ?>";
</script>