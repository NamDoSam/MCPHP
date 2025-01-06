<?php 
$url='../../';
require($url.'template/cenefa.php');
require($url.'template/menu.php');
if($_GET['idItem']>0){
	$consulta="SELECT * FROM rubros WHERE idItem=".$_GET['idItem']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo=BOTON_2;
}else{
	$titulo=BOTON_1;
}

?>
<div class="container">
<h2><a href="rubro.php?slug=<?php echo $_GET['slug'] ?>"><font color="#0099FF"><i class="fas fa-reply"></i></font></a> <?php echo $titulo ?></h2><hr>
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
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
</div>
<?php require($url.'template/footer.php'); ?>