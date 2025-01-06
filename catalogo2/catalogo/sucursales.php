<section class="page-section bg-light" id="contacto">
  <div class="container">
    <h4 align="center" class="section-heading text-uppercase"><?php echo CONTACTO ?></h4>
<hr> 
  <div align="center">  

<?php 
$consulta="SELECT * FROM sucursales WHERE idCliente=".$idCliente."";
	$resultado = $mysqli->query($consulta);
	while($row = $resultado->fetch_assoc()){
if($row['idSucursal'] > 0){
$direccion=$row['direccion']." - ".$row['dpto']." - ".$row['provincia']." - ".$row['pais'];
?>

<br><h4 style="color:#006f9b"> <?php echo $row['nomFantasia'] ?></h4>
<h6 style="color:#006f9b"> <?php echo $row['descripcion'] ?></h6>
  <i class="fa fa-clock fa-lg"></i> <font size="3"><strong><?php echo HORARIOS ?>:</strong> <?php echo $row['horario']?></font>
  <hr>
 <b><?php echo CONTACTO ?>:</b><br>
      <?php 
        $tel=explode(',',$row['telefono'] );
        for ($i=0; $i < count($tel); $i++) { $tel=$row['codigo']." ".$tel[$i] ?>
          <a class="btn btn-default btn-sm" href="tel:<?php echo $tel ?>" title="Llamar por Teléfono"><font size="4" color="#329999"><i class="fa fa-phone-square fa-lg"></i> <?php echo $tel ?></font></a> &nbsp;        
        <?php } ?>
    <br>
   

<!--<b>Whatsapp:</b><br>-->
      <?php 
        $tel=explode(',',$row['whatsapp'] );
        for ($i=0; $i < count($tel); $i++) { $cel=$row['codigo']." ".$tel[$i] ?>
          <a class="btn btn-default btn-sm" href="https://api.whatsapp.com/send?phone=<?php echo $cel ?>&text=Desde%20MenuCatalogo:%0A" target="_blank" title="Enviar un Whatsapp"><font size="4" color="#329999"><img src="img/iconos/whatsapp.jpg" width="30"> <?php echo $cel ?></font></a> &nbsp;       
        <?php } ?>
    <br>

 <!--<b><?php echo DIRECCION ?>:</b><br> -->   
    <a class="btn btn-default btn-sm" href="https://www.google.com.ar/maps/place/<?php echo $direccion?>" target="_blank" title="Ubicación en Google Maps">
    <font size="3" color="#329999"><img src="img/iconos/googleMaps.png" width="40"><?php echo $direccion?></font></a>
    <?php }?> 

<hr>
<?php  if($row['facebook'] != '' || $row['instagram'] != ''){?>
<div align="center">
	<b>Seguinos en</b>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.
    <?php  if($row['facebook'] != ''){?>
		<a href="<?php echo $row['facebook'] ?>" title="Seguinos en Facebook" target="_blank"><i style="color:#0066CC" class="fab fa-facebook fa-2x"></i></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php }if($row['instagram'] != ''){?>
    	<a href="<?php echo $row['instagram'] ?>" title="Seguinos en Facebook" target="_blank"><i style="color:#F06" class="fab fa-instagram fa-2x"></i></a>
    <?php } ?>
    
</div>
<hr><br>
<?php }}?>
</div>
</section>
