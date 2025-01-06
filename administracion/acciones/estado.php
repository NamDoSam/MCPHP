<?php 
require_once('../conexion/conexion.php');
if($_GET['modulo']=='cliente'){
$sql = "UPDATE clientes SET estado='".$_GET['estado']."' WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
header("location: ../clientes.php");
}
//////////////////////////////////////////////////
if($_GET['modulo']=='categoria'){
$sql = "UPDATE categorias SET estado='".$_GET['estado']."' WHERE idCat='".$_GET['idCat']."'";
$mysqli->query($sql);
header("location: ../categoria.php?idCat=".$_GET['idCat']."&idItem=".$_GET['idItem']);
}
//////////////////////////////////////////////////
if($_GET['modulo']=='producto'){
$sql = "UPDATE productos SET estado='".$_GET['estado']."' WHERE idProducto='".$_GET['idProducto']."'";
$mysqli->query($sql);
header("location: ../productos.php?idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']);
}
//////////////////////////////////////////////////
if($_GET['modulo']=='esponsor'){
$sql = "UPDATE esponsor SET estado='".$_GET['estado']."' WHERE idEsponsor='".$_GET['idEsponsor']."'";
$mysqli->query($sql);
header("location: ../auspiciantes.php");
}
//////////////////////////////////////////////////
if($_GET['modulo']=='delivery'){
$sql = "UPDATE clientes SET delivery='".$_GET['delivery']."' WHERE idCliente='".$_GET['idCliente']."'";
$mysqli->query($sql);
header("location: ../clientes.php");
}
?>