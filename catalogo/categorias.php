<?php 
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="./?c=".$slug;
 ?>
 <style>
body {
	margin-top: 100px;
}
</style>
<br>
  <div class="animsition">
<br>
<div class="container">
<h4 align="center"><?php echo $_GET['tituloCategoria'] ?></h4>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
	<?php  
    $resultado = $mysqli->query("SELECT * FROM categorias WHERE idItem='".$_GET['menu']."' AND estado=0 AND ocultar=0 ORDER BY ordenCat");
    while($row = $resultado->fetch_assoc()){?>
        <div style="margin-bottom:10px">
        <a href="productos.php?c=<?php echo $slug?>&idCat=<?php echo $row['idCat'] ?>&tituloProducto=<?php echo $row['categoria'] ?>" style="text-decoration:none;"><button type="button" class="btn btn-info btn-block"><?php echo "- ".$row['categoria']." -" ?></button></a>
        </div>
    <?php }?>
 </div>
 </div>
<?php //require("productos/index.php"); ?>
</div>
</div>
 <br>
 <br>
 <br>
 <br>
<?php require("template/footer.php"); ?>