<?php 
require_once('menu/menu.php');
if($_GET['idFijo']>0){
	$consulta="SELECT * FROM esponsor_fijo WHERE idFijo=".$_GET['idFijo']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Auspiciante";
}else{
	$titulo="Nuevo Auspiciante";
}

?>
<div class="container">
<h2><?php echo $titulo?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" enctype="multipart/form-data" action="acciones/cargarAuspiciante.php">
    <input type="hidden" name="idEsponsor" value="<?php echo $_GET['idEsponsor']?>">
	<input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE?>">
      
      <div class="form-group">
        <label>Auspiciante</label>
         <input type="text" name="nombre" <?php echo $may ?> class="form-control" value="<?php echo $row['nombre'] ?>" required>
      </div>
 
      <div class="form-group">
        <label>Link</label>
         <input type="url"  name="link" <?php echo $min ?> placeholder="https://menucatalogo.com"  class="form-control"  value="<?php echo $row['link']?>">
      </div>

      <!--<div class="form-group">
        <label>Orden N°</label>
         <input type="number" name="orden" class="form-control" value="<?php echo $row['orden'] ?>" required>
      </div>-->
      <div class="form-group">
        <label>Imagen<br>(La imagen del producto debe ser ".jpg"<br>de 380 x 100 px y de 72 dpi)</label>
        <?php 
		$img=explode(".",$row['imagen']);
		$nombre_fichero = "img/imgAuspicios/".$row['slug'].".jpg";
          if (file_exists($nombre_fichero)) {?>
                     <img style=" border: 1px solid #000;" src="<?php echo $nombre_fichero."?ver=".time() ?>" width="380" height="100" />
				<?php }else{?>
                    <img src="img/imgAuspicios/00.jpg" width="380" height="100" />
                <?php }?>
                <br><br>
         <input type="file" name="imagen" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<br><br><br><br><br>
</body>
</html>