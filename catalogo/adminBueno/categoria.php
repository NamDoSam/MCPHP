<?php 
require_once('menu/menu.php');
$categoria="SELECT item FROM rubros WHERE idItem=".$_GET['idItem']."";
$resul = $mysqli->query($categoria);
$item = $resul->fetch_assoc();
?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
<div class="container">
<h2><a href="items.php?slug=<?php echo SLUG ?>"><button type="button" class="btn btn-info"><< Volver</button></a> | Categorías  | <font size="5" color="#CCCCCC"><?php echo $item['item'] ?></font></h2> <hr>
 <script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("draggable/ordenCategorias.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 
<div class="form-group" align="right">
  <a href="Formulario_categoria.php?slug=<?php echo SLUG ?>&slug=<?php echo SLUG ?>&nvo=1&idCat=<?php echo $_GET['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><button type="button" class="btn btn-warning"><i class="fa fa-database" ></i> Nueva Categoria</button></a>
	
	<!--MODAL-->
	<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="Cómo crear una Categoría" src="videoTuto.jpg" height="45px"></a>
</div>

<div class="table-responsive">  
<div class="row">
	<div class="col-xs-1" style="padding: 10px;"></div>
	<div class="col-xs-1" style="padding: 10px;"><b>Ordenar</div>
	<div class="col-xs-3" style="padding: 10px;">Categoría</div>
	<div class="col-xs-1" style="padding: 10px;">Editar</div>
	<div class="col-xs-1" style="padding: 10px;">Estado</div>
	<div class="col-xs-1" style="padding: 10px;">Ir a Productos</div>
	<div class="col-xs-1" style="padding: 10px;">Borrar</b></div>
</div> 
<ul id="cities" class="sortable buscar">

<?php
$categoria="SELECT ca.*,it.item,it.idItem FROM categorias ca, rubros it WHERE ca.idItem=".$_GET['idItem']." AND ca.idItem=it.idItem AND ca.ocultar=0 ORDER BY ca.ordenCat";
$resultado = $mysqli->query($categoria);
while ($row = $resultado->fetch_assoc()) {?>

<li class="ui-state-default" id="city_<?php echo $row['idCat']?>">
  <div class="row">
	<div class="col-xs-1" style="padding: 7px;"></div>
    <div class="col-xs-1" style="padding: 7px;"><i class='fa fa-arrows fa-lg'></i></div>
	<div class="col-xs-3" style="padding: 7px;"><?php echo $row['categoria'] ?></div>
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<a href="Formulario_categoria.php?slug=<?php echo SLUG ?>&idCat=<?php echo $row['idCat'] ?>&idItem=<?php echo $_GET['idItem'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
	</div>
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<?php if($row['estado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=categoria&idItem=<?php echo $row['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=categoria&idItem=<?php echo $row['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>
	</div>
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<a href="productos.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem']?>&idCat=<?php echo $row['idCat']?>"><i class="fa fa-hand-o-right fa-lg"></i></a>
	</div>
	
	<div class="col-xs-1" style="padding: 7px;" align="center">
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>&modulo=categoria"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
	</div>
  </div>
</li>
<?php }?>

</ul>
</div>
</div>
<br>
<br>
<br>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Cómo crear una Categoría</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/rF47_V2Xymw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/rF47_V2Xymw');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>

</body>
</html>