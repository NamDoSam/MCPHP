<?php
require 'template/cenefa.php';
require 'template/menu.php';
require 'conexion/conexion.php';
require 'archivos/buscador.php';
?>
<!--slider de iconos-->
<?php require 'archivos/sliderIconos.php';?>
	
<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="categorias" class="container">
  <br><h3 class="section-heading" align="center">Categorias</h3>

<?php
$rub=$_GET['c'];
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"];
$n=0;
$sel="SELECT * FROM item_categorias";
$m=$mysqli->query($sel);
while($row = $m->fetch_assoc()){
	
	$sql="SELECT COUNT(idCliente) as cant FROM clientes WHERE item='".$row['idCat']."' AND estado=1";
	$p=$mysqli->query($sql);
	$pro = $p->fetch_assoc();
	
if($pro['cant'] > 0){	
	$n++;
	$rubro=$row['categoria'];
?> 
    <div id="accordion" class="accordion">
        <div class="card mb-0">
            <div class="card-header collapsed" data-toggle="collapse"  aria-expanded="true" href="#collapse<?php echo $n ?>">
			<i class="fas fa-<?php echo $row['icono'] ?>"> &nbsp;</i> <?php echo $rubro ?></div>
            <div id="collapse<?php echo $n ?>" class="card-body collapse show" data-parent="#accordion">
               <?php require 'archivos/intro.php';?>
            </div> 
        </div>
   </div>
   <br>
 <?php }}?>
 
 <br></div>
<!--////////////////AUSPICIANTES///////////////////////-->
<!--<h3 class="section-heading" align="center">Concentradores</h3>
<div class="container" align="center">
<?php 
	//require 'archivos/auspiciantes.php';?>
 </div>
 <br><br><br><br><br><br>

<div id="whatsapp-icon" style="z-index: 1500; position:fixed; right:10px; bottom:10px; text-align:center; padding:3px">
<a href="https://api.whatsapp.com/send?phone=54 9 2617 00-0153&text=Desde%20MenuCatalogo:%0A" target="_blank">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/240px-WhatsApp.svg.png" width="65" height="65"></a>
</div>-->

<!--/////////////////-->

<?php require 'template/footer.php';?>

<!--https://seosoftware.info/es/google-maps-scraper/#free-download-->
