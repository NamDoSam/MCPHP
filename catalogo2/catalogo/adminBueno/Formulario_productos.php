<?php 
require_once('menu/menu.php');
if($_GET['idProducto']>0){
	$consulta="SELECT * FROM productos WHERE idProducto=".$_GET['idProducto']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Producto";
}else{
	$titulo="Nuevo Producto";
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
        <label>*Item / Menú</label> 
        <select name="categoria" class="form-control" required>
        <option value="">Seleccione una Categoría</option>
        <?php 
			$res = $mysqli->query("SELECT * FROM categorias WHERE idCliente='".NUM_CLIENTE."'");
			while($it = $res->fetch_assoc()){?>
          <option value="<?php echo $it['idCat'] ?>"<?php if($it['idCat']==$_GET['idCat'])echo "selected" ?>><?php echo $it['categoria'] ?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label>*Producto</label>
         <input type="text" name="producto" <?php echo $may ?> class="form-control" value="<?php echo $row['producto'] ?>" required>
      </div>
      <div class="form-group">
        <label>Código</label>
         <input type="text" name="codigo" <?php echo $may ?> maxlength="20" class="form-control" value="<?php echo $row['codigo'] ?>" >
      </div>
      <div class="form-group">
        <label>*Descripción (Escribir &lt;br&gt; para un salto de línea)</label>
        <textarea name="descripcion" rows="6" class="form-control"  required="required"><?php echo $row['descripcion'] ?></textarea>
      </div>
      <div class="form-group">
        <label>*Precio $</label>
         <input type="number" step="any" name="precio"  class="form-control" value="<?php echo $row['precio'] ?>" required>
      </div>
      <div class="form-group">
        <label>Precio Promo $</label>
         <input type="number" step="any" name="precioPromo"  class="form-control" value="<?php echo $row['precioPromo'] ?>" >
      </div>
      <div class="form-group">
        <label>Imagen<br>(La imagen del producto debe ser ".jpg"<br>de 500 x 350 px y de 72 dpi)</label>
        <?php 
		$nombre_fichero = "../imgCliente/".SLUG."/productos/".$row['idProducto'].".jpg";
				if (file_exists($nombre_fichero)) {?>
                     <img src="<?php echo $nombre_fichero."?ver=".time()?>" height="100" />
				<?php }else{?>
                    <img src="../imgCliente/0.jpg" height="100" />
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