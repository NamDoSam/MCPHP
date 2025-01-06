<?php
$ped="SELECT * FROM car_pedido pe,car_comprador co WHERE pe.idPedido='".$_SESSION['sesiones'][5]."' AND co.idComprador=pe.idComprador";
$sel=$mysqli->query($ped);
$row = $sel->fetch_assoc();
$token=$row['token'];
$mensaje = "<div>
<table width='100%' border='0' align='center' cellpadding='5'>
		  <tr>
			 <td><img src='https://winetalk.com.ar/catalogo/imgCliente/".$slug."/logo/logo.png'></td>
		  </tr>
		  <tr>
			<td align='center'><font size='4'><strong>PEDIDO N° ".$_SESSION['sesiones'][5]."</strong></font><hr></td>
		  </tr>
		   <tr>
			  <td>Cliente: <strong>".$row['nombreComp']."</strong></td>
		  </tr>
		  <tr>
			  <td>Teléfono: <strong>".$row['celComp']."</strong></td>
		  </tr>
		   <tr>
			  <td>Fecha: <strong>".date('d-m-Y H:i')." Hs.</strong></td>
		  </tr>
		  <tr>
			  <td>Forma de Pago: <strong>".$formaPago."</strong></td>
		  </tr>";
		  
if($row['vendedor']){
$mensaje .=" <tr>
			  <td>Vendedor: <strong>".$row['vendedor']."</strong></td>
		  </tr>";
}
$mensaje .="<tr><td><strong><br>Productos:</strong></td></tr>";
$num=0;
$com="SELECT * FROM car_tabla_pedido WHERE cliente='".$row['idCliente']."' AND token='".$row['token']."'";
$selic=$mysqli->query($com);
while($prod = $selic->fetch_assoc()){ 
		$num++;
		$total+=($prod['precio']*$prod['cantidad']);
		$mensaje .="<tr><td>$num) Cant. ".$prod['cantidad']." | <strong>".$prod['producto']."</strong> | C/U $".$prod['precio']."</td></tr>";
}
		$mensaje .="<tr>
			<td>
			Total  <strong> $ ".$total."</strong><hr>
			<br>
			<a href='https://menucatalogo.com'><img src='https://menucatalogo.com/catalogo/img/logo_qr/menucatalgo.png'></a>
			</td>
		</tr>
</table>
<br>
</div>";
?>
