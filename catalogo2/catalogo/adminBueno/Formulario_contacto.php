<?php 
require_once('menu/menu.php');
if($_GET['idSucursal'] > 0){
$consulta="SELECT * FROM sucursales WHERE idSucursal=".$_GET['idSucursal']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
  $titulo="Editar Sucursal";
}else{
	$titulo="Cargar Sucursal";
	$idSucursal=0;
}
?>
<div class="container">
<h2>Contacto</h2><font color="#FF0000" size="4"><?php if($_GET['nota']) echo $_GET['nota'];?></font><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="acciones/cargarForm.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $_GET['idSucursal'] ?>&form=contacto">
    <input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE ?>">
     <div class="form-group">
        <label>Nombre Fantasía</label>
         <input type="text" name="nomFantasia" <?php echo $may ?> class="form-control" value="<?php echo $row['nomFantasia'] ?>" required>
      </div>
      <div class="form-group">
        <label>Horarios</label>
        <textarea name="horario" rows="3" cols="50" class="form-control" placeholder="de Lunes a Sábados de 09 a 18 hs. y Domingos de 09 a 14 hs." required><?php echo $row['horario'] ?></textarea>
         
      </div>
       <div class="form-group">
        <label>Telefono/s ( separados con , )</label>
         <input type="text" name="telefono" <?php echo $may ?> placeholder="111 7777 777" class="form-control" value="<?php echo $row['telefono'] ?>" required>
      </div>
      <div class="form-group">
        <label>Whatsapp ( separados con , )</label>
         <input type="text" name="whatsapp" <?php echo $may ?> placeholder="54 9 111 7777 777" class="form-control" value="<?php echo $row['whatsapp'] ?>" required>
      </div>
      <div class="form-group">
        <label>Dirección</label>
         <input type="text" name="direccion" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['direccion'] ?>" required>
      </div>
       <div class="form-group">
        <label>Departamento</label>
         <input type="text" name="dpto" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['dpto'] ?>" required>
      </div>
      <div class="form-group">
        <label>Provincia</label>
         <input type="text" name="provincia" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['provincia'] ?>" required>
      </div>
      <div class="form-group">
        <label>País</label>
         <input type="text" name="pais" <?php echo $may ?> placeholder="" class="form-control" value="ARGENTINA" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<br>
<br>
<br>
</body>
</html>