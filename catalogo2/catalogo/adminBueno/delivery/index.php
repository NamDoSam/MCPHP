
<section class="page-section bg-light" id="contacto">
  <div class="container">
<?php 
$consulta="SELECT * FROM contacto WHERE cliente=".NUM_CLIENTE."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
if($row['idContacto'] > 0){
$direccion=$row['direccion']." - ".$row['dpto']." - ".$row['provincia']." - ".$row['pais'];
?>
<h3 align="center" class="section-heading text-uppercase">Contacto</h3>

  <div align="center">
  <i class="fa-phone fa-2x"></i><font size="3"><strong>Horarios:</strong> <?php echo $row['horario']?></font>
  <br>
  	<a class="btn btn-default btn-sm" href="tel:<?php echo $row['telefono']?>" title="Llamar por Teléfono"><font size="4" color="#339999"><i class="fa fa-phone-square fa-2x"></i> <?php echo $row['telefono']?></font></a>
    <br>
  	<a class="btn btn-default btn-sm" href="https://api.whatsapp.com/send?phone=<?php echo $row['whatsapp']?>&text=Desde%20MenuQR:%0A" target="_blank" title="Enviar un Whatsapp"><font size="4" color="#339999"><img src="img/iconos/whatsapp.jpg" width="45"> <?php echo $row['whatsapp']?></font></a>
    
    <br>
    <a class="btn btn-default btn-sm" href="https://www.google.com.ar/maps/place/<?php echo $direccion?>" target="_blank" title="Ubicación en Google Maps">
    <font size="3" color="#339999"><img src="img/iconos/googleMaps.png" width="40"><font size="3"> <?php echo $direccion?></font></a>
<?php }?> 
<hr>

<font color="#000"; size="3"> Producido por &nbsp;</font>
<a href="https://menuqr.ga"><img src="img/logo_qr/logoLogin.png" width="150" target="_blank"></a>
</div>
</section>

<!-- DELIVERY
<div class="container"><img src="../img/iconos/googloMaps.png" width="100" height="123">

<h3 align="center" class="section-heading text-uppercase">Delivery</h3>
<div class="row">
  <div class="col-xs-3 col-md-6" align="center"><img src="img/delivery/delivery.png" width="200" height="134"></div>
  <div class="col-xs-3 col-md-6" align="center">
  <i class="fa-phone fa-2x"></i><font size="3">Llamanos de: 12 a 15 o de 20 a 23 hs<br>de Martes a Domingos</font>
  <br>
  	<a class="btn btn-default btn-sm" href="tel:261 789 9654"><font size="5" color="#339999"><i class="fa fa-phone-square fa-2x"></i> 261 155 93840</font></a>
    
    <br>
    <a class="btn btn-default btn-sm" href="https://www.google.com.ar/maps/place/Cervantes 1540 - Godoy Cruz - Mendoza" target="_blank">
    <font size="3" color="#339999"><i class="fa fa-map-marker fa-2x"></i><font size="3"> Cervantes 1540 - Godoy Cruz - Mendoza</font></a>
     
    
  </div>
</div>
-->