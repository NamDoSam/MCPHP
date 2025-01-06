<?php 
require_once('../../../../conexion/conexion.php');
if($_GET['modulo']=='items'){
$sql = "UPDATE rubros SET estado='".$_GET['estado']."' WHERE idItem='".$_GET['idItem']."'";
$mysqli->query($sql);
header("location: ../rubro.php?slug=".$_GET['slug']);
}
//////////////////////////////////////////////////
if($_GET['modulo']=='categoria'){
    $sql = "UPDATE categorias SET estado='".$_GET['estado']."' WHERE idCat='".$_GET['idCat']."'";
    $mysqli->query($sql);
    header("location: ../categorias.php?slug=".$_GET['slug']."&idCat=".$_GET['idCat']."&idItem=".$_GET['idItem']);
    }
    //////////////////////////////////////////////////
    if($_GET['modulo']=='producto'){
    $sql = "UPDATE productos SET estado='".$_GET['estado']."' WHERE idProducto='".$_GET['idProducto']."'";
    $mysqli->query($sql);
    header("location: ../productos.php?slug=".$_GET['slug']."&idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']."&idItem=".$_GET['idItem']);
    }
	//////////////////////////////////////////////////
    if($_GET['modulo']=='stock'){
    $sql = "UPDATE productos SET agotado='".$_GET['agotado']."' WHERE idProducto='".$_GET['idProducto']."'";
    $mysqli->query($sql);
    header("location: ../productos.php?slug=".$_GET['slug']."&idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']."&idItem=".$_GET['idItem']);
    }
    //////////////////////////////////////////////////
    if($_GET['modulo']=='esponsor'){
    $sql = "UPDATE esponsor SET estado='".$_GET['estado']."' WHERE idEsponsor='".$_GET['idEsponsor']."'";
    $mysqli->query($sql);
    header("location: ../auspiciantes.php?slug=".$_GET['slug']);
    }
    //////////////////////////////////////////////////
    if($_GET['modulo']=='promo'){
    $sql = "UPDATE productos SET promo='".$_GET['promo']."' WHERE idProducto='".$_GET['idProducto']."'";
    $mysqli->query($sql);
    header("location: ../productos.php?slug=".$_GET['slug']."&idCat=".$_GET['idCat']."&idItem=".$_GET['idItem']);
    }
	//////////////////////////////////////////////////
    if($_GET['modulo']=='promo2'){
    $sql = "UPDATE productos SET promo='".$_GET['promo']."' WHERE idProducto='".$_GET['idProducto']."'";
    $mysqli->query($sql);
    header("location: ../../../promocion/promociones.php?slug=".$_GET['slug']);
    }
    ?>