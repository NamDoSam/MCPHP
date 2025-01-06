<div align="center">
  <h4>Carrusel de imágenes</h4>
  <p>Puede subir hasta 5 imágenes</p>
  
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">  

 <?php 
 $k=0;

 $img="";
 $elem=array();
 $directorio="../../imgCliente/".SLUG."/presencia/";
 if (!file_exists($directorio)) {
    // Create a new file or direcotry
    mkdir($directorio, 0777, true);
}
 
$total = count(glob($directorio.'{*.jpg,*.jpeg,*.png}',GLOB_BRACE));

	$dir = opendir($directorio);
		while($elemento = readdir($dir)){
			if( $elemento != "." && $elemento != ".."){
			$k++;
			$imag=explode(".",$elemento);
			$nombre_fichero=$directorio.$elemento;
			?>
			
				<img src="<?php echo $nombre_fichero ?>" width="37">
			
			
			<a href="acciones/borrarImagen.php?imagen=<?php echo $directorio.$elemento?>&slug=<?php echo SLUG ?>" title="Borrar imagen"><i style="color:red" class="far fa-times-circle"></i></a>
			&nbsp;
			<?php   }} 
			if($total < 5){ ?>
			<a href="" title="Nueva imagen" id="btmodal"  data-toggle="modal" data-target="#myModal" data-nom="<?php echo $k?>">
				<i class="far fa-image fa-2x"></i>
			</a>
			<?php }?>
	


<hr>
  <div class="card">

<!--////////////CARRUSEL////////////////-->
  <div id="demo" class="carousel slide" data-ride="carousel">
  
  <!-- The slideshow -->
  <div class="carousel-inner">
<?php 

$ex='';
$ver='';
 $j=0;
$directorio="../../imgCliente/".SLUG."/presencia/";
	$dir = opendir($directorio);
	while ($elemento = readdir($dir)){		

if( $elemento != "." && $elemento != ".."){
	//$extension = explode(".",$elemento);
	$j++;
	$ver=$directorio.$elemento;
	?>
    
  <?php if($j==1) {?>
    <div class="carousel-item active">
      <img src="<?php echo $ver ?>" width="100%">
    </div>
    <?php }else {?>
    
    <div class="carousel-item">
      <img src="<?php echo $ver ?>" width="100%">
    </div>
   
  <?php }}}?> 
     </div>

     
 
     
<?php if($total > 1) {?>     
       <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
 <?php }?> 
</div>