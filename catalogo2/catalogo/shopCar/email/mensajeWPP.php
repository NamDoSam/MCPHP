<?php
$ped="SELECT * FROM car_pedido pe,car_comprador co WHERE pe.idPedido='".$_SESSION['sesiones'][5]."' AND co.idComprador=pe.idComprador";
$sel=$mysqli->query($ped);
$row = $sel->
$mensajeWPP = "Pedido: Desde%20MenuCatalogo:%0A";
?>
