<?php
require 'template/cenefa.php';
require 'template/menu.php';
require 'conexion/conexion.php';
echo "<br><br><br>";
require 'archivos/sliderIconos.php';
$titulo=isset($_GET['c'])?$_GET['c']:'';
$dpto=isset($_POST['dpto'])?$_POST['dpto']:'';
if($_GET['cat']){
	$cat=explode('*',$_GET['cat']); 
	$titulo = $cat[0];
	$idCat  = $cat[1];
	$rub    = ''; 
	$limit='';
}
?>

<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="categorias" class="container">
  <br><!--<h3 class="section-heading" align="center">Categorias</h3>-->

<?php
	$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"];
	$n++;
?> 
<div id="accordion" class="accordion">
    <div class="card mb-0">
        <div style="text-transform: uppercase" class="card-header collapsed" data-toggle="collapse"  aria-expanded="true" href="#collapse<?php echo $n ?>">
        <i class="fas fa-<?php echo $row['icono'] ?>"> &nbsp;</i>  <?php echo $titulo ?></div>
        <div id="collapse<?php echo $n ?>" class="card-body collapse show" data-parent="#accordion">
           <?php require 'archivos/intro.php';?>
        </div> 
    </div>
</div>
<br>

 
 <br></div>

<!--<h3 class="section-heading" align="center">Auspiciantes</h3>
<div class="container" align="center">
<?php //require 'archivos/auspiciantes.php';?>-->
 </div>
 <br><br><br><br><br><br>

<?php require 'template/footer.php';?>