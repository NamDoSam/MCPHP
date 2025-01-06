<?php 
require_once('menu/menu.php');
	$consulta="SELECT * FROM promociones WHERE idPromo=".$_GET['idPromo']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
	$titulo="Editar Promo | ".$_GET['producto'];
?>
<link rel="stylesheet" href="materialize/css/materialize.css">
<div class="container">
<h2><?php echo $titulo?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="acciones/cargarForm.php?nvo=<?php echo $nvo ?>&form=categoria">
    <input type="hidden" name="idCat" value="<?php echo $_GET['idCat']?>">
	<input type="hidden" name="idItem" value="<?php echo $_GET['idItem']?>">
      <div class="form-group">
        <label>Producto</label>
         <input type="text" name="categoria" <?php echo $may ?> class="form-control" value="<?php echo $row['categoria'] ?>" required>
      </div>
      
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<script>
	
</script>
</body>
</html>