<?php 
session_start();
require_once('../conexion/conexion.php');
$result = $mysqli->query("SELECT * FROM car_temp_pedido");
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
}
?>