<?php
require_once('../../conexion/conexion.php');
$consulta="SELECT idCliente,apellido,nombre,nomFantasia,delivery FROM clientes WHERE email='".$_POST['email']."' AND pass='".$_POST['pass']."' AND slug='".$_GET['slug']."'";
//exit();
$resultado = $mysqli->query($consulta);
$row = $resultado->fetch_assoc();
	if($row['idCliente']>0){
		header("location: ../inicio.php?slug=".$_GET['slug']."");
		exit();
	}else{
		header("location: ../?c=".$_GET['slug']."&nota=NO TIENES PERMISO");
	}
?>