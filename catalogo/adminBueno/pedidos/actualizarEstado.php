<?php 
require_once("../../conexion/conexion.php");
$estado=$_POST['estado'];
$sql="INSERT INTO car_pedido (estado) VALUES('$estado')";
echo $mysqli->query($sql);
 ?>