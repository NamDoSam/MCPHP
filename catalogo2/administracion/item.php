<?php 
require_once('conexion/conexion.php');
$resultado = $mysqli->query("SELECT idCliente,item FROM clientes_old ");
	while($row = $resultado->fetch_assoc()){
		$res = $mysqli->query("SELECT idCat FROM item_categorias WHERE categoria='".$row['item']."'");
			$rol = $res->fetch_assoc();
			
		echo 	$row['idCliente']." - ".$row['item']." - ".$rol['idCat']."<br>";
		$sql = "UPDATE clientes SET item='".$rol['idCat']."' WHERE idCliente='".$row['idCliente']."'";
		$mysqli->query($sql);
	}

?>