<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
<div class="container">
<h2>Contacto | Sucursales</h2> <hr>
     

<div class="form-group" align="right">
  <a href="Formulario_contacto.php?idSucursal=0&slug=<?php echo SLUG ?>"><button type="button" class="btn btn-success"><i class="fa fa-home fa-lg"></i> <?php echo BOTON_8 ?></button></a>
	
	<!--<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
			<img class="ImgVideo" title="<?php echo TEXTO_6 ?>" src="../img/videoTutorial.png" height="45px"></a>-->
</div>
<div class="table-responsive" style="background-color:#FFFFFF">  
<!--<div id="success" style="display:none;"></div> -->
<table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th><?php echo TABLA_15 ?></th>
        <th><?php echo TABLA_16 ?></th>
        <th>Whatsapp</th>
        <th><?php echo TABLA_17 ?></th>
        <th><?php echo TABLA_18 ?></th>
        <th><?php echo TABLA_9 ?></th>
        <th><?php echo TABLA_5 ?></th>
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
          echo $row['codigo']." ".$tel[$i]."<br>";
        }
        ?></td>
        <td><?php 
        $cel=explode(',',$row['whatsapp'] );
        for ($i=0; $i < count($cel); $i++) { $num=$i+1;
          echo $row['codigo']." ".$cel[$i]."<br>";
        }
        ?></td>
        <td><?php echo $row['direccion']." - ".$row['dpto']."<br>".$row['provincia']." - ".$row['pais']  ?></td>
        <td><?php echo $row['horario'] ?></td>
        <td align="center"><a href="Formulario_contacto.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $row['idSucursal'] ?>"><font color='#3366CC'><i class='fas fa-edit fa-lg'></i></font></a></td>
        <td align="center"><a onclick="return confirmar()" href="borrarRegistros.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $row['idSucursal'] ?>&modulo=sucursal"><font color="#999"><i class='fas fa-trash fa-lg'></i></font></a></td>
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
		  <!--<button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>-->
        <h4 class="modal-title"><?php echo TEXTO_6 ?></h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/3TLjWrkqnjY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
  <br><br><br><br>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/3TLjWrkqnjY');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>

<?php require($url.'template/footer.php'); ?>