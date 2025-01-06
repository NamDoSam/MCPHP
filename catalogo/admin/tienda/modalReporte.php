<?php
include_once("../../conexion/conexion.php");
$idPedido=$_REQUEST['idPedido'];
$slug=$_REQUEST['slug'];
?>
<link rel="stylesheet" type="text/css" href="delivery/popup.css">
<style>
.modal-content {
    background-color: #ffffff;
}
</style>
<!--/////////////////////MODAL//////////////////////////////-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

     Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
<?php $m=$mysqli->query("SELECT * FROM car_pedido cp, car_comprador cc  WHERE cp.idPedido='".$idPedido."' AND cp.idComprador=cc.idComprador");
$row = $m->fetch_assoc(); 
$celComp=$row['celComp'];
if($row['envio']=='MESA') $envio=$row['envio'].": ".$row['mesa']; else $envio=$row['envio']; ?>  
  <h2 align='center'> <?php echo "Pedido N° ".$_GET['idPedido']." - ".$envio."</h2><h4 align='center'>Fecha: ".date("d/m/y H:i",strtotime($row['fechaPedido']))."</h4><div align='center'>Cliente: <strong>".$row['nombreComp']."</strong> - Cel: <strong>".$row['celComp']."</strong></div>" ?>               
        </h4>
      </div>
      <div class="modal-body">
 <div class="table-responsive">
<table width="560" border="1" bordercolor="#CCCCCC" align="center" cellpadding="5" cellspacing="0">
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
          <td><img class="img-fluid" src="../imgCliente/<?php echo $slug ?>/productos/<?php echo $rox['idProducto'].".jpg?ver=".time() ?>"
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
</div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--/////////////////////////////////////////////////////////////-->
