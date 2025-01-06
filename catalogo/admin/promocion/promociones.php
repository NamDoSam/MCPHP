<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$caracteres = 50;
?>
<!--<link rel="stylesheet" href="css/lightbox.min.css">-->
<link rel="stylesheet" type="text/css" href="<?php echo $url ?>draggable/css/styles.css">
<script src="<?php echo $url ?>draggable/css/jquery.min.js"></script>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
.row {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 0px;
    margin-left: -7.5px;
}
</style>
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

<table width="100%" border="0">
  <tr>
    <td>
    <a href="productosPromo.php?nvo=1&slug=<?php echo SLUG ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><button type="button" class="btn btn-secondary"><i class="fas fa-plus"></i> Adicionar Producto</button></a>
    </td>
    <td align="right">
    <!--<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="Cómo crear promociones" src="../img/videoTutorial.png" height="45px"></a>-->
    </td>
  </tr>
</table>
<br>
<div class="table-responsive" style="background-color:#FFFFFF; border:1px #99CC00 solid">  
<!--<div id="success" style="display:none;"></div> -->
<div class="row" style="background-color:#FFFFFF; border:1px #99CC00 solid">
	<div class="col-1" style="padding: 10px;" align="center">Ordenar</div>
	<div class="col-1" style="padding: 10px;">Imagen</div>
	<div class="col-4" style="padding: 10px;">Producto</div>
	<div class="col-4" style="padding: 10px;">Descripción</div>
	<div class="col-1" style="padding: 10px;" align="center">Precio</div>
	<!--<div class="col-2" style="padding: 10px;" align="center">Fecha Promo</div>-->
    <div class="col-1" style="padding: 10px;" align="center">Sacar</div>	
</div> 
<ul id="cities" class="sortable buscar">
<?php
$promo="SELECT * FROM productos WHERE idCliente='".NUM_CLIENTE."' AND (promo=1 || precioPromo > 0) ORDER BY ordenPromo";
$resultado = $mysqli->query($promo);
while ($row = $resultado->fetch_assoc()) {?>

<li class="ui-state-default" id="city_<?php echo $row['idProducto']?>">

  <div class="row">
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center"><font color='#CCCCCC'><i class='fas fa-expand-arrows-alt fa-lg'></i></font></div>
    
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid">
	<?php 
$carpeta = "../../imgCliente/".SLUG."/productos/";
$nombre_fichero = $carpeta.$row['idProducto'].".jpg";
					if (file_exists($nombre_fichero)) {?>
                     <div>
                      <a class="example-image-link" href="<?php echo $nombre_fichero."?ver=".time() ?>" data-lightbox="example-1">
                      <img class="example-image" height="50" src="<?php echo $nombre_fichero."?ver=".time() ?>" 
                      title="<?php echo $row['descripcion'] ?>"/></a>
                    </div>
				<?php }else{?>
                    <img src="../../imgCliente/0.jpg" height="50" />
                <?php }?>
    
    </div>
    <div class="col-4" style="padding: 7px; border-bottom:#CCC 1px solid"><?php echo $row['producto'] ?></div>
	<div class="col-4" style="padding: 7px; border-bottom:#CCC 1px solid">
     <a href="#" data-toggle="tooltip" data-html="true" title="<?php echo $row['descripcion'] ?>"><i class='fas fa-info-circle fa-lg'></i></a>
    <?php echo limitar_cadena($row['descripcion'], 40, "..."); ?></div>
        
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="right">
		<?php echo "<strike>".number_format($row['precio'], 2, ',', '.') ."</strike><br>".
		number_format($row['precioPromo'], 2, ',', '.')?>
	</div>

	<div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center">
	<a onclick="return confirmar()" href="../productos/rubro/acciones/estado.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&modulo=promo2"><font color="#FF0000"><i class='fa fa-tag fa-lg'></i></font></a>
	</div>
  </div>
</li>
<?php }?>

</ul>
</div>

</div>
<br><br><br><br><br>
<br>
<br>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <!--<button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>-->
        <h4 class="modal-title"><?php echo VIDEO_4 ?></h4>
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
<?php 
function limitar_cadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}?>
<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/y6BaN5QgNi8');
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
<?php require($url.'template/footer.php'); ?>