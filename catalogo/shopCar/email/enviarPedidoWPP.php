<?php
$com="SELECT * FROM car_tabla_pedido WHERE cliente='".$idCliente."' AND token='".$token."'";
$se=$mysqli->query($com);
$mensajeWPP .= $titulo."%0AFecha:%20".date('d-m-y H:i')."%0A".$_SESSION['sesiones'][2]."%0A%0APedido N°%20".$_SESSION['sesiones'][5]."%0A";
	while($pr = $se->fetch_assoc()){ 
		$mensajeWPP .= $pr['cantidad']."%20|%20".$pr['producto']."%0A";
	}
$mensajeWPP .= "%0ATOTAL:%20$%20".number_format($_SESSION['sesiones'][3], 2, ',', '.')."%0ATipo Envío:%20".$envio."%0AForma de Pago:%20".$tipoPago;
$sql = "UPDATE car_pedido SET envioWpp=1 WHERE idPedido=".$idPedido."";
	$mysqli->query($sql);
?>
<script>
var url='https://api.whatsapp.com/send?';
var celPedido='<?php echo $celPedido ?>';
var mensajeWPP='<?php echo $mensajeWPP ?>';
window.open(url+"phone="+celPedido+"&text="+mensajeWPP);
</script>

