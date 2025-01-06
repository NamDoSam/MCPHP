<?php 
require_once 'menu/menu.php';
if(!isset($_POST['date_range'])){
	$fecha=date('Y-m-d');
}else{
	$fecha=$_POST['date_range'];
}
?>
<link rel="stylesheet" type="text/css" href="delivery/popup.css">
<link rel="stylesheet" href="popup/css/lightbox.min.css">
<style>
.modal-content {
    background-color: #f1f1f1;
  }
</style>
<div class="container">
  <h2>Reportes</h2> <hr>


<div class="form-group" align="center">
<div class="row">
<form name="form1" method="post">
        <div class="form-group col-md-3"></div>
            <div class="form-group col-md-6">
                <label>Selecciona fechas:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="date_range" name="date_range" class="form-control pull-right" value="<?php echo $fecha ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit" name="submitRangeDates">Enviar</button>
                    </span>
                </div>
            </div>
    </div>
</div>
<!--</form>
<form name="form2" method="post">-->
  <div class="form-group">
  <div class="col-sm-4 col-xs-2"></div>
  	<div class="col-sm-3 col-xs-8">
     <!-- <input type="text" class="form-control" width="500px" id="filtrar" <?php echo $may ?>  placeholder="Buscar...">-->
     <select name="envio" id="select" class="form-control" onchange="this.form.submit()">
     <option value="" <?php if ($_POST['envio']=='') echo "selected"?>>SELECCIONAR</option>
   <?php 
   $re = $mysqli->query('SELECT envio,mesa FROM car_pedido GROUP BY envio,mesa ORDER BY envio');
   while ($r = $re->fetch_assoc()) { if($r['envio']=='MESA') $envio=$r['envio']." ".$r['mesa']; else $envio=$r['envio'] ?>  
    <option value="<?php echo $envio ?>"<?php if ($envio == $_POST['envio']) echo "selected"?>><?php echo $envio ?></option>
    <?php }?>
  </select>
      </div>
    </div>
</form>
</div>
<br><br>
<?php 
//echo $_POST['envio'];
$fecha=explode(' - ',$fecha);
$fecha1=date("Y-m-d",strtotime($fecha[0]));
$fecha2=date("Y-m-d",strtotime("+1 day", strtotime($fecha[1])));
?>
<div class="table-responsive">

<div class="container">

  <table class="table table-hover table-striped table-condensed">
    <thead>
      <tr>
        <th>#</th>
        <th>Envío</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Tipo Pago</th>
        <th style="width:100px; text-align:right">Total $</th>
    	<th style=" text-align:center">Pedido</th>
      </tr>
    </thead>
    <tbody class="buscar">
<?php
if($_POST['envio']==''){ 
	$sam='SELECT * FROM car_pedido WHERE idCliente="' . NUM_CLIENTE . '" AND fechaPedido >="'.$fecha1.'" AND fechaPedido <="'.$fecha2.'" ORDER BY idPedido';
}else{ $numMesa=explode(' ',$_POST['envio']); 
	$sam='SELECT * FROM car_pedido WHERE idCliente="' . NUM_CLIENTE . '" AND fechaPedido >="'.$fecha1.'" AND fechaPedido <="'.$fecha2.'" AND envio="'.$numMesa[0].'" AND mesa="'.$numMesa[1].'" ORDER BY idPedido';
}
$num       = 0;
//$sam       = 'SELECT * FROM car_pedido WHERE idCliente="' . NUM_CLIENTE . '" AND fechaPedido >="'.$fecha1.'" AND fechaPedido <="'.$fecha2.'" ORDER BY idPedido';
$resultado = $mysqli->query($sam);
while ($row = $resultado->fetch_assoc()) {
	$total+=$row['total'];
    $num++;
    ?>
      <tr>
      	<td><?php echo $num ?></td>
        <td><strong><?php 
		if($row['envio']=='MESA') echo $row['envio']." ".$row['mesa']; else echo $row['envio'] ?></strong>
        </td>
        <td><?php echo date("d-m-Y H:i",strtotime($row['fechaPedido'])) ?></td>
        
        <td><?php echo $row['estadoPedido'] ?></td>
        <td><?php echo $row['tipoPago'] ?></td>
        <td align="right"><?php  echo number_format($row['total'], 2, ',', '.')?></td>
        <td align="center">
        <!--<a href="Formulario_vendedor.php?slug=<?php echo SLUG ?>&idVendedor=<?php echo $row['idVendedor'] ?>" title="Actualizar Vendedor"><font color='#33666CC'><i class='fa fa-list-ul fa-lg'></i></font></a>-->
        <a href="?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $row['idPedido']?>&#popup1">
            <i class='fa fa-list-ul fa-lg'></i>
            </a>
        </td>
      </tr>	
 <?php }?>
<td colspan="5" align="right"><strong>TOTAL $</strong></td>		
<td align="right"><strong><?php echo number_format($total, 2, ',', '.') ?></strong></td>
<!--<td colspan="2" align="right"></td>-->		
    </tbody>
  </table>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////?>

<!-- Modal I -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Configuracion general de la tienda</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/8GqhDeU3S3A" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
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
  
 <input type="hidden" name="idPedido" value="<?php echo $_GET['idPedido'] ?>">
    <table width="580" border="1" bordercolor="#CCCCCC" align="center" cellpadding="5" cellspacing="0">
      <thead>
        <tr>
          <th><div align="center">Cdad</div></th>
          <th>Imagen</th>
          <th>Producto</th>
          <th><div align="center">Preparado</div></th>
        </tr>
      </thead>
      <tbody>
<?php 
$numb=0;
$m=$mysqli->query("SELECT * FROM car_tabla_pedido pe, productos pr, categorias ca
WHERE pe.token='".$row['token']."' AND pe.cliente='".$row['idCliente']."' AND pe.idProducto=pr.idProducto AND pr.idCat=ca.idCat");
while($rox = $m->fetch_assoc()){ $numb++?>
        <tr>
          <td align="center"><?php echo "<strong>".$rox['cantidad']."</strong>" ?></td>
          <td><img class="img-fluid" src="../imgCliente/<?php echo SLUG ?>/productos/<?php echo $rox['idProducto'].".jpg?ver=".time() ?>"
alt="" width="60" height="" /></td>
          <td><?php echo "<strong>".$rox['categoria']."</strong> - ".$rox['producto']."<br><font color= red>".$rox['nota']."</font>" ?></td>
          <td align="center">
          <?php if($rox['entregado']==1) {?>
          	<img src="../img/iconos/check_1.jpg" width="35">
          <?php }else{?>
          	<img src="../img/iconos/check_0.jpg" width="35">
           <?php }?>
          </td>
        </tr>
        <?php }?>
        <tr>
        </tr>
      </tbody>
    </table>
    <div align="center"style="padding: 10px;" >
    <a style="color:#757666; font-size: 14px; text-decoration:none" href="javascript:imprSelec('seleccion')" >
    <i class="fa fa-print fa-2x"></i> Imprimir Comanda</a></div>

</div>
<a href="#" class="close-popup"></a>
</div>
<!--/////////////////////////////////////////////////////////////-->


</body>
</html>