<?php 
session_start();
//print_r($_SESSION);
require("../conexion/conexion.php"); 
$sql = "UPDATE car_tabla_pedido SET confirmar=0 WHERE token='".$_SESSION['sesiones'][0]."'";
$mysqli->query($sql);
$sqli = "UPDATE car_pedido SET tipoPago='PENDIENTE' WHERE idPedido='".$_SESSION['sesiones'][5]."'";
$mysqli->query($sqli);
?>
<script type="text/javascript">
	window.location="../finPedido.php?c=<?php echo $_GET['c'] ?>";
</script>