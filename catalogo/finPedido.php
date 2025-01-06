<?php 
//require_once("conexion/cerrarSesion.php");
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="index.php?c=".$slug;
if($_GET['idPedido']>0){
	 $_SESSION['sesiones'][0]=$_GET['token'];
	 $_SESSION['sesiones'][5]=$_GET['idPedido'];
	 $_SESSION['sesiones'][4]=$_GET['mesa'];
}
$may="style='text-transform:capitalize;' onblur='javascript:this.value=this.value.capitalize();'";
$total=0;
if($_SESSION['sesiones'][1]>0){
$m=$mysqli->query("SELECT * FROM car_pedido WHERE idPedido=".$_SESSION['sesiones'][5]."");
$pag = $m->fetch_assoc();
//print_r($_SESSION);
?>

<br>
<style>
.table th,
.table td {
    padding: 6px;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-size: 12px;
}
</style>
<script type="text/javascript">
function tiempoReal() {
    var tabla = $.ajax({
        url: 'shopCar/tabla_fin_pedido.php?c=<?php echo $slug ?>',
        dataType: 'text',
        async: false
    }).responseText;

    document.getElementById("miTabla").innerHTML = tabla;
}
setInterval(tiempoReal, 500);
</script> 
<br>
<br>
<br>
<br>
<br>
<div class="container"> 
  <!-- <div align='center'><?php echo "Sr/a ".ucwords($_SESSION['sesiones'][2]) ?></div> -->
  <h4 align="center"><?php echo TEXTO_5 ?> <?php echo $envio ?></h4>
  <h6 align="center">
	  
    <!--<div align="center"><img src="img/iconos/bandeja.png" width="60"></div>-->
    <?php echo TEXTO_6 ?> </h6>
  <div id="miTabla"></div>

<?php if($_SESSION['sesiones'][4] > 0){?>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4" align="center"> 
  <a href="./?c=<?php echo $slug ?>"><button type="button" style="padding: 3px 6px; font-size: 16px;" class="btn btn-warning btn-sm"><?php echo BOTON_1?></button></a>
 <?php if($pag['tipoPago'] == '') {?>
   <a href="shopCar/confirmar.php?c=<?php echo $slug ?>"><button type="button" style="padding: 3px 6px; font-size: 16px;" class="btn btn-success btn-sm"><?php echo BOTON_2 ?></button></a>
   <?php }?>
  </div>
</div> 
<br>
<?php }?> 
  <!-- ////////////////////PEDIDO/////////////////////////////// -->
  <h6 align='center'><?php echo MI_PEDIDO ?></h6>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th><?php echo CANT ?></th>
            <th><?php echo IMAGEN ?></th>
            <th><?php echo PRODUCTOS ?></th>
            <!--<th>Cdad</th>-->
            <th><?php echo TOTAL ?></th>
          </tr>
        </thead>
        <tbody>
<?php 
//print_r($_SESSION);
$sel="SELECT *,ca.precio as pre FROM car_pedido pe,car_tabla_pedido ca, productos pr WHERE pe.idPedido='".$_SESSION['sesiones'][5]."' AND ca.cliente='".$idCliente."' AND ca.idProducto=pr.idProducto AND pe.token=ca.token";
$m=$mysqli->query($sel);
while($rox = $m->fetch_assoc()){ 
$total = $rox['total'];
$envio=$rox['envio'];
$vendedor=$rox['vendedor'];
?>
          <tr>
            <td><?php echo $rox['cantidad']?></td>
            <td><img class="img-fluid"
                                src="imgCliente/<?php echo $slug ?>/productos/<?php echo $rox['idProducto'].".jpg?ver=".time() ?>"
                                alt="" width="60" height="" /></td>
            <td><?php echo "<strong>".$rox['categoria'].":</strong> ".$rox['producto']?></td>
            
           
          
            <td><?php $pre=$rox['pre']*$rox['cantidad']; echo number_format($pre, 2, ',', '.') ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="3" align="right"><b><?php echo TOTAL ?></b></td>
            <td><h6><b><?php echo "$".number_format($total, 2, ',', '.') ?></b></h6></td>
          </tr>
          <?php if($pag['pago']=='NO'){
			$res = $mysqli->query("SELECT * FROM car_configuracion WHERE  idCliente='".$idCliente."'");
			$r = $res->fetch_assoc();
			$celPedido=$r['celPedido'];
			echo $pag['tipoPago'];
			?>
 <?php //if($pag['tipoPago'] != NULL) {?>
          <tr>
            <td colspan="4" align="center"><br>
            <?php if($pag['envio']=='MESA'){?>
            	<div align="center"  style="color: red; font-size: 1rem;"><?php echo FORMA_PAGO ?></div></td>
             <?php }else{?>
                <div align="center"  style="color: red; font-size: 1rem;"><?php echo TEXTO_7 ?></div></td>
             <?php }?>
          </tr>
          <tr>
            <td colspan="4" align="center">
            <form name="form1" method="post" action="shopCar/pago_MercadoPago.php?c=<?php echo $slug ?>">
            	
				<?php if ($r['PedirCta_1']==1 && $envio=='MESA') {  ?>
                <a href="shopCar/pago_efectivo.php?modo=PEDIR LA CUENTA&slug=<?php echo $slug ?>&total=<?php echo $total ?>&titulo=<?php echo TITULO ?>&idCliente=<?php echo $idCliente ?>&vendedor=<?php echo $vendedor ?>">
                <button type="button" class="btn btn-warning btn-xs"><?php echo BOTON_3 ?></button>
                </a>
                &nbsp;&nbsp;
                <?php }
				if (($r['efectivo_1']==1 && $envio=='MESA') || 
				($r['efectivo_2']==1 && $envio=='RETIRO') || 
				($r['efectivo_3']==1 && $envio=='DELIVERY'))   {  ?>
                <a href="shopCar/pago_efectivo.php?modo=EFECTIVO&slug=<?php echo $slug ?>&total=<?php echo $total ?>&titulo=<?php echo TITULO ?>&idCliente=<?php echo $idCliente ?>&vendedor=<?php echo $vendedor ?>">
                <button type="button" class="btn btn-success btn-xs"><?php echo BOTON_4 ?></button>
                </a>
				&nbsp;&nbsp;<br><br>
				<?php } if (($r['tarjeta_1']==1 && $envio=='MESA') || 
				($r['tarjeta_2']==1 && $envio=='RETIRO') || 
				($r['tarjeta_3']==1 && $envio=='DELIVERY'))   {  ?>
                
                <a href="shopCar/pago_efectivo.php?modo=POSNET&slug=<?php echo $slug ?>&total=<?php echo $total ?>&titulo=<?php echo TITULO ?>&idCliente=<?php echo $idCliente ?>&vendedor=<?php echo $vendedor ?>">
                <button type="button" class="btn btn-info btn-xs"><?php echo BOTON_5 ?></button>
                </a>
				<br><br>
                <?php } if (($r['MerPago_1']==1 && $envio=='MESA') || 
				($r['MerPago_2']==1 && $envio=='RETIRO') || 
				($r['MerPago_3']==1 && $envio=='DELIVERY'))   { 
				
							$z=$mysqli->query("SELECT access_token FROM car_configuracion WHERE idCliente='".$idCliente."'");
							$key = $z->fetch_assoc();
							if($key['access_token']!=''){
							require('pagoTarjeta.php');?>
                &nbsp;&nbsp; 
                		<script
                               src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
                               data-button-label="Mercado Pago" data-preference-id="<?php echo $preference->id; ?>">
                        </script>
                <?php }} ?>
              </form></td>
          </tr>
          <?php }//}?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php 
$consulta="SELECT pe.idCliente,pe.idPedido,celPedido,token,tipoPago,envio,mesa 
FROM car_pedido pe,car_configuracion co 
WHERE idPedido=".$_SESSION['sesiones'][5]." AND pe.idCliente=co.idCliente AND pe.envioWpp=0 AND celPedido!=''";
//exit();
$re = $mysqli->query($consulta);
$ro = $re->fetch_assoc();
$celPedido="54 9 ".$ro['celPedido'];
$idCliente=$ro['idCliente'];
$tipoPago=$ro['tipoPago'];
$token=$ro['token'];
$idPedido=$ro['idPedido'];
if($ro['mesa'] >0) $envio=$ro['envio']."%20N°%20".$ro['mesa']; else $envio=$ro['envio'];
////ENVIO DE WHATSAPP///////////////////////////////		
	if($celPedido != '' && $tipoPago !=''){
		require('shopCar/email/enviarPedidoWPP.php');
	}	
?>

<br>
<br>
<br>
<br>
<?php } require("template/footer.php"); ?>
