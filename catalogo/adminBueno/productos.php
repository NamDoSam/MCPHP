<?php require_once('menu/menu.php');
$categoria="SELECT categoria FROM categorias WHERE idCat=".$_GET['idCat']."";
$resul = $mysqli->query($categoria);
$cat = $resul->fetch_assoc();
$caracteres = 50;
?>
<link rel="stylesheet" href="js/popup/css/lightbox.min.css">
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
<!--<script src="popup/js/lightbox-plus-jquery.min1.js"></script>-->
<div class="container">
<h2><a href="categoria.php?slug=<?php echo SLUG ?>&idItem=<?php echo $_GET['idItem']?>"><button type="button" class="btn btn-info"><< Volver</button></a> | Productos | <font size="5" color="#CCCCCC"><?php echo $cat['categoria'] ?></font></h2> <hr>

<script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("draggable/ordenProductos.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 

<div class="form-group" align="right">
  <a href="Formulario_productos.php?slug=<?php echo SLUG ?>&nvo=1&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-database" ></i> Nuevo Producto</button></a>
	
	<!--MODAL-->
	<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="Cómo crear Productos" src="videoTuto.jpg" height="45px"></a>
</div>

<div class="table-responsive">  
<div class="row">
	<div class="col-xs-1" style="padding: 10px;"><b>Ordenar</div>
	<div class="col-xs-1" style="padding: 10px;">Imagen</div>
	<div class="col-xs-2" style="padding: 10px;">Producto</div>
	<div class="col-xs-2" style="padding: 10px;">Descripción</div>
	<div class="col-xs-1" style="padding: 10px;">Precio</div>
	<div class="col-xs-1" style="padding: 10px;">Promo</div>
    <div class="col-xs-1" style="padding: 10px;">Editar</div>
	<div class="col-xs-1" style="padding: 10px;">Estado</div>
    <div class="col-xs-1" style="padding: 10px;">Agotado</div>
	<div class="col-xs-1" style="padding: 10px;">Borrar</b></div>
</div> 
<ul id="cities" class="sortable buscar">
<?php
$categoria="SELECT * FROM productos WHERE idCat=".$_GET['idCat']." AND ocultar=0 ORDER BY ordenPro";
$resultado = $mysqli->query($categoria);
while ($row = $resultado->fetch_assoc()) {?>

<li class="ui-state-default" id="city_<?php echo $row['idProducto']?>">
  <div class="row">
    <div class="col-xs-1" style="padding: 7px;" align="center"><i class='fa fa-arrows fa-lg'></i></div>
    
    <div class="col-xs-1" style="padding: 7px;">
	<?php 
  $carpeta = "../imgCliente/".SLUG."/productos/";
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
  $nombre_fichero = $carpeta.$row['idProducto'].".jpg";
					if (file_exists($nombre_fichero)) {?>
                     <div>
                      <a class="example-image-link" href="<?php echo $nombre_fichero."?ver=".time() ?>" data-lightbox="example-1">
                      <img class="example-image" height="50" src="<?php echo $nombre_fichero."?ver=".time() ?>" 
                      title="<?php echo $row['descripcion'] ?>"/></a>
                    </div>
				<?php }else{?>
                    <img src="../imgCliente/0.jpg" height="50" />
                <?php }?>
    
    </div>
    <div class="col-xs-2" style="padding: 7px;"><?php echo $row['producto']; if($row['codigo']) echo "<br>Cod. ".$row['codigo'] ?></div>
	<div class="col-xs-2" style="padding: 7px;"><a href="#" data-toggle="tooltip" data-html="true" title="<?php echo $row['descripcion'] ?>"><i class='fa fa-file-text fa-lg'></i></a> 
	<?php $cadena=$row['descripcion']; echo substr($cadena, 0, $caracteres).'...'; ?></div>
    <div class="col-xs-1" style="padding: 7px;"><?php echo number_format($row['precio'], 2, ',', '.') ?></div>
    <div class="col-xs-1" style="padding: 7px;"><?php echo number_format($row['precioPromo'], 2, ',', '.') ?></div>
    
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<a href="Formulario_productos.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
	</div>
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<?php if($row['estado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=producto&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=producto&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>
	</div>
    <div class="col-xs-1" style="padding: 7px;" align="center">
	<?php if($row['agotado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&agotado=1&modulo=stock&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#00CC00'><i class='fa fa-cubes fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&agotado=0&modulo=stock&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#FF0000'><i class='fa fa-cubes fa-lg'></i></font></a>
	<?php }?>
	</div>

	<div class="col-xs-1" style="padding: 7px;" align="center">
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&idItem=<?php echo $_GET['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>&modulo=producto"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
	</div>
  </div>
</li>
<?php }?>

</ul>
</div>
</div>
<br>
<br>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Cómo crear Productos</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/CgcgxKbGVyQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/CgcgxKbGVyQ');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>
</html>