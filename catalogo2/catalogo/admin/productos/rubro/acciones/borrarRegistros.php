<?php 
require_once('../../../../conexion/conexion.php');
if($_GET['modulo']=='producto'){
	$sql = "UPDATE productos SET ocultar=1 WHERE idProducto=".$_GET['idProducto']."";
	$mysqli->query($sql);
header("location: ../productos.php?slug=".$_GET['slug']."&idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']);
exit();
}
//////////////////////////////////////////////////
/*if($_GET['modulo']=='categoria'){
$sql = "UPDATE categorias SET estado='".$_GET['estado']."' WHERE idCat='".$_GET['idCat']."'";
$mysqli->query($sql);
header("location: ../categoria.php");
}*/
//////////////////////////////////////////////////
if($_GET['modulo']=='esponsor'){
$sql = "DELETE FROM esponsor WHERE idEsponsor='".$_GET['idEsponsor']."'";
$mysqli->query($sql);
header("location: ../auspiciantes.php?slug=".$_GET['slug']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='categoria'){
	$sql = "UPDATE categorias SET ocultar=1 WHERE idCat=".$_GET['idCat']."";
	$mysqli->query($sql);
header("location: ../categorias.php?slug=".$_GET['slug']."&idItem=".$_GET['idItem']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='items'){
	$sql = "UPDATE rubros SET ocultar=1 WHERE idItem=".$_GET['idItem']."";
	$mysqli->query($sql);
header("location: ../rubro.php?slug=".$_GET['slug']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='sucursal'){
$sql = "DELETE FROM sucursales WHERE idSucursal='".$_GET['idSucursal']."'";
$mysqli->query($sql);
header("location: ../contacto.php?slug=".$_GET['slug']);
exit();
}
//////////////////////////////////////////////////
if($_GET['modulo']=='vendedor'){
	$sql = "DELETE FROM vendedores WHERE idVendedor='".$_GET['idVendedor']."'";
	$mysqli->query($sql);
	header("location: ../vendedores.php?slug=".$_GET['slug']);
	exit();
	}

//////////////////////////////////////////////////
if($_GET['modulo']=='promo'){
if($_GET['idProducto']>0){
$sql = "UPDATE productos SET precioPromo=0, promo=0 WHERE idProducto=".$_GET['idProducto']."";
$mysqli->query($sql) or die(mysql_errno());
}
header("location: ../promociones.php?slug=".$_GET['slug']);
exit();
}
?>