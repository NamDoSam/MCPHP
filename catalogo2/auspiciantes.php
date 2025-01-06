<?php
require 'template/cenefa.php';
require 'template/menu.php';
require 'conexion/conexion.php';
//require 'archivos/sliderIconos.php';
?>
<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="categorias" class="container">
  <br><!--<h3 class="section-heading" align="center">Categorias</h3>-->
<br><br><br>
<div style=" background-color:#FFFFFF; padding:10px" align="center">
<img src="img/<?php echo $_GET['ausp']."/".$_GET['ausp'].".jpg" ?>" class="img-fluid">
</div>
<div class="row">
<?php 
$sel="SELECT * FROM card_clientes WHERE slug='".$_GET['ausp']."' AND estado=0";
$m=$mysqli->query($sel);
$card = $m->fetch_assoc();
for($i=1;$i<=3;$i++){ ?>
<div class="col-sm-4">
<div class="card">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
  
    <img src="img/<?php echo $_GET['ausp']."/".$card["imagen_$i"] ?>" class="img-fluid"/>
    
    <a href="#!">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $card["titulo_$i"] ?></h5>
    <p class="card-text">
     <?php $cadena=$card["parrafo_$i"];
      $nueva_cadena4 = substr($cadena,0,90);
	  echo $nueva_cadena4."...";  ?>
    </p>
    <div align="right"><a href="#!" class="btn btn-primary">Leer más...</a></div>
  </div>
</div>
</div>
<?php }?>
</div>

<?php 
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"];
	$n++;
?> 
<div id="accordion" class="accordion">
    <div class="card mb-0">
        <div style="text-transform: uppercase" class="card-header collapsed" data-toggle="collapse"  aria-expanded="true" href="#collapse<?php echo $n ?>">
        <i class="fas fa-<?php echo $row['icono'] ?>"> &nbsp;</i>  <?php echo $_GET['c'] ?></div>
        <div id="collapse<?php echo $n ?>" class="card-body collapse show" data-parent="#accordion">
           <?php require 'archivos/auspiciante.php';?>
        </div> 
    </div>
</div>
<br>

 
 <br></div>
<h3 class="section-heading" align="center">Contacto SOEMM</h3>
<div class="container" align="center">
<?php //require 'archivos/auspiciantes.php';?>
 </div>
 <br><br><br><br><br><br>

<!--Icono Whatsapp-->
<div id="whatsapp-icon" style="z-index: 1500; position:fixed; right:10px; bottom:10px; text-align:center; padding:3px">
<a href="https://api.whatsapp.com/send?phone=11111111111" target="_blank">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/240px-WhatsApp.svg.png" width="65" height="65"></a>
</div>
<!--/////////////////-->

<?php require 'template/footer.php';?>