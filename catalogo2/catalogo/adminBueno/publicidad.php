<?php require_once('menu/menu.php');?>
<div class="container">
<h2>Esponsor</h2> 

<div align="center">
<form class="form-inline">
    <div class="form-group">
      <input type="text" class="form-control" id="filtrar" <?php echo $may ?>  placeholder="Buscar...">
    </div>
    <div class="form-group">
      <a href="Formulario_items.php?idItem=0"><button type="button" class="btn btn-warning">Nuevo Esponsor</button></a>
    </div>
  </form>
</div>

<div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Orden N°</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Edit</th>
        <th>Estado</th>
        <th>Borrar</th>
      </tr>
    </thead>
    
    <tbody class="buscar">
<?php 
$num=0;
$resultado = $mysqli->query("SELECT * FROM esponsor ORDER BY orden");
while($row = $resultado->fetch_assoc()){
	$num++;
?>   
      <tr>
        <td align="center"><?php echo $row['orden']?></td>
        <td><?php $nombre_fichero = "../img/publicidad/".$row['imagen'];
          if (file_exists($nombre_fichero)) {?>
                     <div>
                      <a class="example-image-link" href="<?php echo $nombre_fichero."?ver=".time() ?>" data-lightbox="example-1">
                      <img class="example-image" height="50" src="<?php echo $nombre_fichero ?>" 
                      title="<?php echo $row['descripcion'] ?>"/></a>
                    </div>
        <?php }else{?>
                    <img src="../img/productos/0.jpg" height="50" />
                <?php }?></td>

        <td><?php echo $row['nombre'] ?></td>

        <td><?php echo date("d-m-Y",strtotime($row['fecha'])) ?></td>
       
        <td align="center"><a href="Formulario_esponsor.php?idItem=<?php echo $row['idItem'] ?>"><font color='#3366CC'><i class='fa fa-pencil-square fa-lg'></i></font></a></td>
        <td align="center"><?php if($row['estado']==0){?>
		<a href="acciones/estado.php?estado=1&modulo=items&idItem=<?php echo $row['idItem'] ?>"><font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font></a>
        <?php }else{?>
		<a href="acciones/estado.php?estado=0&modulo=items&idItem=<?php echo $row['idItem'] ?>"><font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font></a>
        <?php }?>
        
        <td align="center"><font color='#CCCCCC'><i class='fa fa-trash fa-lg'></i></font></td>
      </tr>
<?php }?>
    </tbody>
  </table>
</div>
</div>

</body>
</html>