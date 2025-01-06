<?php 
session_start();
require_once('../../conexion/conexion.php');
if($_GET['idDireccion']>0){
$sql = "DELETE FROM car_direccion_envio WHERE idDireccion='".$_GET['idDireccion']."'";
$mysqli->query($sql);
header("location: ../delivery/ubicacion.php?c=".$_GET['c']."&idCliente=".$_GET['idCliente']);
exit();
}