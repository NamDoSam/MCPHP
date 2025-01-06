<?php require_once('menu/menu.php');?>
<div class="container">
<h2>Productos</h2> 
<link rel="stylesheet" href="popup/css/lightbox.min.css">
<div align="center">
<form class="form-inline">
    <div class="form-group">
      <input type="text" class="form-control" id="filtrar" <?php echo $may ?>  placeholder="Buscar Producto...">
    </div>
  </form>
</div>

<div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Imagen</th>
        <th>Categoría</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Promo</th>
        <th>Adicionar</th>
      </tr>
    </thead>
    
    <tbody class="buscar">
<?php 
$num=0;
$promo="SELECT * FROM productos WHERE idCliente='".NUM_CLIENTE."' AND (promo = 0 && precioPromo = 0)";
$r = $mysqli->query($promo);
while($row = $r->fetch_assoc()){
	$num++;
?>  
      <tr <?php echo $promo ?>>
        <td><?php $nombre_fichero = "../imgCliente/".SLUG."/productos/".$row['idProducto'].".jpg";
					if (file_exists($nombre_fichero)) {?>
                     <div>
                      <a class="example-image-link" href="<?php echo $nombre_fichero."?ver=".time() ?>" data-lightbox="example-1">
                      <img class="example-image" height="50" src="<?php echo $nombre_fichero ?>" 
                      title="<?php echo $row['descripcion'] ?>"/></a>
                    </div>
				<?php }else{?>
                    <img src="../imgCliente/productos/0.jpg" height="50" />
                <?php }?></td>
        <td><?php echo $row['categoria'] ?></td>
        <td><?php echo $row['producto'] ?></td>
        <td><?php echo number_format($row['precio'], 2, ',', '.') ?></td>
        <td><?php echo number_format($row['precioPromo'], 2, ',', '.') ?></td>
        <td><a href="acciones/cargarForm.php?idCliente=<?php echo NUM_CLIENTE ?>&slug=<?php echo SLUG ?>&form=adicion&idProducto=<?php echo $row['idProducto'] ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" ></i></button></a>
        </td> 
      </tr>
<?php }?>
    </tbody>
  </table>
</div>
</div>
</body>
</html>