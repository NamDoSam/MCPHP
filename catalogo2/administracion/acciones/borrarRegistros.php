<?php 
require_once('../conexion/conexion.php');
if($_GET['modulo']=='producto'){
$sql = "DELETE FROM productos WHERE idProducto='".$_GET['idProducto']."'";
$mysqli->query($sql);
header("location: ../productos.php?idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='auspiciante'){
$sql = "DELETE FROM esponsor_fijo WHERE idFijo='".$_GET['idFijo']."'";
$mysqli->query($sql);
header("location: ../auspiciantes.php");
}
//////////////////////////////////////////////////
if($_GET['modulo']=='esponsor'){
$sql = "DELETE FROM esponsor WHERE idEsponsor='".$_GET['idEsponsor']."'";
$mysqli->query($sql);
header("location: ../esponsor.php");
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='categoria'){
$sql = "DELETE FROM categorias WHERE idCat='".$_GET['idCat']."'";
$mysqli->query($sql);
header("location: ../categoria.php?idItem=".$_GET['idItem']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='items'){
$sql = "DELETE FROM rubros WHERE idItem='".$_GET['idItem']."'";
$mysqli->query($sql);
header("location: ../items.php");
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='sucursal'){
$sql = "DELETE FROM sucursales WHERE idSucursal='".$_GET['idSucursal']."'";
$mysqli->query($sql);
header("location: ../contacto.php");
exit();
}
?>