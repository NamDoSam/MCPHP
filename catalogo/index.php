<?php
session_start();
require_once("template/cenefa.php");

if($estado==1){ 
if($_GET['c']){
require_once("template/menu.php");
?>
<br><br><br>
<style>

</style>
<div class="py-5">
<div class="container">

<br><br>


<div class="row">
<?php
/*echo "<br>";
print_r($_SESSION);*/
$sql="SELECT * FROM esponsor WHERE estado=0 AND idCliente='".$idCliente."' ORDER BY orden";
$resulta = $mysqli->query($sql);
while($rowP = $resulta->fetch_assoc()){
$link='';  $target=''; 
if($rowP['link']!=''){ 
	$link=$rowP['link']; $target="target='_blank'"; } else { $link='#'; $target='';}	
?>
<a href="<?php echo $link ?>" <?php echo $target ?>> 
	  <div class="col-md-12 col-sm-12 my-2"> <img style=" border: 1px solid #999;margin: 5px;" class="img-fluid d-block mx-auto" src=<?php echo "imgCliente/".$slug."/promo/".$rowP['idEsponsor'].".jpg?ver=".time()?> width="380" height="100" title="<?php echo $rowP['nombre'] ?>" /></div>
</a>
	<?php } ?>
  		
  </div>
  </div>
</div>
<div class="container">
<?php if($tipoCat != 'presencia'){ ?>
<?php require_once('selectInicio/selectorMenu.php'); ?>
 <!--<div class="animsition">-->
 
<h4 align="center">Menú Principal<?php //echo SELECCIONA ?></h4>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
<?php //echo $config['publi_key'];
$promo="SELECT COUNT(*) total FROM productos WHERE idCliente='".$idCliente."' AND (promo=1 || precioPromo > 0) AND ocultar=0";
	$resultado = $mysqli->query($promo);
		$fila = mysqli_fetch_assoc($resultado);
		if($fila['total'] > 0){ ?>
      <div style="margin-bottom:10px">
        <a class="animsition-link" href="promociones.php?c=<?php echo $slug ?>" style="text-decoration:none;"><button style="background-color:#ff0000; color:#FFFFFF" type="button" class="btn btn-block"><?php echo "- ".PROMOCIONES." (".$fila['total'].") -" ?></button></a>
        </div>
	<?php } ?>


	<?php  
    $resultado = $mysqli->query("SELECT * FROM rubros WHERE estado=0 AND idCliente='".$idCliente."' AND ocultar=0 ORDER BY orden");
    while($row = $resultado->fetch_assoc()){?>
        <div style="margin-bottom:10px">
        <a class="animsition-link" href="categorias.php?c=<?php echo $slug ?>&menu=<?php echo $row['idItem']?>&tituloCategoria=<?php echo $row['item']?>" style="text-decoration:none; background-color:#000">
			<button style="background-color:#E6E6E6; border: 2px solid #c3d5da; border-radius: 0.4rem;" type="button" class="btn btn-block"><?php echo "- ".$row['item']." -" ?></button></a>
        </div>
    <?php } ?>
</div>
</div>
</div>
</div>
 <br>
<?php 
require_once("sucursales.php");
} else { 

require_once("presenciaWeb.php");
 }?>
</div>
 <br>
<br>
<?php require_once("template/footer.php"); 
}}else{?>
<style type="text/css">
		html, body {
		    margin: 0;
		    padding: 0;
		    width: 100%;
		    height: 100%;
		    display: table;
			
		}
		.contenedor {
		    display: table-cell;
		    text-align: center;
		    vertical-align: middle;
			background-color: #F60;
		}
		.contenido {
		    display: inline-block;
		}
		.contenido img {
			width: 100%;
		}
	</style>
<body>
<div class="contenedor">
<div class="contenido">
	<img src="img/logo_qr/logoLogin.png" width="201" height="74"><br>
	<br>
    
 </div>
 <h6 style="color:#FFFFFF">Por favor comuníquese con la Administración para rehabilitar el servicio</h6>
 <a href="https://api.whatsapp.com/send?phone=54 9 2617 00-0153&text=Desde%20MenuCatalogo:%0A"><img src="img/iconos/whatsapp.png" width="60" height="60"></a>
 </div>
 </body>
<?php }?>
