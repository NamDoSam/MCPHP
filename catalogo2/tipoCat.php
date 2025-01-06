<?php 
include 'conexion/conexion.php';
$resultado = $mysqli->query("SELECT idCliente,delivery FROM clientes ");
	while($row = $resultado->fetch_assoc()){
if($row['delivery'] > 0){
	$sql = "UPDATE clientes SET tipoCat='carrito' WHERE idCliente='".$row['idCliente']."'";
	$mysqli->query($sql) or die(mysqli_error($mysqli));
}else{
	$sql = "UPDATE clientes SET tipoCat='catalogo' WHERE idCliente='".$row['idCliente']."'";
	$mysqli->query($sql) or die(mysqli_error($mysqli));
}}
?>