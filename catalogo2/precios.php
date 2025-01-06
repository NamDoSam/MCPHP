<?php
require 'template/cenefa.php';
require 'template/menu.php';
require 'conexion/conexion.php';
//require 'archivos/sliderIconos.php';
?>
<style>
	.cajaPrecios{
		border: 1px #ccc solid;
		border-radius: 5px;
		padding: 10px;
		color: #808080;
	}
</style>
<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <br><!--<h3 class="section-heading" align="center">Categorias</h3>-->
<br><br><br><br>
<h3 class="section-heading" align="">30 Días Gratis<hr></h3>
<div style="background-color:#FFF; padding:50px">
<h5 align="center">Precios del Servicio<br><!--Promoción Válida hasta el 30 de Junio de 2021--></h5>
<hr>
<div align="center">
	
<div align="center"><img class="img-fluid" src="img/monedas.jpg">
<br><br>
<a href="form_30diasgratis.php"><button type="button" class="btn btn-warning">Probá los 30 días gratis, has clic aquí</button></a>
<br><hr>
<!--Al hacer click en el botón de abajo, estás aceptando los <a style="color: blue;" href="#">Términos y Condiciones</a> de Menú Catálogo.-->
<h4>Suscribite | Elige tu plan</h4><br>
<img class="img-fluid" src="img/mercadoPago-300x87.jpg" width="180"><br>
<img class="img-fluid" src="img/tarjetas.jpg" width="400" height="46">
<br><br>	
	
	

 <div class="row justify-content-md-center">
    <div class="col-lg-4">
		<div class="cajaPrecios" align="center">
			<div style="padding: 10px; background-color: #1D7A8A; color: #fff"><h6>Presencia web</h6></div><hr>
			<h5>$ 1.000 / mes</h5><hr>
		<a href="https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c9380847a3f2ebc017a4032fc0b0094" target="_blank"><button type="button" style="background-color:#1D7A8A"  class="btn btn-info">Suscribirme >></button></a>
		</div>
	 </div>
	 
    <div class=" col-lg-4">
		<div class="cajaPrecios" align="center">
			<div style="padding: 10px; background-color: #ff0202; color: #fff"><h6>Catálogo de Productos</h6></div><hr>
			<h5>$ 2.000 / mes</h5><hr>
		<a href="https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c938084776882c901776a6927fa0553" target="_blank"><button type="button" style="background-color:#ff0202" class="btn btn-info">Suscribirme >></button></a>
		</div>
	 </div>

    <div class="col-lg-4">
		<div class="cajaPrecios" align="center">
			<div style="padding: 10px; background-color: #578A1C; color: #fff"><h6>Catálogo + Carrito</h6></div><hr>
			<h5>$ 3.000 / mes</h5><hr>
		<a href="https://www.mercadopago.com.ar/subscriptions/checkout?preapproval_plan_id=2c9380847a3f2efc017a403767180097" target="_blank"><button type="button" style="background-color:#578A1C"  class="btn btn-info">Suscribirme >></button></a>
		</div>
	 </div>
  
</div>
	</div>
<br>
	

  
</div>
</div>
</div>

<div class="container" align="center">
<?php //require 'archivos/auspiciantes.php';?>
 </div>
 <br><br><br><br><br><br>

<?php require 'template/footer.php';?>