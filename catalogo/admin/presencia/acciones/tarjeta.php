<?php
$cli="SELECT cl.nomFantasia,su.* FROM clientes cl, sucursales su
			 WHERE ".$idCliente."=su.idCliente";   
$resultado = $mysqli->query($cli);
	$row = $resultado->fetch_assoc();
if($row['idSucursal'] > 0){
?>
    <div class="card-body">
      <h3 align="center"><strong> <?php echo $row['nomFantasia']?></strong> </h3>
      <p class="card-text"><?php echo $row['descripcion']?></p>
      <strong>Horario</strong><br>
       <font size=4;  color="#099"><i class="far fa-clock"></i> <?php echo $row['horario']?></font>
<br>
      <strong>Contacto</strong>
<br>
      <?php if($row['telefono']!=''){?>
	  <a  href="tel:<?php echo $row['telefono']?>">
      <font size=4; color="#099"><i class="fas fa-phone-alt"></i> <?php echo $row['telefono']?></font></a>
      &nbsp;&nbsp;&nbsp;&nbsp;
      <?php } if($row['celular']!=''){?>
      <a href="tel:<?php echo $row['celular']?>">
      <font size=4;  color="#099"><i class="fas fa-mobile-alt"></i> <?php echo $row['celular']?></font></a>
      <?php } if($row['whatsapp']!=''){?>
      <br>
      <a href="https://api.whatsapp.com/send?phone=<?php echo $row['whatsapp']?>&text=Desde%20MenuCatalogo:%0A" target="_blank">
      <font size=4  color="#099"><i class="fab fa-whatsapp"></i> <?php echo $row['whatsapp']?></a>
      <?php }if($row['email']!=''){?>
      <br>
      <a href="mailto:<?php echo $row['email']?>" target="_blank">
      <font size=4  color="#099"><i class="far fa-envelope"></i> <?php echo $row['email']?></a>
      <?php }?>

      <hr>
      <a href="https://www.google.com.ar/maps/place/<?php echo $row['direccion']." - ".$row['dpto']." - ".$row['provincia']." - ".$row['pais']?>" target="_blank">
      <font size=4  color="#099"><i class="fas fa-map-marker-alt"></i> <?php echo $row['direccion']." - ".$row['dpto']."<br>".$row['provincia']." - ".$row['pais']?></a>
      
      <?php if($row['facebook']!='' || $row['instagram']!=''){?>
      <hr>
          Seguinos en:
          <?php if($row['facebook']!=''){?> 
          &nbsp;&nbsp;
          	<a href="<?php echo $row['facebook']?>" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
          <?php }if($row['instagram']!=''){?>
          &nbsp;&nbsp;
          	<a style="color: #F06;" href="<?php echo $row['instagram']?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
      <?php }}}?>
      <hr>
      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#tarjeta"><i class="fas fa-edit"></i> Editar </a>
    </div>
  </div>
  <br>
</div>
</div>
</div>
</div>