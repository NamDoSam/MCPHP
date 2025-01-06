<?php require_once("../../conexion/conexion.php"); ?>
<h2>Consola de Pedidos</h2><hd>
<div class="row">
	<div class="col-sm-12">
    <caption><button class="btn btn-primary">Agregar Nuevo <i class="fa fa-plus"></i></button></caption><br><br>
<div class="table-responsive">
  <table class="table table-hover table-condensed table-bordered">
        	<tr>
            	<td>Envio</td>
                <td>Nombre</td>
                <td>Teléfono</td>
                <td>Direccion</td>
                <td>Fecha</td>
                <td>Estado</td>
                <td>Eliminar</td>
            </tr>
<?php 
$num=0;
$fecha=date('Y-m-d');
$resultado = $mysqli->query("SELECT * FROM car_pedido WHERE  fechaPedido LIKE '".$fecha."%'");
while($row = $resultado->fetch_assoc()){
	$num++;
?>
            <tr>
            	<td><?php echo $row['envio'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['telefono'] ?></td>
                <td><i class="fa fa-map-marker fa-lg"></i> <?php echo $row['direccion'] ?></td>
                <td><?php echo $row['fechaPedido'] ?></td>
                <td><button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarEstado"><i class="fa fa-pencil"></i> <?php echo $row['estado'] ?></button></td>
                <td><button class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></td>
            </tr>
<?php }?>
        </table>
    </div>
</div>
</div>