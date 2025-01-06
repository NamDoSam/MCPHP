<?php 
session_start();
require_once('menu/menu.php');
$config='../catalogo/imgCliente/';
$host= $_SERVER["HTTP_HOST"];
if($host=='localhost'){
	$url="http://localhost/MenuCatalogo2.0/catalogo/?c=";
} else {
	$url="https://menucatalogo.com/catalogo2/catalogo/?c=";
}
?>
<link rel="stylesheet" href="popup/css/lightbox.min.css">
<script type="text/javascript">
        $(document).ready(function () {

            (function ($) {

                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="container">
<h2>Clientes</h2> <hr>

<div class="form-group row">
  <div class="col-xs-3"></div>
  <div class="col-xs-4">
    <input type="text" class="form-control" name="buscar" id="filtrar" placeholder="Buscar...">
  </div>
  <div class="col-xs-4">
    <a href="FormularioCliente.php?nvo=1&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-database" ></i> Nuevo Cliente</button></a>
  </div>
</div>



<div class="table-responsive">              
  <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Nom Fantasia</th>
        <th>Cliente</th>
        <th>Email</th>
		<th>Password</th>
        <th>Teléfono</th>
        <th>Tipo Cat.</th>
        <th>Fecha Alta | Vto.</th>
        <th>Acciones</th>
    </thead>
<tbody class="buscar"> 
<?php
$num=1;
//print_r($_SESSION);
if($_SESSION['idConcentrador'] == 1) 
	$where=""; 
else 
	$where="WHERE idConcentrador=".$_SESSION['idConcentrador'];
	
$categoria="SELECT cl.*, ef.nombre as publi FROM clientes cl LEFT JOIN esponsor_fijo ef ON cl.sponsor=ef.idFijo ORDER BY cl.nomFantasia";
$resultado = $mysqli->query($categoria);
while ($row = $resultado->fetch_assoc()) {?>
    
      <tr>
        <td><?php echo $num++ ?></td>
        <td><a href="#" data-toggle="tooltip" title="Más Información"><font color="#f033ca"><i class="fa fa-info-circle fa-lg"></i></font></a> <?php echo $row['nomFantasia']."<br><small><strong>".$row['publi']."</strong></small>" ?></td>
        <td><?php echo $row['apellido'].", ".$row['nombre']?></td>
        <td><?php echo $row['email'] ?></td>
		<td><?php echo $row['pass'] ?></td>
        <td><?php echo $row['telefono'] ?></td>
        <td><?php echo $row['tipoCat'] ?></td>
        <td nowrap><?php  echo date("d-m-Y",strtotime($row['fechaAlta']))." | ";  require('script/vencimientoMes.php'); ?></td>
        <td nowrap>
          <a href="FormularioCliente.php?idCliente=<?php echo $row['idCliente'] ?>" data-toggle="tooltip" title="Actualizar Cliente"><font color="#0d78a2"><i class="fa fa-pencil fa-lg"></i></font></a>
          &nbsp;|&nbsp;
          <?php if($row['estado']==1){ ?>
          <a href="acciones/estado.php?modulo=cliente&estado=0&idCliente=<?php echo $row['idCliente'] ?>" data-toggle="tooltip" title="Desactivar Cliente"><font color="#1fa20d"><i class="fa fa-eye fa-lg"></i></font></a>
          <?php }else{ ?>
          <a href="acciones/estado.php?modulo=cliente&estado=1&idCliente=<?php echo $row['idCliente'] ?>" data-toggle="tooltip" title="Activar Cliente"><font color="red"><i class="fa fa-eye fa-lg"></i></font></a>
          <?php } ?>
          &nbsp;|&nbsp;
          <a href="<?php echo $url.$row['slug'] ?>" target="_blank" data-toggle="tooltip" title="Ver Catálogo"><font color="#12ccc1"><i class="fa fa-globe fa-lg"></i></font></a>
        
        
        &nbsp;|&nbsp;
          <a href="acciones/borrarCliente.php?idCliente=<?php echo $row['idCliente'] ?>" onclick="return confirmar()" data-toggle="tooltip" title="Borrar Cliente"><font color="#999"><i class="fa fa-trash fa-lg"></i></font></a>
          </td>
      </tr>
	<?php }?>  
</tbody>
</table>
</div>
	</div>
<br>
<br>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>