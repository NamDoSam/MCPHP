<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$menu=isset($_GET['menu'])? $_GET['menu'] : 1;
$resultado = $mysqli->query("SELECT * FROM car_configuracion WHERE  idCliente='".NUM_CLIENTE."'");
$row = $resultado->fetch_assoc();
?>
<br>
<link rel="stylesheet" type="text/css" href="configuracion/conf.css">
    <div class="container-fluid">
        <div class="row">    
            <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3" style="z-index: 99999;">
                <ul class="sidenav admin-sidenav list-unstyled">
                    <li><a href="ConfiguracionShopcar.php?slug=<?php echo $_GET['slug'] ?>&menu=1">Configurar Tienda</a></li>
                    <li><a href="ConfiguracionShopcar.php?slug=<?php echo $_GET['slug'] ?>&menu=2">Configurar Envío</a></li>
                    <li><a href="ConfiguracionShopcar.php?slug=<?php echo $_GET['slug'] ?>&menu=3">Métodos de Cobro</a></li>
                    <!--<li><a href="#">NavLink 4</a></li>
                    <li><a href="#">NavLink 5</a></li>
                    <li><a href="#">NavLink 6</a></li>-->                  
                </ul>
            </div> <!-- /#admin-sidebar -->
            <div id="admin-main-control" class="col-md-10 p-x-3 p-y-1">
                <div class="content-title m-x-auto">
                    <!--<i class="fa fa-dashboard"></i> <h4><strong>Configuración de la tienda</strong></h4>-->
                </div>
				
                <div class="rectangulo">
                <?php 
				if($menu==1){
					require('configuracion/estado.php');
				}
				if($menu==2){
					require('configuracion/envio.php');
				}
				if($menu==3){
					require('configuracion/cobro.php');
				}
				?>
                </div>
            </div> <!-- /#admin-main-control -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->


<!-- Modal I -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configuracion general de la tienda</h5>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/H_uC-y9vuzQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<!-- Modal II -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configuracion general de la zona de envío</h5>
      </div>
      <div class="modal-body">
        <iframe class="myframe2" width="100%" height="400" src="https://www.youtube.com/embed/1mTc4i_A9tw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<!-- Modal III -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cómo vincular a MercadoPago</h5>
      </div>
      <div class="modal-body">
        <iframe class="myframe13" width="100%" height="400" src="https://www.youtube.com/embed/GQBI3ejNGh8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/H_uC-y9vuzQ');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe2').attr('src', 'https://www.youtube.com/embed/1mTc4i_A9tw');
	});
	
	$('.close').click(() => {
	$('.myframe2').removeAttr('src');
});
</script>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe3').attr('src', 'https://www.youtube.com/embed/kK6pq2DkuaA');
	});
	
	$('.close').click(() => {
	$('.myframe3').removeAttr('src');
});
</script>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe13').attr('src', 'https://www.youtube.com/embed/GQBI3ejNGh8');
	});
	
	$('.close').click(() => {
	$('.myframe13').removeAttr('src');
});
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script> 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>    
    
    
 <br><br><br><br><br><br><br>
<?php require($url.'template/footer.php'); ?>