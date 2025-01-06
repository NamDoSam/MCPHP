<?php 
require_once('menu/menu.php');
if($_GET['idCliente'] > 0){
$consulta="SELECT * FROM clientes WHERE idCliente=".$_GET['idCliente']."";
	$resultado = $mysqli->query($consulta);
	$row = $resultado->fetch_assoc();
  $titulo="Editar Cliente";
}else{
	$titulo="Cargar Cliente";
	$idSucursal=0;
}
?>
<div class="container">
<h2>Contacto</h2><font color="#FF0000" size="4"><?php if($_GET['nota']) echo $_GET['nota'];?></font><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
  <h3 align="center"><?php echo $_SESSION['empresa'] ?></h3>
  <h5 align="center">(*) Campo Obligatorio</h5>
    <form method="post" action="acciones/cargarForm.php?form=cliente">
    <input type="hidden" name="idCliente" value="<?php echo $_GET['idCliente'] ?>">

      <div class="form-group">
        <label>*Concentrador</label>
         <select name="idConcentrador"  class="form-control" required >
            <?php
            $rem = $mysqli->query("SELECT * FROM concentradores");
            while($rowCo = $rem->fetch_assoc()){ ?>
            <option value="<?php echo $rowCo['idConcentrador']?>"<?php if($row['idConcentrador']==$rowCo['idConcentrador']) echo "selected"?>><?php echo $rowCo['nombre']?></option>
            <?php } ?>
          </select>
      </div>
      
        
      
       <div class="form-group">
        <label>*Rubro</label>
         <select name="item"  class="form-control" required >
            <option value=""></option>
            <?php
            $rem = $mysqli->query("SELECT idCat,categoria FROM item_categorias ORDER BY categoria");
            while($rowC = $rem->fetch_assoc()){ ?>
            <option value="<?php echo $rowC['idCat']?>"<?php if($row['item']==$rowC['idCat']) echo "selected"?>><?php echo $rowC['categoria']?></option>
            <?php } ?>
          </select>
      </div>
      
            <div class="form-group">
        <label>*Tipo Catálogo</label>
         <select name="tipoCat"  class="form-control" required >
            <option value=""></option>
           	<option value="presencia"<?php if($row['tipoCat']=='presencia') echo "selected"?>>Presencia Web</option>
            <option value="catalogo"<?php if($row['tipoCat']=='catalogo') echo "selected"?>>Catálogo</option>
            <option value="carrito"<?php if($row['tipoCat']=='carrito') echo "selected"?>>Cátalogo + Tienda</option>
          </select>
      </div>
      
      <div class="form-group">
        <label>*Nombre Fantasía</label>
         <input type="text" name="nomFantasia" <?php echo $may ?> class="form-control" value="<?php echo $row['nomFantasia'] ?>" required>
      </div>
      
      <div class="form-group">
        <label>Razón Social</label>
         <input type="text" name="razonSocial" <?php echo $may ?> class="form-control" value="<?php echo $row['razonSocial'] ?>">
      </div>
      <div class="form-group">
        <label>CUIT</label>
         <input type="text" name="cuit" <?php echo $may ?> class="form-control" value="<?php echo $row['cuit'] ?>">
      </div>
      <div class="form-group">
        <label>*Apellido</label>
         <input type="text" name="apellido" <?php echo $may ?> class="form-control" value="<?php echo $row['apellido'] ?>" required>
      </div>
      <div class="form-group">
        <label>*Nombre</label>
         <input type="text" name="nombre" <?php echo $may ?> class="form-control" value="<?php echo $row['nombre'] ?>" required>
      </div>
       <div class="form-group">
        <label>*E-mail</label>
         <input type="email" name="email" <?php echo $min ?> class="form-control" value="<?php echo $row['email'] ?>" required>
      </div>
      <div class="form-group">
        <label>*Teléfono</label>
         <input type="text" name="telefono" class="form-control" value="<?php echo $row['telefono'] ?>" required>
      </div>
      <div class="form-group">
        <label>*Dirección</label>
         <input type="text" name="direccion" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['direccion'] ?>" required>
      </div>
       <div class="form-group">
        <label>*Departamento/Localidad</label>
         <input type="text" name="localidad" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['localidad'] ?>" required>
      </div>
      
       <div class="form-group">
        <label>*Provincia/Comuna</label>
         <input type="text" name="provincia" <?php echo $may ?> placeholder="" class="form-control" value="<?php echo $row['provincia'] ?>" required>
      </div>
      
<!--      <div class="form-group">
        <label>Provincia/Comuna</label>
         <select name="provincia" style="text-transform:uppercase;" class="form-control" required >
            <option value=""></option>
            <?php
            $re = $mysqli->query("SELECT * FROM provincias ORDER BY provincia");
            while($rowP = $re->fetch_assoc()){ ?>
            <option value="<?php echo $rowP['provincia']?>"<?php if($row['provincia']==$rowP['provincia']) echo "selected"?>><?php echo $rowP['provincia']?></option>
            <?php } ?>
          </select>
      </div>-->
      
            <div class="form-group">
        <label>*País</label>
         <select name="pais" style="text-transform:uppercase;" class="form-control" required >
            <option value=""></option>
            <?php
            $re = $mysqli->query("SELECT * FROM lista_pais ORDER BY pais");
            while($rowP = $re->fetch_assoc()){ ?>
            <option value="<?php echo $rowP['pais']?>"<?php if($row['pais']==$rowP['pais']) echo "selected"?>><?php echo $rowP['pais']?></option>
            <?php } ?>
          </select>
      </div>
		
		<div class="form-group">
        <label>Auspiciante</label>
         <select name="sponsor" class="form-control">
            <option value=""<?php if($row['sponsor']=='') echo "selected"?>></option>
			<?php
            $e = $mysqli->query("SELECT idFijo,nombre FROM esponsor_fijo");
            while($rowS = $e->fetch_assoc()){ ?> 
            <option value="<?php echo $rowS['idFijo']?>"<?php if($row['sponsor']==$rowS['idFijo']) echo "selected"?>><?php echo $rowS['nombre']?></option>
			 <?php }?>
          </select>
      </div>
		
      <div class="form-group">
        <label>*Días de Prueba</label>
         <select name="prueba" class="form-control">
            <option value="0"<?php if($row['prueba']=='0') echo "selected"?>>Muestra</option>
            <option value="30"<?php if($row['prueba']=='30') echo "selected"?>>30</option>
          </select>
      </div>
      
    <!--<div class="form-group">
        <label>*Tienda</label>
         <select name="delivery" class="form-control">
            <option value="0"<?php if($row['delivery']=='0') echo "selected"?>>NO</option>
            <option value="1"<?php if($row['delivery']=='1') echo "selected"?>>SI</option>
          </select>
      </div>-->
      
      <button type="submit" class="btn btn-primary btn-block"><?php echo $titulo ?></button>
    </form>
  </div>
</div>
<br>
<br>
<br>
</body>
</html>