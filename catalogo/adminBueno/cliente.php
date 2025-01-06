<?php require_once('menu/menu.php');?>
<div class="container">
<h3>Actualizar Contraseña</h3><hr>
<p align="center">La contraseña debe tener al menos 6 caracteres y contener letras mayúsculas y minúsculas y números.</p>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
<form action="" method="post">
      <div class="form-group">
        <label>Nueva Contraseña</label>
         <input type="text" name="clave" class="form-control" required>
      	</div>

		<div class="form-group">
      	<label>Vuelva a estribir la Contraseña</label>
         <input type="text" name="clave1" class="form-control" required>
      	</div>
      
      
      <button style="float: right" type="submit" class="btn btn-primary">Actualizar</button>
    </form>
  </div>
</div>
<br>
<?php   if(isset($_POST['clave']) && isset($_POST['clave1'])){ 

if($_POST["clave"]==$_POST["clave1"]){
function validar_clave($clave,&$error_clave){
   if(strlen($clave) < 6){
      $error_clave = "Debe tener al menos 6 caracteres.";
      return false;
   }
   if(strlen($clave) > 16){
      $error_clave = "No puede tener más de 16 caracteres.";
      return false;
   }
   if (!preg_match('`[a-z]`',$clave)){
      $error_clave = "Debe tener al menos una letra minúscula.";
      return false;
   }
   if (!preg_match('`[A-Z]`',$clave)){
      $error_clave = "Debe tener al menos una letra mayúscula.";
      return false;
   }
   if (!preg_match('`[0-9]`',$clave)){
      $error_clave = "Debe tener al menos un caracter numérico.";
      return false;
   }
   $error_clave = "";
   return true;
}

if ($_POST){
   $error_encontrado="";
   if (validar_clave($_POST["clave"], $error_encontrado)){
   		$sql = "UPDATE clientes SET pass='".$_POST['clave']."' WHERE idCliente='".NUM_CLIENTE."'";
		$mysqli->query($sql);
      echo "<div align='center'><font color='#17900b'>LA CONTRASEÑA SE HA ACTUALIZADO CORRECTAMENTE.</font></div>";
   }else{
      echo "<div align='center'><font color='#df0024'>LA CONTRASEÑA NO ES VALIDA: " . $error_encontrado."</font></div>";
   }
}

}else{
   echo "<div align='center'><font color='#df0024'>LAS CONTRASEÑAS DEBEN SER IGUALES</font></div>";
}

}?>
<br><br><br><br><br>

</body>
</html>