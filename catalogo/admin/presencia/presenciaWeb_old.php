<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
   
<div class="container">

<h2>Presencia Web</h2> <hr>

<div align="center">
  <h4>Carrusel de imágenes</h4>
  <p>Hasta 5 imágenes de 800px</p>
  
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">  
 
 <div class="row">
 <?php 
 $k=0;

 $img="";
 $elem=array();
 $directorio="../../imgCliente/".SLUG."/presencia/";

	$dir = opendir($directorio);
	for($i=0;$i<=6;$i++){
	$elemento = readdir($dir);
		if( $elemento != "." && $elemento != ".."){
		$k++;
		$imag=explode(".",$elemento);
		$nombre_fichero=$directorio.$elemento;
		if($elemento){	?>
        
			<img src="<?php echo $nombre_fichero ?>" width="50">
        
        &nbsp;
        <a href="" title="Borrar imagen"><i style="color:red" class="far fa-times-circle"></i></a>
        &nbsp;&nbsp;
        <?php }else{ $i=6;?>
        <a href="" title="Nueva imagen" id="btmodal"  data-toggle="modal" data-target="#myModal" data-nom="lalona">
        	<i class="far fa-image fa-2x"></i>
        </a>
<?php }}}?>
	

 </div>
<br>  
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
      <img src="<?php echo $ver ?>" width="400">
    </div>
    <?php }else {?>
    
    <div class="carousel-item">
      <img src="<?php echo $ver ?>" width="400">
    </div>
   
  <?php }}}?> 
     </div>

     
 
     
     
       <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
 
  <!--////////////FIN CARRUSEL////////////////-->
  
    <!--<img class="card-img-top" src="https://i.blogs.es/ed4d47/fondos-oled-1/1366_2000.webp" alt="Card image" style="width:100%">-->
    
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
  <br>
</div>
</div>
</div>
</div>
</div>

<script>
	$(document).on("click", "#btmodal", function() {
		var nombre = $(this).data('nom');
	
		$("#nombre").val(nombre);
	})
</script> 

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Subir Imagen N° <?php echo $i?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" align="center" style="background-color: white;">
	<form method="post" enctype="multipart/form-data" action="acciones/subirImagen.php?slug=<?php echo SLUG ?>&id=<?php echo $i?>">
          <input type="text" name="imag" id="nombre"/>
                    <i class="far fa-image fa-5x"></i><br>
               
                <br><br>
         <input type="file" name="imagen" class="form-control" accept=".jpg, .jpeg, .png" required>
    	<br><br>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
    </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
<!-- Fin The Modal -->


<br><br><br><br><br><br>
<?php require($url.'template/footer.php'); ?>