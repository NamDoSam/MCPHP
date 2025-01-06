<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
if($_GET['idSucursal'] > 0){
$consulta="SELECT * FROM sucursales WHERE idSucursal=".$_GET['idSucursal']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
  	$titulo=TEXTO_8;
}else{
	$titulo=TEXTO_9;
	$idSucursal=0;
}
?>
<style>
.is-required:after {
  content: '*';
  margin-left: 3px;
  color: red;
  font-weight: bold;
}
</style>
<div class="container">
<h2><?php echo $titulo ?></h2><font color="#FF0000" size="4"><?php if($_GET['nota']) echo $_GET['nota'];?></font><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <form method="post" action="cargarForm.php?slug=<?php echo SLUG ?>&idSucursal=<?php echo $_GET['idSucursal'] ?>&form=contacto">
    <input type="hidden" name="idCliente" value="<?php echo NUM_CLIENTE ?>">
     <div class="form-group">
        <label class="is-required"><?php echo FORM_1 ?></label>
         <input type="text" name="nomFantasia" <?php echo $may ?> class="form-control" value="<?php echo $row['nomFantasia'] ?>" required>
      </div>
      <div class="form-group">
        <label class="is-required">Horarios</label>
        <textarea name="horario" rows="3" cols="50" class="form-control" placeholder="de Lunes a Sábados de 09 a 18 hs. y Domingos de 09 a 14 hs." required><?php echo $row['horario'] ?></textarea>
         
      </div>
		
		<div class="form-group">
        <label class="is-required">Código país<?php //echo FORM_2 ?></label>
         <select name="codigo" class="form-control">
			<option value="54 9"<?php if($row['codigo'] == "54 9") echo "selected" ?>>Argentina +54 9</option>
			<option value="55 64"<?php if($row['codigo'] == "55 64") echo "selected" ?>>Brasil +55 64</option>
			<option value="56 9"<?php if($row['codigo'] == "56 9") echo "selected" ?>>Chile +56 9</option>
		  </select>
      </div>
		
		
       <div class="form-group">
        <label><?php echo FORM_2 ?></label>
         <input type="text" name="telefono" <?php echo $may ?> placeholder="111 7777 777" class="form-control" value="<?php echo $row['telefono'] ?>" required>
      </div>
      <div class="form-group">
        <label class="is-required"><?php echo FORM_3 ?></label>
         <input type="text" name="whatsapp" <?php echo $may ?> placeholder="54 9 111 7777 777" class="form-control" value="<?php echo $row['whatsapp'] ?>" required>
      </div>
      <div class="form-group">
        <label class="is-required"><?php echo TABLA_17 ?></label>
         <input type="text" name="direccion" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['direccion'] ?>" required>
      </div>
       <div class="form-group">
        <label class="is-required"><?php echo FORM_4 ?></label>
         <input type="text" name="dpto" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['dpto'] ?>" required>
      </div>
      <div class="form-group">
        <label class="is-required"><?php echo FORM_5 ?></label>
         <input type="text" name="provincia" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['provincia'] ?>" required>
      </div>
      <div class="form-group">
        <label class="is-required"><?php echo FORM_6 ?></label>
         <input type="text" name="pais" <?php echo $may ?> placeholder="ARGENTINA" class="form-control" value="<?php echo $row['pais'] ?>" required>
      </div>
      <div class="form-group">
        <label>Facebook</label>
         <input type="text" name="facebook" <?php echo $min ?> placeholder="https://www.facebook.com/..." class="form-control" value="<?php echo $row['facebook'] ?>">
      </div>
      <div class="form-group">
        <label>Instagram</label>
         <input type="text" name="instagram" <?php echo $min ?> placeholder="https://www.instagram.com/..." class="form-control" value="<?php echo $row['instagram'] ?>" >
      </div>
      <button type="submit" class="btn btn-primary btn-block"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<br>
<br>
</div>
<br>
<br>
<br>
<?php require($url.'template/footer.php'); ?>