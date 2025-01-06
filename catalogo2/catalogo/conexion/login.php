<?php
session_start();
//print_r($_POST); exit;
require_once('../../catalogo/conexion/conexion.php');
$consulta="SELECT * FROM usuarios WHERE email='".$_POST['email']."' AND pass='".$_POST['pass']."' AND estado=1 AND rol!=0";
//exit;
$resultado = $mysqli->query($consulta);
$row = $resultado->fetch_assoc();
	if($row['idUsuario']>0){
		$_SESSION['nomUsuario']=$row['apellido'].", ".$row['nombre'];
		$_SESSION['idUsuario']=$row['idUsuario'];
			header(SERVERURL."location: ../");
		exit();
	}else{
		header("location: ../?login=NO TIENES PERMISO!!!");
	}
?>