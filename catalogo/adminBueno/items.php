<?php require_once('menu/menu.php');?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
<div class="container">
	<h2>Rubros</h2> <hr>
     
 <script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("draggable/ajax.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 
	
<div class="form-group" align="right">
  <a href="Formulario_items.php?slug=<?php echo SLUG ?>&nvo=1"><button type="button" class="btn btn-warning"><i class="fa fa-database" ></i> Nuevo Rubro</button></a>
	
	<!--MODAL-->
	<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="Cómo crear un Rubro" src="videoTuto.jpg" height="45px"></a>
</div>
	
<div class="table-responsive">  
<!--<div id="success" style="display:none;"></div> -->
<div class="row">
	<div class="col-xs-1" style="padding: 10px;"></div>
	<div class="col-xs-1" style="padding: 10px;"><b>Ordenar</div>
	<div class="col-xs-3" style="padding: 10px;">Rubro</div>
	<div class="col-xs-1" style="padding: 10px;">Editar</div>
	<div class="col-xs-1" style="padding: 10px;">Estado</div>
	<div class="col-xs-1" style="padding: 10px;">Ir a Categorías</div>
	<div class="col-xs-1" style="padding: 10px;">Borrar</b></div>
</div> 
<ul id="cities" class="sortable buscar">

<?php
$query_cities = $mysqli->query('SELECT * FROM rubros WHERE idCliente="'.NUM_CLIENTE.'" AND ocultar=0 ORDER BY orden');

while ($row = $query_cities->fetch_assoc()) {?>
<li class="ui-state-default" id="city_<?php echo $row['idItem']?>">
  <div class="row">
	<div class="col-xs-1" style="padding: 7px;"></div>
    <div class="col-xs-1" style="padding: 7px;"><i class='fa fa-arrows fa-lg'></i></div>
    <div class="col-xs-3" style="padding: 7px;"><?php echo $row['item']?></div>
	<div class="col-xs-1" style="padding: 7px;">
	<a href="Formulario_items.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a>
	</div>
	<div class="col-xs-1" style="padding: 7px;">
	<?php if($row['estado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=items&idItem=<?php echo $row['idItem'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=items&idItem=<?php echo $row['idItem'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>
	</div>
	<div class="col-xs-1" style="padding: 7px;"><a href="categoria.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem']?>"><i class="fa fa-hand-o-right fa-lg"></i></div>
	<div class="col-xs-1" style="padding: 7px;">
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem'] ?>&modulo=items"><font color="#999"><i class='fa fa-trash fa-lg'></i></font></a>
	</div>
  </div>
</li>
<?php }?>

</ul>
</div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Cómo crear un Rubro</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/NUdYMc0OYx0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>


<script>
	$('.ImgVideo').click(() => {
		//alert('hola lalo');
		$('.myframe').attr('src', 'https://www.youtube.com/embed/NUdYMc0OYx0');
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
</body>
</html>