<?php 
$url='../../';
require($url."template/cenefa.php");
require_once($url."template/menu.php");
$volver=$url."menuFormaPedido?c=".$slug;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<style>
    .google-maps {
    position: relative;
    padding-bottom: 75%; // This is the aspect ratio
    height: 0;
    overflow: hidden;
    }
    .google-maps iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
    }
	
	input[type=checkbox] {
    transform: scale(1.7);
    cursor: pointer;
}
input[type=radio] {
    transform: scale(1.7);
    cursor: pointer;
}
    </style>

	<!--//////////////BORRAR CON AVISO//////////-->
<script language="JavaScript">
var mensaje="Desea eliminar el registro?";
function confirmar () { 
return confirm("Desea eliminar el registro?"); 
} 
</script>

</head>

<body>
	<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
<?php 
$m=$mysqli->query("SELECT pEnvio,pMapZona,pfueraZona,codigo,whatConsulta,celPedido FROM car_configuracion WHERE idCliente='".$_GET['idCliente']."'");
$map = $m->fetch_assoc();
$pEnvio=$map['pEnvio'];
$whatsapp=$map['codigo']." ".$map['celPedido'];
?>
<!--<script>
if (typeof navigator.geolocation == 'object'){
    navigator.geolocation.getCurrentPosition(mostrar_ubicacion);
}
 
function mostrar_ubicacion(p)
{
    alert('posición: '+p.coords.latitude+','+p.coords.longitude );
}
</script>-->
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
	  <div align="center" style="font-size: 15px;"><i style="color:red" class="fa fa-exclamation-triangle fa-2x"></i> <?php echo TEXTO_8 ?></div>
	  <br>
	  <div id="mymap" class="google-maps">
      <iframe src="https://www.google.com/maps/d/embed?mid=<?php echo $map['pMapZona'] ?>" width="640" height="480"></iframe>
	  </div>
      <br>
	  <form method="post" action="../cargarPedidoDelivery.php?c=<?php echo $_GET['c'] ?>&idCliente=<?php echo $_GET['idCliente'] ?>&pEnvio=<?php echo $pEnvio ?>">
		<input class="check" type="checkbox" name="dentroZona" id="checkbox" required>
		  <label for="checkbox"> &nbsp;&nbsp; <font size="2">(<?php echo ENVIO ?> <strong>$<?php echo $map['pEnvio'] ?></strong>) <?php echo TEXTO_9 ?></font> </label>
		  
          <br>
    	<div align="center"><?php if($map['pfueraZona']==1){?> 
        <h6 style='color:#009493'> <?php echo TEXTO_9 ?> <BR> <?php echo TEXTO_11 ?> <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>&text=<?php echo TEXTO_12 ?>" target="_blank" title="Enviar Consulta"><img src='../../img/iconos/whatsapp.jpg' width='50'></a></h6></div>
        <?php }?>
	 
		  <!--<h6>
		  <div align="center"><img src="../../img/iconos/google-maps.png" height="50">Envíanos por Whatsapp tu ubicación</div></h6>-->
		  <div class="form-group">
			<label for="pwd"><br><?php echo FORM_1 ?></label>
			<input type="text" name="direccion" placeholder="<?php echo FORM_1 ?>" class="form-control" required>	</div>
		  <div class="form-group">
			<label for="pwd"><?php echo FORM_2 ?></label>
			<input type="text" name="localidad" placeholder="<?php echo FORM_2 ?>" class="form-control" required>				
		  </div>
           <div class="form-group">
			<label for="pwd"><?php echo FORM_3 ?></label>
			<input type="text" name="provincia" placeholder="<?php echo FORM_3 ?>" class="form-control" required>				
		  </div>
		  <div class="form-group">
			<label for="pwd"><?php echo FORM_4 ?></label>
			<input type="text" name="detalle" placeholder="<?php echo FORM_4 ?>" class="form-control">
		  </div>
          <div class="form-group">
          <div class="pull-right"><button type="submit" class="btn btn-success"><?php echo BOTON_6 ?></button></div>
          </div>
          <br><br>
           <div class="form-group">
			<h5><strong><?php echo FORM_5 ?></strong></h5>
           
            <?php 
			$i=0;
			$d=$mysqli->query("SELECT * FROM car_direccion_envio WHERE idComprador='".$_SESSION['sesiones'][1]."'");
			while($dir = $d->fetch_assoc()){ ?>
			
			<div style="padding:10px; background-color:#f6f7f7; border-radius: 8px; margin-bottom: 0.5rem;">
				
				<a onclick="return confirmar()" style="color:red;"
	  href="../acciones/borrarDireccion.php?c=<?php echo $_GET['c'] ?>&idDireccion=<?php echo $dir['idDireccion']?>&idCliente=<?php echo $_GET['idCliente'] ?>" title="Borrar Dirección"><i class="fa fa-times-circle fa-lg"></i></a>
				
				&nbsp;&nbsp;
				
			<a style="text-decoration:none; color:#009493"  href="../cargarPedidoDelivery.php?idDireccion=<?php echo $dir['idDireccion']?>&c=<?php echo $_GET['c'] ?>&idCliente=<?php echo $_GET['idCliente'] ?>&pEnvio=<?php echo $pEnvio ?>">
			<i class="fa fa-map-marker"></i> <?php  echo $dir['direccion']."<font size='2'> (".$dir['detalle'].")</font>" ?></div></a>	
                    
            <?php $i++;}?>
            </ul>
		  </div>
		  
	  </form>
	</div>
  <div class="col-sm-3"></div>
</div>
</div>

<br>
<br>
<br>
<br>
<br>
<?php require_once($url."template/footer.php");?>