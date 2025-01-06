 <form name="form1" method="post" action="">
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
while($rox = $m->fetch_assoc()){ 
$numb++?>
        <tr>
          <td align="center"><?php echo "<strong>".$rox['cantidad']."</strong>" ?></td>
          <td><img class="img-fluid" src="../imgCliente/<?php echo SLUG ?>/productos/<?php echo $rox['idProducto'].".jpg?ver=".time() ?>"
alt="" width="60" height="" /></td>
          <td><?php echo "<strong>".$rox['categoria']."</strong> - ".$rox['producto']."<br><font color= red>".$rox['nota']."</font>" ?></td>
          <td align="center">
          <?php if($rox['entregado']==1) {?>
          	<a href="shopcar.php?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $_GET['idPedido'] ?>&fecha1=<?php echo $fecha1?>&fecha2=<?php echo $fecha2 ?>&numPedido=<?php echo $rox['numPedido'] ?>&entregado=0&#popup1"><img src="../img/iconos/check_1.jpg" width="35"></a>
          <?php }else{?>
          	<a href="shopcar.php?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $_GET['idPedido'] ?>&numPedido=<?php echo $rox['numPedido'] ?>&fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>&entregado=1&#popup1"><img src="../img/iconos/check_0.jpg" width="35"></a>
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
  </form>
</div>
<a href="#" class="close-popup"></a>
</div>
<!--/////////////////////////////////////////////////////////////-->

<!--/////////////////////MODAL ESTADOS////////////////////////////////////////-->
<div id="popup" class="popup">
  <a href="#" class="close">&times;</a>
  <br>
  <h2>&nbsp;&nbsp;&nbsp;Cambio de estado del pedido <?php echo $_GET['idPedido'] ?>&nbsp;&nbsp;&nbsp;</h2>
  <hr>
<div align="center">
<form name="form2" method="post" action="shopcar.php?slug=<?php echo $_GET['slug'] ?>&fecha1=<?php echo $_GET['fecha1'] ?>&fecha2=<?php echo $_GET['fecha2'] ?>">
 <input type="hidden" name="idPedido" value="<?php echo $_GET['idPedido'] ?>">
 <input type="hidden" name="celComp" value="<?php echo $celComp ?>">
  <select name="estadoPedido"  class="form-control" onchange="this.form.submit()">
	<?php $est=$mysqli->query("SELECT * FROM estado_pedido ORDER BY idEstado");
	while($data = $est->fetch_assoc()){?>  
    <option value="<?php echo $data['estadoPedido'] ?>"<?php if($data['estadoPedido']==$_GET['estadoPedido']) echo "selected"; ?> ><?php echo $data['estadoPedido'] ?></option>
    <?php }?>
  </select>
  <br><br>
  <!--<div align="center"><button type="submit" class="btn btn-success">Actualizar Estado</button></div>-->
</form>
