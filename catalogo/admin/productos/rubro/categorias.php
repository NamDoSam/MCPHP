<?php 
$url='../../';
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$categoria="SELECT item FROM rubros WHERE idItem=".$_GET['idItem']."";
$resul = $mysqli->query($categoria);
$item = $resul->fetch_assoc(); 
?>
<link rel="stylesheet" type="text/css" href="../../draggable/css/styles.css">
<script src="<?php echo $url ?>draggable/css/jquery.min.js"></script>
<div class="container">

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
<div class="container">
	<div style="padding-top:7px"><h3><a href="rubro.php?slug=<?php echo SLUG ?>"><i class="fas fa-reply fa-lg"></i></a> | <?php echo CATEGORIAS ?>  | <font size="5" color="#999"><?php echo $item['item'] ?></font></h3></div> <hr>
     
 <script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("../../draggable/ordenCategorias.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 
<table width="100%" border="0">
  <tr>
    <td>
    <a href="Formulario_categoria.php?slug=<?php echo SLUG ?>&idItem=<?php echo $_GET['idItem'] ?>&nvo=1"><button type="button" class="btn btn-secondary"><i class="fas fa-database" ></i> <?php echo BOTON_3 ?></button></a>
    </td>
    <td align="right">
    <!--<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
		<img class="ImgVideo" title="<?php echo VIDEO_2 ?>" src="../../img/videoTutorial.png" height="45px"></a>-->
    </td>
  </tr>
</table>
<br>
<div class="table-responsive" style="background-color:#FFFFFF; border:1px #99CC00 solid">  
<!--<div id="success" style="display:none;"></div> -->
<div class="row" style="background-color:#FFFFFF; border:1px #99CC00 solid">
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_1 ?></div>
	<div class="col-6" style="padding: 10px;"><?php echo TABLA_6 ?></div>
    <div class="col-2" style="padding: 10px;" align="center"><?php echo TABLA_2 ?></div>
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_3 ?></div>
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_4 ?></div>
	<div class="col-1" style="padding: 10px;" align="center"><?php echo TABLA_5 ?></div>
</div> 
<ul id="cities" class="sortable buscar">

<?php
$query_cities = $mysqli->query("SELECT ca.*,it.item,it.idItem FROM categorias ca, rubros it WHERE ca.idItem=".$_GET['idItem']." AND ca.idItem=it.idItem AND ca.ocultar=0 ORDER BY ca.ordenCat");
while ($row = $query_cities->fetch_assoc()) {?>
<li class="ui-state-default" id="city_<?php echo $row['idCat']?>">

  <div class="row">
    <div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center"><font color='#CCCCCC'><i class='fas fa-expand-arrows-alt fa-lg'></i></font></div>
    <div class="col-6" style="padding: 7px; border-bottom:#CCC 1px solid"><?php echo $row['categoria']?></div>
    <div class="col-2" style="padding: 7px; border-bottom:#CCC 1px solid" align="center"><a href="productos.php?slug=<?php echo SLUG ?>&idCat=<?php echo $row['idCat']?>&idItem=<?php echo $row['idItem'] ?>"><i class="fas fa-sign-in-alt fa-lg"></i></a></div>
	<div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center">
	<a href="Formulario_categoria.php?slug=<?php echo SLUG ?>&idItem=<?php echo $row['idItem'] ?>&idCat=<?php echo $row['idCat'] ?>"><font color="#FF00FF"><i class='fas fa-pencil-alt fa-lg'></i></font></a>
	</div>
	<div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center">
	<?php if($row['estado']==0){?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=categoria&idCat=<?php echo $row['idCat'] ?>&idItem=<?php echo $row['idItem'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }else{?>
<a href="acciones/estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=categoria&idCat=<?php echo $row['idCat'] ?>&idItem=<?php echo $row['idItem'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
	<?php }?>
	</div>
	
	<div class="col-1" style="padding: 7px; border-bottom:#CCC 1px solid" align="center">
	<a onclick="return confirmar()" href="acciones/borrarRegistros.php?slug=<?php echo SLUG ?>&idCat=<?php echo $row['idCat'] ?>&idItem=<?php echo $row['idItem'] ?>&modulo=categoria"><font color="#CCCCCC"><i class='fa fa-trash fa-lg'></i></font></a>
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
        <h4 class="modal-title"><?php echo VIDEO_2 ?></h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/rF47_V2Xymw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
		$('.myframe').attr('src', 'https://www.youtube.com/embed/rF47_V2Xymw');
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
</div>

<?php require($url.'template/footer.php'); ?>