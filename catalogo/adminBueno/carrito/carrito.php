<?php
session_start();
require_once('../conexion/conexion.php');
$url=$_GET['url'];
//print_r($_POS);
if($_GET['tituloProducto']!='') $cat=$_GET['tituloProducto']; else $cat=$_POST['tituloProducto'];
$insert = "INSERT INTO car_temp_pedido (cliente,idProducto,token,categoria,producto,cantidad,precio) VALUES ('".$_SESSION['idCliente']."','".$_POST['idProducto']."','".$_SESSION['token']."','".$cat."','".$_POST['producto']."','".$_POST['cantidad']."','".$_POST['precio']."')";
	$mysqli->query($insert);
header("location: ".$url."&idCat=".$_GET['idCat']."&tituloProducto=".$_GET['tituloProducto']);
?>