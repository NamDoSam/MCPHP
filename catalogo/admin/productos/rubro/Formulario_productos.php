<?php 
$url='../../';
require($url.'template/cenefa.php');
require($url.'template/menu.php');
if($_GET['idProducto']>0){
	$consulta="SELECT * FROM productos WHERE idProducto=".$_GET['idProducto']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo=BOTON_5;
}else{
	$titulo=BOTON_4;
}

?>
<div class="container">
<h2><?php echo $titulo;?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" enctype="multipart/form-data" action="acciones/cargarForm.php?form=producto&slug=<?php echo SLUG ?>&idItem=<?php echo $_GET['idItem'] ?>&idCat=<?php echo $_GET['idCat'] ?>">
    <input type="hidden" name="idProducto" value="<?php echo $_GET['idProducto']?>">
    <input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE ?>">
      <div class="form-group">
        <label><?php echo TABLA_6 ?></label> 
        <select name="categoria" class="form-control" required>
        <option value=""><?php echo TEXTO_1 ?></option>
        <?php 
			$res = $mysqli->query("SELECT * FROM categorias WHERE idCliente='".NUM_CLIENTE."'");
			while($it = $res->fetch_assoc()){?>
          <option value="<?php echo $it['idCat'] ?>"<?php if($it['idCat']==$_GET['idCat'])echo "selected" ?>><?php echo $it['categoria'] ?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label>Producto</label>
         <input type="text" name="producto" <?php echo $may ?> class="form-control" value="<?php echo $row['producto'] ?>" required>
      </div>
      <div class="form-group">
        <label><?php echo TEXTO_2 ?></label>
        <textarea name="descripcion" rows="6" class="form-control"  required="required"><?php echo $row['descripcion'] ?></textarea>
      </div>
      <div class="form-group">
        <label><?php echo TEXTO_3 ?></label>
         <input type="number" step="any" name="precio"  class="form-control" value="<?php echo $row['precio'] ?>" required>
      </div>
      <div class="form-group">
        <label><?php echo TEXTO_4 ?></label>
         <input type="number" step="any" name="precioPromo"  class="form-control" value="<?php echo $row['precioPromo'] ?>" >
      </div>
      <div class="form-group">
        <label><?php echo TEXTO_5 ?></label>
        <?php 
		$nombre_fichero = "../../../imgCliente/".SLUG."/productos/".$row['idProducto'].".jpg";
				if (file_exists($nombre_fichero)) {?>
                     <img src="<?php echo $nombre_fichero."?ver=".time()?>" height="100" />
				<?php }else{?>
                    <img src="../../../imgCliente/0.jpg" height="100" />
                <?php }?>
                <br><br>
         <input type="file" name="imagen" class="form-control" accept=".jpg, .jpeg">
      </div>
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<br><br><br><br><br>
</body>
</html>