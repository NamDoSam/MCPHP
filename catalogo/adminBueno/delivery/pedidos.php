<?php 
session_start();
print_r($_POST);
require_once('../conexion/conexion.php');
if($_GET['pedido']=="mesa"){
	$nombre="<div style='text-transform:capitalize;'>".$_POST['nombre']."</div>";
	echo $nombre;
}
?>