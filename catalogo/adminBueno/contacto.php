<?php require_once('menu/menu.php');?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
<div class="container">
<h2>Contacto | Sucursales</h2> <hr>
     

<div class="form-group" align="right">
  <a href="Formulario_contacto.php?idSucursal=0&slug=<?php echo SLUG ?>"><button type="button" class="btn btn-success"><i class="fa fa-home fa-lg"></i> Nueva Dirección</button></a>
	
	<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
			<img class="ImgVideo" title="Cómo crear contacto o sucursales" src="videoTuto.jpg" height="45px"></a>
</div>
<div class="table-responsive">  
<!--<div id="success" style="display:none;"></div> -->
<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Nombre Fantasía</th>
        <th>Teléfono/s</th>
        <th>Whatsapp</th>
        <th>Dirección</th>
        <th>Horario</th>
        <th>Editar</th>
        <th>Borrar</th>
      </tr>
    </thead>
    <tbody>
<?php 
$num=0;
$sucursales="SELECT * FROM sucursales WHERE idCliente='".NUM_CLIENTE."'";
$resultado = $mysqli->query($sucursales);
while($row = $resultado->fetch_assoc()){
  $num++;
?> 
      <tr>
        <td><?php echo $num ?></td>
        <td><?php echo $row['nomFantasia'] ?></td>
        <td><?php 
        $tel=explode(',',$row['telefono'] );
        for ($i=0; $i < count($tel); $i++) { $num=$i+1;
          echo "<b>T-$num</b>&nbsp;&nbsp; ".$tel[$i]."<br>";
        }
        ?></td>
        <td><?php 
        $cel=explode(',',$row['whatsapp'] );
        for ($i=0; $i < count($cel); $i++) { $num=$i+1;
          echo "<b>W-$num</b>&nbsp;&nbsp; ".$cel[$i]."<br>";
        }
        ?></td>
        <td><?php echo $row['direccion']." - ".$row['dpto']."<br>".$row['provincia']." - ".$row['pais']  ?></td>
        <td><?php echo $row['horario'] ?></td>
        <td><a href="Formulario_contacto.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $row['idSucursal'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a></td>
        <td><a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $row['idSucursal'] ?>&modulo=sucursal"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a></td>
      </tr>
<?php } ?>
    </tbody>
  </table>
</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Cómo crear contacto o sucursales</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/3TLjWrkqnjY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/3TLjWrkqnjY');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>


</body>
</html>