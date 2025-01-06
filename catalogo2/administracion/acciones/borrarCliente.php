<?php 
require_once('../conexion/conexion.php');
if($_GET['idCliente']){
$sql = "DELETE FROM productos WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
$sql = "DELETE FROM categorias WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
$sql = "DELETE FROM rubros WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
$sql = "DELETE FROM promociones WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
$sql = "DELETE FROM sucursales WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
$sql = "DELETE FROM clientes WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
header("location: ../clientes.php");
exit();
}