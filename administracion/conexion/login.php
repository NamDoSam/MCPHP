<?php
session_start();
//print_r($_POST); exit;
require_once('conexion.php');
echo $consulta="SELECT * FROM usuarios WHERE email='".$_POST['email']."' AND pass='".$_POST['pass']."' AND estado=0";
exit;
$resultado = $mysqli->query($consulta);
$row = $resultado->fetch_assoc();
	if($row['idUsuario']>0 && $row['estado']==0){
		$_SESSION['nomUsuario']=$row['apellido'].", ".$row['nombre'];
		$_SESSION['idUsuario']=$row['idUsuario'];
		$_SESSION['estado']=$row['estado'];
			header(SERVERURL."location: ../");
		exit();
	}else{
		header("location: ../?login=NO TIENES PERMISO!!!");
	}
?>