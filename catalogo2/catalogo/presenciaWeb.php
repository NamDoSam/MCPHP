
<style>
.modal-content {
    background-color: #f1f1f1;
	}
body{
	font-family: sans-serif;
}
</style>
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"> 
<div class="card" align="center"> 
<!--////////////CARRUSEL////////////////-->
  <div id="demo" class="carousel slide" data-ride="carousel">
  
  <!-- The slideshow -->
<div class="carousel-inner">
<?php 
$ex='';
$ver='';
 $j=0;
$directorio="imgCliente/".$slug."/presencia/";
$total = count(glob($directorio.'{*.jpg,*.jpeg,*.png}',GLOB_BRACE));
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


<?php
$cli="SELECT cl.nomFantasia,su.* FROM clientes cl, sucursales su
			 WHERE cl.idCliente='".$idCliente."' AND cl.idCliente=su.idCliente";   
$resultado = $mysqli->query($cli);
	$row = $resultado->fetch_assoc();
if($row['idSucursal'] > 0){
?>
    <div class="card-body">
      <h3 align="center"><strong> <?php echo $row['nomFantasia']?></strong> </h3>
      <p class="card-text"><?php echo $row['descripcion']?></p>
      <strong>Horario</strong><br>
       <font size=3;  color="#099"><i class="far fa-clock"></i> <?php echo $row['horario']?></font>
<br><br>
      <strong>Contacto</strong>
<br>
      <?php if($row['telefono']!=''){?>
	  <a  href="tel:<?php echo $row['telefono']?>">
      <font size=3; color="#099"><i class="fas fa-phone-alt"></i> <?php echo $row['telefono']?></font></a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <?php } if($row['celular']!=''){?>
      <a href="tel:<?php echo $row['celular']?>">
      <font size=3;  color="#099"><i class="fas fa-mobile-alt"></i> <?php echo $row['celular']?></font></a>
      <?php } if($row['whatsapp']!=''){?>
      <br>
      <div style="padding:5px;"></div>
      <a href="https://api.whatsapp.com/send?phone=<?php echo $row['whatsapp']?>&text=Desde%20MenuCatalogo:%0A" target="_blank">
      <font size=3  color="#099"><i class="fab fa-whatsapp"></i> <?php echo $row['whatsapp']?></a>
      <?php }if($row['email']!=''){?>
      <br>
      <div style="padding:5px;"></div>
      <a href="mailto:<?php echo $row['email']?>" target="_blank">
      <font size=4  color="#099"><i class="far fa-envelope"></i> <?php echo $row['email']?></a>
      <?php }?>


      <hr>
      <a href="https://www.google.com.ar/maps/place/<?php echo $row['direccion']." - ".$row['dpto']." - ".$row['provincia']." - ".$row['pais']?>" target="_blank">
      <font size=3  color="#099"><i class="fas fa-map-marker-alt"></i> <?php echo $row['direccion']." - ".$row['dpto']."<br>".$row['provincia']." - ".$row['pais']?></a>
      
      <?php if($row['facebook']!='' || $row['instagram']!=''){?>
      <hr>
          Seguinos en:
          <?php if($row['facebook']!=''){?> 
          &nbsp;&nbsp;
          	<a href="<?php echo $row['facebook']?>" target="_blank"><i style="color:#00C" class="fab fa-facebook fa-2x"></i></a>
          <?php }if($row['instagram']!=''){?>
          &nbsp;&nbsp;
          	<a style="color: #F06;" href="<?php echo $row['instagram']?>" target="_blank"><i style="color:#F3C" class="fab fa-instagram fa-2x"></i></a>
      <?php }}}?>
     
  </div>
  <br>
</div>
</div>
</div>
</div>

<br><br><br><br><br><br>

