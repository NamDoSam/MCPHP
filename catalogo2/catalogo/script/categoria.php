<?php
///https://menucatalogo.com/catalogo/script/categoria.php
require_once("../conexion/conexion.php");
$resultado = $mysqli->query("SELECT * FROM categorias ca, rubros ru WHERE ca.idCliente=158 AND ca.idItem=ru.idItem");
while($row = $resultado->fetch_assoc()){
	$re = $mysqli->query("SELECT idItem FROM rubros WHERE item='".$row['item']."' AND idCliente=192");
	$cat = $re->fetch_assoc();
	
	
	echo "<br>".$row['idCat']." - ".$row['item']." - ".$row['categoria']." - Cat ".$cat['idItem'];
	
	$sql = "INSERT INTO categorias (idCliente,idItem,categoria) 
	VALUES ('192','".$cat['idItem']."','".$row['categoria']."')";
	$mysqli->query($sql);
}
?>