<?php 
require_once('menu/menu.php');
if($_GET['nvo']== 0){
	$consulta="SELECT * FROM categorias WHERE idCat=".$_GET['idCat']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Categoria";
	$nvo=0;
}else{
	$titulo="Nueva Categoria";
	$nvo=1;
}

?>
<div class="container">
<h2><?php echo $titulo?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="acciones/cargarForm.php?slug=<?php echo SLUG ?>&nvo=<?php echo $nvo ?>&form=categoria">
    <input type="hidden" name="idCat" value="<?php echo $_GET['idCat']?>">
	<input type="hidden" name="idItem" value="<?php echo $_GET['idItem']?>">
    <input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE ?>">
      <div class="form-group">
        <label>Item / Menú</label> 
        <select name="idItem" class="form-control" required>
        <option value="">Seleccione un Item</option>
        <?php 
			$res = $mysqli->query("SELECT * FROM rubros WHERE idCliente='".NUM_CLIENTE."'");
			while($it = $res->fetch_assoc()){?>
          <option value="<?php echo $it['idItem'] ?>"<?php if($it['idItem']==$_GET['idItem'])echo "selected" ?>><?php echo $it['item'] ?></option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label>Título</label>
         <input type="text" name="categoria" <?php echo $may ?> class="form-control" value="<?php echo $row['categoria'] ?>" required>
      </div>
      <!--<div class="form-group">
        <label>Orden N°</label>
         <input type="number" name="ordenCat" class="form-control" value="<?php echo $row['ordenCat'] ?>" required>
      </div>-->
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
</body>
</html>