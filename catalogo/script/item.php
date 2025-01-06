<?php
require_once("../conexion/conexion.php");
$resultado = $mysqli->query("SELECT * FROM rubros WHERE idCliente=158");
while($row = $resultado->fetch_assoc()){
	echo "<br>".$row['idItem'];
	$sql = "INSERT INTO rubros (idCliente, item, menu,orden) 
	VALUES ('192','".$row['item']."','".$row['menu']."','".$row['orden']."')";
	$mysqli->query($sql);
}
?>