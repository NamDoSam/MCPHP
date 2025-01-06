<?php 
$url='../../';
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$categoria="SELECT categoria FROM categorias WHERE idCat=".$_GET['idCat']."";
$resul = $mysqli->query($categoria);
$cat = $resul->fetch_assoc();
$caracteres = 50; 
?>
<link rel="stylesheet" type="text/css" href="../../draggable/css/styles.css">
<script src="<?php echo $url ?>draggable/css/jquery.min.js"></script>
<div class="container">

<style>
body{
	font-size: 14px;
}
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
<div class="container">
	<div style="padding-top:7px"><h3><a href="categorias.php?slug=<?php echo SLUG ?>&idItem=<?php echo $_GET['idItem'] ?>"><i class="fas fa-reply fa-lg"></i></a> | <?php echo PRODUCTOS ?>  | <font size="5" color="#999"><?php echo $cat['categoria'] ?></font></h3></div> <hr>
     
 <script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("../../draggable/ordenProductos.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 
<table width="100%" border="0">
  <tr>
    <td>
    <a href="Formulario_productos.php?slug=<?php echo SLUG ?>&idItem=<?php echo $_GET['idItem'] ?>&idCat=<?php echo $_GET['idCat'] ?>&nvo=1"><button type="button" class="btn btn-secondary"><i class="fas fa-database" ></i> <?php echo BOTON_4 ?></button></a>
    </td>
    <td align="right">
    <!--<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="<?php echo VIDEO_1 ?>" src="../../img/videoTutorial.png" height="45px"></a>-->
    </td>
  </tr>
</table>
<br>
<div class="table-responsive" style="background-color:#FFFFFF; border:1px #99CC00 solid">  
<!--<div id="success" style="display:none;"></div> -->
<div class="row" style="background-color:#FFFFFF; border:1px #99CC00 solid">
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_1 ?></div>
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_12 ?></div>
	<div class="col-2" style="padding: 10px;"><?php echo TABLA_7 ?></div>
    <div class="col-2" style="padding: 10px;"><?php echo TABLA_3 ?></div>
    <div class="col-1" style="padding: 10px;"><?php echo TABLA_4 ?></div>
    <div class="col-1" style="padding: 10px;"><?php echo TABLA_8 ?></div>
	<div class="col-4" style="padding: 10px;" align="center"><?php echo TABLA_9 ?> | <?php echo TABLA_10 ?> | <?php echo TABLA_8 ?> | <?php echo TABLA_11 ?> | <?php echo TABLA_5 ?></div>
</div> 
<ul id="cities" class="sortable buscar">

<?php
$query_cities = $mysqli->query("SELECT * FROM productos WHERE idCat=".$_GET['idCat']." AND ocultar=0 ORDER BY ordenPro");
while ($row = $query_cities->fetch_assoc()) {?>
<li class="ui-state-default" id="city_<?php echo $row['idProducto']?>">

  <div class="row">
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center"><font color='#CCCCCC'><i class='fas fa-expand-arrows-alt fa-lg'></i></font></div>
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid">
    <?php 
  $carpeta = "../../../imgCliente/".SLUG."/productos/";
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
                    <img src="../../../imgCliente/0.jpg" height="50" />
                <?php }?>
    
    </div>
    
    <div class="col-2" style="padding: 7px; border-bottom:#CCC 1px solid"><?php echo $row['producto']?></div>
    
    <div class="col-2" style="padding: 7px; border-bottom:#CCC 1px solid">
    <a href="#" data-toggle="tooltip" data-html="true" title="<?php echo $row['descripcion'] ?>"><i class='fas fa-info-circle fa-lg'></i></a>
    <?php echo limitar_cadena($row['descripcion'], 20, "..."); ?>
    </div>
    
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid"><?php echo number_format($row['precio'], 2, ',', '.') ?></div>
    
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid"><?php echo number_format($row['precioPromo'], 2, ',', '.') ?></div>
    
	<div class="col-4" style="padding: 7px; border-bottom:#CCC 1px solid" align="center">
<?php ///////////////EDITAR///////////////////////?>
	<a href="Formulario_productos.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color="#FF00FF"><i class='fas fa-pencil-alt fa-lg'></i></font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php ///////////////ESTADO///////////////////////?>
	<?php if($row['estado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=producto&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=producto&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php ///////////////PROMOCION///////////////////////?>
	<?php if($row['promo']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&promo=1&modulo=promo&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#00CC00'><i class='fa fa-tag fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&promo=0&modulo=promo&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#FF0000'><i class='fa fa-tag fa-lg'></i></font></a>
	<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php ///////////////AGOTADO///////////////////////?>	
    	<?php if($row['agotado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&agotado=1&modulo=stock&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#00CC00'><i class='fa fa-cubes fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&agotado=0&modulo=stock&idProducto=<?php echo $row['idProducto'] ?>&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#FF0000'><i class='fa fa-cubes fa-lg'></i></font></a>
	<?php }?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php ///////////////BORRAR///////////////////////?>   
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idProducto=<?php echo $row['idProducto'] ?>&idItem=<?php echo $_GET['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>&modulo=producto"><font color="#CCCCCC"><i class='fa fa-trash fa-lg'></i></font></a>
	</div>
  </div>
</li>
<?php }?>
</ul>
</div>
</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <!--<button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>-->
        <h4 class="modal-title"><?php echo VIDEO_1 ?></h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/CgcgxKbGVyQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
  <br><br><br><br><br>
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
		//alert('hola lalo');
		$('.myframe').attr('src', 'https://www.youtube.com/embed/CgcgxKbGVyQ');
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
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</div>

<?php require($url.'template/footer.php'); ?>