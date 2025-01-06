<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
if($_GET['idEsponsor']>0){
	$consulta="SELECT * FROM esponsor WHERE idEsponsor=".$_GET['idEsponsor']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Auspiciante";
}else{
	$titulo="Nuevo Auspiciante";
}
?>
<div class="container">
<h3><?php echo $titulo?></h3><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" enctype="multipart/form-data" action="cargarForm.php?slug=<?php echo SLUG ?>&form=esponsor">
    <input type="hidden" name="idEsponsor" value="<?php echo $_GET['idEsponsor']?>">
	<input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE?>">
      
      <div class="form-group">
        <label>Auspiciante</label>
         <input type="text" name="esponsor" <?php echo $may ?> class="form-control" value="<?php echo $row['esponsor'] ?>" required>
      </div>
 
      <div class="form-group">
        <label>Link</label>
         <input type="url"  name="link" <?php echo $min ?> placeholder="https://menucatalogo.com"  class="form-control"  value="<?php echo $row['link']?>">
      </div>

      <div class="form-group">
        <label>Orden N°</label>
         <input type="number" name="orden" class="form-control" value="<?php echo $row['orden'] ?>" required>
      </div>
      <div class="form-group">
        <label>Imagen<br>(La imagen del producto debe ser ".jpg"<br>de 380 x 100 px y de 72 dpi)</label>
        <?php 
		$img=explode(".",$row['imagen']);
		$nombre_fichero = "../../imgCliente/".SLUG."/promo/".$row['idEsponsor'].".jpg";
          if (file_exists($nombre_fichero)) {?>
                     <img style=" border: 1px solid #000;" src="<?php echo $nombre_fichero."?ver=".time() ?>" width="380" height="100" />
				<?php }else{?>
                    <img src="../../imgCliente/00.jpg" width="380" height="100" />
                <?php }?>
                <br><br>
         <input type="file" name="imagen" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
</div>
<br><br><br><br><br>	
	
<?php require($url.'template/footer.php'); ?>