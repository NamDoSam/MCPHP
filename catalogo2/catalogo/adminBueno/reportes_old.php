<?php 
require_once 'menu/menu.php';
if(!isset($_POST['fecha'])){
	$fecha=date('Y-m-d');
}else{
	$fecha=$_POST['fecha'];
}
?>
<style>
.modal-content {
    background-color: #f1f1f1;
  }
</style>
<div class="container">
  <h2>Reportes</h2> <hr>


<div class="form-group" align="center">
<form name="form1" method="post" action="" >
 <div class="form-group">
 <div class="col-sm-3"></div>
 <div class="col-sm-2 col-xs-4">
  <label for="textfield">Fecha desde </label>
  </div>
 <div class="col-sm-3 col-xs-8 ">
  <input type="date" class="form-control" name="fecha" value="<?php echo $fecha ?>" onchange="this.form.submit()">
  </div>
  <div class="form-group">
  <div class="col-sm-3 col-xs-1">
  <!--<input type="submit" name="button" class="btn btn-warning" value="Seleccionar">-->
  </div>
  </div>
  <div class="col-xs-4"></div>
</div>
  <br><hr>
  <div class="form-group">
  <div class="col-sm-4 col-xs-2"></div>
  	<div class="col-sm-3 col-xs-8">
      <input type="text" class="form-control" width="500px" id="filtrar" <?php echo $may ?>  placeholder="Buscar...">
      </div>
    </div>
</form>
</div>
<br><br>
<?php //echo $fecha ?>
<div class="table-responsive">

<div class="container">

  <table class="table table-hover table-striped table-condensed">
    <thead>
      <tr>
        <th>#</th>
        <th>Envío</th>
        <th>Fecha</th>
        <th>Total</th>
        <th>Tipo Pago</th>
        <th>Estado</th>
    <th>Acciones</th>
      </tr>
    </thead>
    <tbody class="buscar">
<?php
$num       = 0;
$sam       = 'SELECT * FROM car_pedido WHERE idCliente="' . NUM_CLIENTE . '" AND fechaPedido >="'.$fecha.'" ORDER BY idPedido';
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
        <td align="right"><?php  echo number_format($row['total'], 2, ',', '.')?></td>
        <td><?php echo $row['estadoPedido'] ?></td>
        <td><?php echo $row['tipoPago'] ?></td>
    <td>
    <a href="Formulario_vendedor.php?slug=<?php echo SLUG ?>&idVendedor=<?php echo $row['idVendedor'] ?>" title="Actualizar Vendedor"><font color='#33666CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idVendedor=<?php echo $row['idVendedor'] ?>&modulo=vendedor" title="Borrar Vendedor"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
    </td>
      </tr>
	
 <?php }?>
		<td><?php echo $total ?></td>
    </tbody>
  </table>

</div>
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

<script>
  $('.ImgVideo').click(() => {
    $('.myframe').attr('src', 'https://www.youtube.com/embed/8GqhDeU3S3A');
  });

  $('.close').click(() => {
  $('.myframe').removeAttr('src');
});
</script>
</body>
</html>