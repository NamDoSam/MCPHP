<?php require_once("../conexion/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Bootstrap Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--<link rel="stylesheet" type="text/css" href="css/imprimirCatalogo.css">-->
</head>
<body>
<h2 align="center">- <?php echo $_GET['titulo'] ?> -</h2>
<?php
$query_cities = $mysqli->query('SELECT * FROM rubros WHERE idCliente="'.$_GET['idCliente'].'" AND ocultar=0');
while ($row = $query_cities->fetch_assoc()) {
?>
<div class="container">
  <h4><strong><?php echo $row['item'] ?></strong></h4>           
<table class="table">
<?php 
$num=0;
$categoria='';
$cat='SELECT * FROM categorias ca, productos pr 
WHERE ca.idCliente="'.$_GET['idCliente'].'" AND ca.idItem="'.$row['idItem'].'" AND ca.ocultar=0 AND ca.estado=0 
AND ca.idCliente=pr.idCliente AND ca.idCat=pr.idCat AND pr.ocultar=0 AND pr.estado=0 
ORDER BY ca.idCat,ca.ordenCat';	
	$queryCat = $mysqli->query($cat);
while ($cad = $queryCat->fetch_assoc()) {
$num++;	
if($categoria != $cad['categoria']){
	?>  
    <tr>
        <th width="80%"><?php echo $cad['categoria']?></th>
        <td width="20%"></td>
      </tr>
<?php  }?>      
      <tr>
        <th width="80%" style="font-weight:400; font-style:italic">&nbsp;&nbsp;&nbsp;• <?php echo $cad['producto'] ?></th>
        <td width="20%"><font size="3"><strong>$ <?php echo number_format($cad['precio'], 2, ',', '.') ?></strong></font></td>
      </tr>
<?php $categoria=$cad['categoria'];}?> 
  </table>
</div>

<?php }?>
</div>
</body>
</html>
