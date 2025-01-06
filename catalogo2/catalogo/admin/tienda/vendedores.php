<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
?>

<div class="container">

  <h2>Vendedores</h2> <hr>


<div class="form-group" align="right">
  <a href="formularioVendedor.php?slug=<?php echo SLUG ?>&idVendedor=0&idCliente=<?php echo NUM_CLIENTE ?>"><button type="button" class="btn btn-warning"><i class="fa fa-database" ></i> Nuevo Vendedor</button></a>
  <!--&nbsp;&nbsp;&nbsp;&nbsp;
    <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
      <img class="ImgVideo" title="Configuración de vendedores" src="videoTutorial.png" height="45px"></a>-->

  <!--MODAL
  <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
    <img class="ImgVideo" title="Cómo crear un Rubro" src="videoTuto.jpg" height="45px"></a>-->
</div>

<div class="table-responsive">

<div class="container">

  <table class="table table-hover" style="background-color:#FFF">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
    <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
<?php
$num       = 0;
$sam       = 'SELECT * FROM vendedores WHERE idCliente="' . NUM_CLIENTE . '" ORDER BY nombre';
$resultado = $mysqli->query($sam);
while ($row = $resultado->fetch_assoc()) {
    $num++;
    ?>
      <tr>
        <td><?php echo $row['nombre'] ?></td>
        <td><?php echo $row['telefono'] ?></td>
        <td><?php echo $row['email'] ?></td>
    <td>
    <a href="formularioVendedor.php?slug=<?php echo SLUG ?>&idVendedor=<?php echo $row['idVendedor'] ?>" title="Actualizar Vendedor"><font color='#33666CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a onclick="return confirmar()" href="configuracion/borrarRegistros.php?slug=<?php echo SLUG ?>&idVendedor=<?php echo $row['idVendedor'] ?>&modulo=vendedor" title="Borrar Vendedor"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
    </td>
      </tr>

 <?php }?>

    </tbody>
  </table>

</div>
<!-- Modal I -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <!--<button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>-->
        <h4 class="modal-title">Configuracion de vendedores</h4>
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
</div>
<script>
  $('.ImgVideo').click(() => {
    $('.myframe').attr('src', 'https://www.youtube.com/embed/8GqhDeU3S3A');
  });

  $('.close').click(() => {
  $('.myframe').removeAttr('src');
});
</script>

</div>

<?php require($url.'template/footer.php'); ?>
