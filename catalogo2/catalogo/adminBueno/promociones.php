	<?php require_once('menu/menu.php');
$caracteres = 50;
?>
<link rel="stylesheet" href="popup/css/lightbox.min.css">

<!--<script src="popup/js/lightbox-plus-jquery.min1.js"></script>-->
<div class="container">
<h2>Promociones</h2> <hr>

<script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("draggable/ordenPromo.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 

<div class="form-group" align="center">
  <a href="productosPromo.php?nvo=1&slug=<?php echo SLUG ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" ></i> Adicionar Producto</button></a>
  &nbsp;&nbsp;&nbsp;&nbsp;
		<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
			<img class="ImgVideo" title="Cómo crear promociones" src="videoTuto.jpg" height="45px"></a>
</div>

<div class="table-responsive">  
<div class="row">
	<div class="col-xs-1" style="padding: 10px;"><b>Ordenar</div>
	<div class="col-xs-2" style="padding: 10px;">Imagen</div>
	<div class="col-xs-2" style="padding: 10px;">Producto</div>
	<div class="col-xs-3" style="padding: 10px;">Descripción</div>
	<div class="col-xs-1" style="padding: 10px;">Precio</div>
	<div class="col-xs-2" style="padding: 10px;">Fecha Promo</div>
    <div class="col-xs-1" style="padding: 10px;">Acciones</div>
	
</div> 
<ul id="cities" class="sortable buscar">
<?php
$promo="SELECT * FROM productos WHERE idCliente='".NUM_CLIENTE."' AND (promo=1 || precioPromo > 0)";
$resultado = $mysqli->query($promo);
while ($row = $resultado->fetch_assoc()) {?>

<li class="ui-state-default" id="city_<?php echo $row['idProducto']?>">
  <div class="row">
    <div class="col-xs-1" style="padding: 7px;" align="center"><i class='fa fa-arrows fa-lg'></i></div>
    
    <div class="col-xs-1" style="padding: 7px;">
	<?php 
$carpeta = "../imgCliente/".SLUG."/productos/";
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
    <div class="col-xs-3" style="padding: 7px;"><?php echo $row['producto'] ?></div>
	<div class="col-xs-3" style="padding: 7px;"><a href="#" data-toggle="tooltip" data-html="true" title="<?php echo $row['descripcion'] ?>"><i class='fa fa-file-text fa-lg'></i></a> 
		<?php $cadena=$row['descripcion']; echo substr($cadena, 0, $caracteres).'...'; ?></div>
    <div class="col-xs-1" style="padding: 7px;">
		<strike><?php echo number_format($row['precio'], 2, ',', '.') ."</strike><br>".
		number_format($row['precioPromo'], 2, ',', '.')?>
	</div>
		
    <div class="col-xs-2" style="padding: 7px;">
		Inicio <?php 
		if(!empty($row['fechaInicio'])) echo date("d-m-Y",strtotime($row['fechaInicio']))."<br>Fin ";
		if(!empty($row['fechaFin'])) echo date("d-m-Y",strtotime($row['fechaFin'])) ?>
	</div>
    
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<!--<a href="Formulario_promo.php?producto=<?php echo $row['producto'] ?>&idPromo=<?php echo $row['idPromo'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
	&nbsp;|&nbsp;-->
	<?php if($row['promo']==1){?>
<a href="acciones/estado.php?estado=0&modulo=promo&slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?estado=1&modulo=promo&slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&idPromo=<?php echo $row['idPromo'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>
	&nbsp;|&nbsp;
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&modulo=promo"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
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
        <h4 class="modal-title">Cómo crear promociones</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/y6BaN5QgNi8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/C_B7fSpEuoU');
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