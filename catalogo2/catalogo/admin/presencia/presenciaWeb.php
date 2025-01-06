<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$cli="SELECT idCliente FROM clientes WHERE slug='".SLUG."'";   
$resul = $mysqli->query($cli);
$cli = $resul->fetch_assoc();
$idCliente=$cli['idCliente'];
?>
<style>
.modal-content {
    background-color: #f1f1f1;
	}
</style>
   
<div class="container">

<h2>Presencia Web</h2> <hr>

<?php include 'acciones/carrusel.php'; ?>
 
  <!--////////////FIN CARRUSEL////////////////-->
  
<?php include 'acciones/tarjeta.php'; ?>
<br><br><br><br><br><br>
</div>
 

<!-- Modal SUBIR IMAGEN -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Subir Imagen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" align="center" style="background-color: white;">
	<form method="post" enctype="multipart/form-data" action="acciones/subirImagen.php?slug=<?php echo SLUG ?>&id=<?php echo $i?>">
                    <i class="far fa-image fa-5x"></i><br>
               
                <br>
         <input type="file" name="imagen" class="form-control" accept=".jpg, .jpeg, .png" required>
    	<br><br>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
    </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
<!-- Fin The Modal -->


<!-- Modal FORMULARIO TARJETA -->
<div class="modal fade" id="tarjeta">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4>Actualizar Información</h4><h6><!--<font color="#FF0000">*</font> Datos Requeridos</h6>-->
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
     <?php  $cli="SELECT cl.nomFantasia,cl.idCliente,su.* FROM clientes cl, sucursales su
			 WHERE ".$idCliente."=su.idCliente";   
	$resultado = $mysqli->query($cli);
	$row = $resultado->fetch_assoc(); 
?>

      <div class="modal-body" align="center" style="background-color: white;">
	<form method="post"  action="acciones/cargarTarjeta.php?slug=<?php echo SLUG ?>&id=<?php echo $i?>">
    
		<input type="hidden" name="idSucursal" value="<?php echo $row['idSucursal']?>">
        <input type="hidden" name="idCliente" value="<?php echo $idCliente ?>">
        
        <div align="left"><font color="#FF0000">*</font> Nombre Fantasía
         <input type="text" name="nomFantasia" class="form-control" value="<?php echo $row['nomFantasia']?>"  required>
		</div>
        
        <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Descripción
         <input type="text" name="descripcion" class="form-control" value="<?php echo $row['descripcion']?>"  required>
         </div>
         
         <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Horario
         <input type="text" name="horario" class="form-control" value="<?php echo $row['horario']?>"  required>
         </div>
         
         <div align="left" style="margin-top:5px">Teléfono
         <input type="text" style="width:200px" name="telefono" class="form-control" value="<?php echo $row['telefono']?>" >
         </div>
         
          <div align="left" style="margin-top:5px">Celular
         <input type="text" style="width:200px" name="celular" class="form-control" value="<?php echo $row['celular']?>" >
         </div>
         
         <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Whatsapp
         <input type="text" style="width:200px" name="whatsapp" class="form-control" value="<?php echo $row['whatsapp']?>" required>
         </div>
         
          <div align="left" style="margin-top:5px">Email
         <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>">
         </div>
         
         <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Dirección (Calle y Número)
          <input type="text" name="direccion" class="form-control" value="<?php echo $row['direccion']?>"  required>
         </div>
         
         <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Departamento
          	<select style="width:200px" name="departamento" class="form-control" required>
              <option value=""  selected></option>
              <?php $resultado = $mysqli->query("SELECT * FROM departamentos");
					while($dep = $resultado->fetch_assoc()){?>
              <option value="<?php echo $dep['departamento'] ?>" <?php if($dep['departamento']==$row['dpto']) echo "selected" ?> ><?php echo $dep['departamento'] ?></option>
              <?php }?>
            </select>
         </div>
         
         <div align="left" style="margin-top:5px"><font color="#FF0000">*</font> Provincia
          	<select style="width:200px" name="provincia" class="form-control" required>
              <option value="MENDOZA"  selected>MENDOZA</option>
            </select>
         </div>
         
         <div align="left" style="margin-top:5px">Facebook
          <input type="text" name="facebook" class="form-control" value="<?php echo $row['facebook']?>">
         </div>
         
          <div align="left" style="margin-top:5px">Instagram
          <input type="text" name="instagram" class="form-control" value="<?php echo $row['instagram']?>">
         </div>
         
    	
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Cargar Información</button>
      </div>
    </form>
      </div>

      <!-- Modal footer -->
      

    </div>
  </div>
</div>
<!-- Fin The Modal -->



<?php require($url.'template/footer.php'); ?>