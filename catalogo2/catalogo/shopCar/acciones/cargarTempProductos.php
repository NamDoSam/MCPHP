<?php
session_start();
require_once('../../conexion/conexion.php');
$url=$_GET['url'];
//print_r($_POST);
if($_POST['idProducto'] > 0) $cat=$_GET['tituloProducto']; else $cat=$_POST['tituloProducto'];
$insert = "INSERT INTO car_temp_pedido (cliente,token,categoria,idProducto,producto,nota,cantidad,precio) VALUES ('".$_POST['cliente']."','".$_SESSION['sesiones'][0]."','".$cat."','".$_POST['idProducto']."','".$_POST['producto']."','".$_POST['nota']."','".$_POST['cantidad']."','".$_POST['precio']."')";
	$mysqli->query($insert);
header("location: ".$url."?c=".$_GET['c']."&idCat=".$_GET['idCat']."&tituloProducto=".$_GET['tituloProducto']);
?>