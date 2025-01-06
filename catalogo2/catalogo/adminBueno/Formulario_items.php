<?php 
require_once('menu/menu.php');
if($_GET['idItem']>0){
	$consulta="SELECT * FROM rubros WHERE idItem=".$_GET['idItem']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Rubro";
}else{
	$titulo="Nuevo Rubro";
}

?>
<div class="container">
<h2><?php echo $titulo ?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="acciones/cargarForm.php?form=item&slug=<?php echo SLUG ?>">
    <input type="hidden" name="idItem" value="<?php echo $_GET['idItem'] ?>">
    <input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE ?>">
      <div class="form-group">
        <label>Rubro</label>
        <input type="text" name="item" <?php echo $may ?> class="form-control" value="<?php echo $row['item'] ?>" required>
      </div>
      <!--<div class="form-group">
        <label>Título</label>
         <input type="text" name="titulo" <?php echo $may ?> class="form-control" value="<?php echo $row['titulo'] ?>" required>
      </div>-->
      <!--<div class="form-group">
        <label>Orden N°</label>
         <input type="number" name="orden" class="form-control" value="<?php echo $row['orden'] ?>" required>
      </div>-->
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
</body>
</html>