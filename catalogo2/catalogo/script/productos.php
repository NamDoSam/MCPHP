<?php
///https://menucatalogo.com/catalogo/script/productos.php
require_once("../conexion/conexion.php");
$resultado = $mysqli->query("SELECT * FROM categorias ca, productos pr WHERE ca.idCliente=158 AND ca.idCat=pr.idCat");
while($row = $resultado->fetch_assoc()){
	//echo "<br>SELECT idCat FROM categorias WHERE categoria='".$row['categoria']."' AND idCliente=192";
	$re = $mysqli->query("SELECT idCat FROM categorias WHERE categoria='".$row['categoria']."' AND idCliente=192");
	$cat = $re->fetch_assoc();
	
	
	echo "<br>".$row['idCat']." - ".$row['categoria']." - ".$row['producto']." - Cats ".$cat['idCat'];
	
	$sql = "INSERT INTO productos (idCliente,idCat,producto,descripcion,precio,precioPromo) 
	VALUES ('192','".$cat['idCat']."','".$row['producto']."','".$row['descripcion']."','".$row['precio']."','".$row['precioPromo']."')";
	$mysqli->query($sql);
}
?>