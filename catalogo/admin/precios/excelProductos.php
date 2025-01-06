<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');?>
<div class="container">
<h2><?php echo  BOTON_15 ?></h2><hr> 
<!--<link rel="stylesheet" href="../popup/css/lightbox.min.css">-->
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>

	
<div align="center">
<form class="form-inline">
    
    <div class="form-group">
      <a href="bajarExcel.php?idCliente=<?php echo NUM_CLIENTE ?>&idProducto=0"><button type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-down fa-lg" aria-hidden="true"></i> <?php echo  BOTON_7 ?> <i class="fa fa-file-excel-o" aria-hidden="true"></i></button></a>
    </div>
	&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form-group">
      <a href="subirExcel.php?idCliente=<?php echo NUM_CLIENTE ?>&slug=<?php echo SLUG ?>&idProducto=0"><button type="button" class="btn btn-success"><i class="fa fa-arrow-circle-up fa-lg" aria-hidden="true"></i> <?php echo  BOTON_6 ?> <i class="fa fa-file-excel-o" aria-hidden="true"></i></button></a>
    </div>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<div align="right"><a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
			<img class="ImgVideo" title="<?php echo VIDEO_5 ?>" src="../img/videoTutorial.png" height="45px"></a>
        </div>
		
  </form>
</div>
<br>
<div class="table-responsive">          
  <table class="table table-hover" style="background-color:#FFFFFF">
    <thead>
      <tr>
        <th><?php echo TABLA_12 ?></th>
        <th><?php echo TABLA_6 ?></th>
        <th><?php echo TABLA_7 ?></th>
        <th><?php echo TABLA_13 ?></th>
        <th><?php echo TEXTO_3 ?></th>
        <th><?php echo TABLA_8 ?></th>
        <th><?php echo TABLA_14 ?></th>
      </tr>
    </thead>
    
    <tbody class="buscar">
<?php 
$num=0;
$categoria='SELECT pr.*,ca.categoria FROM productos pr,categorias ca WHERE pr.idCliente="'.NUM_CLIENTE.'" AND pr.idCat=ca.idCat ORDER BY pr.idCat,pr.ordenPro';
$resultado = $mysqli->query($categoria);
while($row = $resultado->fetch_assoc()){
	$num++;

?>  
      <tr <?php echo $promo ?>>
        <td><?php $nombre_fichero = "../../imgCliente/".SLUG."/productos/".$row['idProducto'].".jpg";
					if (file_exists($nombre_fichero)) {?>
                     <div>
                      <a class="example-image-link" href="<?php echo $nombre_fichero."?ver=".time() ?>" data-lightbox="example-1">
                      <img class="example-image" height="50" src="<?php echo $nombre_fichero ?>" 
                      title="<?php echo $row['descripcion'] ?>"/></a>
                    </div>
				<?php }else{?>
                    <img src="../../imgCliente/0.jpg" height="50" />
                <?php }?></td>
        <td><?php echo $row['categoria'] ?></td>
        <td><?php echo $row['producto'] ?></td>
        <td><?php echo $row['descripcion'] ?></td>
        <td><?php echo number_format($row['precio'], 2, ',', '.') ?></td>
        <td><?php echo number_format($row['precioPromo'], 2, ',', '.') ?></td>
        <td><?php echo $row['ordenPro'] ?></td>
        </td> 
      </tr>
<?php }?>
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
        <h4 class="modal-title"><?php echo VIDEO_5 ?></h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/y6BaN5QgNi8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>


  </div>
  <br><br><br><br><br>
</div>

<script>
	$('.ImgVideo').click(() => {
		//alert('hola lalo');
		$('.myframe').attr('src', 'https://www.youtube.com/embed/y6BaN5QgNi8');
			/*$("#ex1").modal({
				escapeClose: false,
				clickClose: false,
				showClose: false
			});*/
	});
	
	$('.close').click(() => {
	//alert('hola lalo');
	$('.myframe').removeAttr('src');
});
</script>

<?php require($url.'template/footer.php'); ?>