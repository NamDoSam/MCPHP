<?php 
require_once('menu/menu.php');
if($_GET['idVendedor']>0){
    $consulta="SELECT * FROM vendedores WHERE idVendedor=".$_GET['idVendedor']."";
    $resultado = $mysqli->query($consulta);
    $row = $resultado->fetch_assoc();
    $titulo="Editar Vendedor";
}else{
    $titulo="Nuevo Vendedor";
}
?>
<!--<link rel="stylesheet" href="materialize/css/materialize.css">-->
<div class="container">
<h2><?php echo $titulo?></h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="acciones/cargarForm.php?slug=<?php echo SLUG ?>&form=vendedor">
    <input type="hidden" name="idVendedor" value="<?php echo $_GET['idVendedor']?>">
    <input type="hidden" name="idCliente" value="<?php echo $_GET['idCliente']?>">

      <div class="form-group">
        <label>Nombre</label>
         <input type="text" name="nombre" <?php echo $may ?> class="form-control" value="<?php echo $row['nombre'] ?>" required>
      </div>

      <div class="form-group">
        <label>Teléfono</label>
         <input type="text" name="telefono" <?php echo $may ?> class="form-control" value="<?php echo $row['telefono'] ?>" required>
      </div>

      <div class="form-group">
        <label>E-mail</label>
         <input type="email" name="email" <?php echo $min ?> class="form-control" value="<?php echo $row['email'] ?>" required>
      </div>
      
      <button type="submit" class="btn btn-primary"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<script>
	
</script>
</body>
</html>