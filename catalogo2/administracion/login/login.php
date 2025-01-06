<?php
session_start();
require_once('../conexion/conexion.php');
$sql="SELECT * FROM usuarios us, concentradores co WHERE us.email='".$_POST['email']."' AND us.pass='".$_POST['pass']."' AND us.estado=0 AND us.idConcentrador=co.idConcentrador";
$res = $mysqli->query($sql);
$row = $res->fetch_assoc();
	if($row['idUsuario']>0){
		$_SESSION['nomUsuario']=$row['apellido'].", ".$row['nombre'];
		$_SESSION['idUsuario']=$row['idUsuario'];
		$_SESSION['idConcentrador']=$row['idConcentrador'];
		$_SESSION['empresa']=$row['empresa'];
		header("location: ../inicio.php");
		exit();
	}else{
		header("location: ../?nota=NO TIENES PERMISO");
	}
?>