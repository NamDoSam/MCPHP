<?php
require_once('menu/menu.php');
if($_SESSION['delivery']==0){
if($_GET['numPedido'] > 0){
	$sql = "UPDATE car_tabla_pedido SET entregado='".$_GET['entregado']."' WHERE numPedido=".$_GET['numPedido']."";
	$mysqli->query($sql);
}
if($_POST['estadoPedido']!=''){
	$sql = "UPDATE car_pedido SET estadoPedido='".$_POST['estadoPedido']."' WHERE idPedido=".$_POST['idPedido']."";
	$mysqli->query($sql);
if($_POST['estadoPedido']=='SU PEDIDO ESTA LISTO'){
?>
	<script>
		var url='https://wa.me/';
		var celPedido='<?php echo "549".$_POST['celComp']."?" ?>';
		var mensajeWPP='<?php echo $_POST['estadoPedido'] ?>';
		window.open(url+celPedido+"&text="+mensajeWPP);
	</script>
<?php }}?>

<script language="Javascript">
	function imprSelec(nombre) {
	  var ficha = document.getElementById(nombre);
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}
</script>
<link rel="stylesheet" type="text/css" href="delivery/popup.css">
<!--<link rel="stylesheet" href="css/lightbox.min.css">-->
<script type="text/javascript">
function tiempoReal() {
    var tabla = $.ajax({
		type: 'POST',
        url: 'delivery/tablas/tabla_fin_pedido.php?fechInicio=<?php echo $fecha1 ?>&fechFin=<?php echo $fecha2 ?>&slug=<?php echo SLUG ?>&idCliente=<?php echo NUM_CLIENTE ?>',
        dataType: 'text',
        async: false
    }).responseText;

    document.getElementById("miTabla").innerHTML = tabla;
	
}
setInterval(tiempoReal, 1000);
</script>
<script type="text/javascript">
	function printDiv(nombreDiv) {
		 var contenido= document.getElementById(nombreDiv).innerHTML;
		 var contenidoOriginal= document.body.innerHTML;
	
		 document.body.innerHTML = contenido;
	
		 window.print();
	
		 document.body.innerHTML = contenidoOriginal;
	}
</script>

<h2 align="center">Panel de Control 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<a href="reportes.php?slug=<?php echo SLUG ?>"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-search fa-lg"></i> Búsqueda Rápida</button></a>
</h2>
 
<div class="container">
  <div id="miTabla"></div>
</div> 
<?php 
$token=base64_decode($_GET['token']);
if($token){ /*echo "SELECT *,ca.precio as pre FROM car_tabla_pedido ca, productos pr WHERE ca.token='".$token."' AND ca.cliente='".NUM_CLIENTE."' AND ca.idProducto=pr.idProducto";*/
$m=$mysqli->query("SELECT *,ca.precio as pre FROM car_tabla_pedido ca, productos pr WHERE ca.token='".$token."' AND ca.cliente='".NUM_CLIENTE."' AND ca.idProducto=pr.idProducto");
while($rox = $m->fetch_assoc()){ 
$total += ($rox['cantidad'] * $rox['pre']);
?>
                <tr>
                  <td><?php echo $rox['cantidad']?></td>
                  <td><?php echo $rox['categoria'] ?></td>
                  <td><?php echo $rox['producto']?></td>
                  <td><i class="fa fa-square-o fa-lg"></i></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <div align="center">
              <input type="button" class="btn btn-warning" onclick="printDiv('areaImprimir')" value="imprimir" />
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/////////////////////MODAL VER PEDIDOS/////////////https://jsfiddle.net/vp5mu4nj//////-->
<div id="seleccion">
<div id="popup1" class="popup">
 <a href="#" class="close">&times;</a>
 <?php $m=$mysqli->query("SELECT * FROM car_pedido cp, car_comprador cc  WHERE cp.idPedido='".$_GET['idPedido']."' AND cp.idComprador=cc.idComprador");
$row = $m->fetch_assoc(); 
$celComp=$row['celComp'];
if($row['envio']=='MESA') $envio=$row['envio'].": ".$row['mesa']; else $envio=$row['envio']; ?>  
  <h2 align='center'> <?php echo "Pedido N°".$_GET['idPedido']." - ".$envio."</h2><h4 align='center'>Fecha: ".date("d/m/y H:i",strtotime($row['fechaPedido']))."</h4><div align='center'>Cliente: <strong>".$row['nombreComp']."</strong> - Cel: <strong>".$row['celComp']."</strong></div>" ?>
  
<?php require('delivery/tablas/tabla_pedidos.php'); ?>
</div>
<br>
</div>
<a href="#" class="close-popup"></a>
<!--/////////////////////////////////////////////////////////////-->

<!--/////////////////////MODAL DIRECCION////////////////////////////////////////-->
<div id="popup2" class="popup">
  <a href="#" class="close">&times;</a>
 <style>
 	.dir{
		border:1px solid #CCC;
		padding:10px;
		width:500px;
		border-radius: 8px;
		
	}
 </style>
  <br>
  <?php $est=$mysqli->query("SELECT di.*,co.* FROM car_pedido pe, car_direccion_envio di,car_comprador co 
	WHERE pe.idPedido='".$_GET['idPedido']."' AND pe.idDireccion=di.idDireccion AND pe.idComprador=co.idComprador"); 
	$data = $est->fetch_assoc();?>
  <h2>&nbsp;&nbsp;&nbsp;Dirección del pedido&nbsp;&nbsp;&nbsp;</h2>
   <h4 align="center"><i class="fa fa-user"></i> <?php echo $data['nombreComp']."&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;<i class='fa fa-phone'></i> ".$data['celComp'] ?></h4>
  <hr>
<div>Dirección
<a style="color:#699; text-decoration:none;" href="https://www.google.com.ar/maps/place/<?php echo $data['direccion'].", ". $data['provincia'] ?>" target="_blank">
	<div class="dir">
    <i class="fa fa-map-marker fa-2x"></i>
	<?php echo $data['direccion'].", ". $data['localidad'].", ". $data['provincia'] ?></div>
 </a>
    
    <br>Detalle
	<div class="dir"><?php echo $data['detalle'] ?></div>
    <br>
    <div align="center">
    Enviar dirección por Whatsapp &nbsp;&nbsp;&nbsp;
 <a style="color:#0C0; text-decoration:none;" href="whatsapp://send?text=<?php echo "Cliente:%20 ".$data['nombreComp']."%0ATel: ".$data['celComp']."%0ADirección:%20". $data['direccion'].",%20".$data['localidad'].",%20".$data['provincia']."%0ADetalle: ".$data['detalle'] ?>" target="_blank"> 
 <i class="fa fa-whatsapp fa-3x"></i>
 </a>
 </div>
  <br>
  
  <!--<div align="center"><button type="submit" class="btn btn-success">Actualizar Estado</button></div>-->
</form>

</div>
<br>
</div>
<a href="#" class="close-popup"></a>
<!--/////////////////////////////////////////////////////////////-->

</div>

</div>
</div>
</div>
</div>

</div>
<br>
<br>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body></html><?php }else{?>
<script>
location.href="index.php";
</script>
<?php }?>