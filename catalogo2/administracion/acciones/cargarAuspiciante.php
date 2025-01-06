<?php 
session_start();
require_once('../conexion/conexion.php');
require_once('../script/slug.php');
$slug=slug($_POST['nombre']);
//exit;
//////CLIENTE//////////////////////////////////////////////////
if($_GET['idFijo'] > 0){ 
	$sql = "UPDATE esponsor_fijo SET nombre='".$_POST['nombre']."', slug='".$slug."', link='".$_POST['link']."'  WHERE idFijo=".$_POST['idFijo']."";
	$mysqli->query($sql) or die(mysql_error);
}else{
	$auditoria = "INSERT INTO esponsor_fijo (nombre,slug,link) VALUES ('".$_POST['nombre']."','".$slug."','".$_POST['link']."')";
	$mysqli->query($auditoria);
}
if ($_FILES['imagen']['name'] != null) {
	require('subirImagenEsponsor.php');
}
//echo $id;
header("location: ../auspiciantes.php");
exit();


?>