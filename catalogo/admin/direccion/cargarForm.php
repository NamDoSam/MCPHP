<?php 
require_once('../../conexion/conexion.php');
//print_r($_POST);
//////CONTACTO//////////////////////////////////////////////////
if($_GET['form']=='contacto'){ 
	if($_GET['idSucursal']>0){
		$sql = "UPDATE sucursales SET idCliente='".$_POST['idCliente']."',nomFantasia='".$_POST['nomFantasia']."',codigo='".$_POST['codigo']."',horario='".$_POST['horario']."',telefono='".$_POST['telefono']."',whatsapp='".$_POST['whatsapp']."',direccion='".$_POST['direccion']."',dpto='".$_POST['dpto']."',provincia='".$_POST['provincia']."',pais='".$_POST['pais']."',facebook='".$_POST['facebook']."',instagram='".$_POST['instagram']."' WHERE idSucursal=".$_GET['idSucursal']."";
		$mysqli->query($sql) or die(mysql_error);
	}else{
		$auditoria = "INSERT INTO sucursales (idCliente,nomFantasia,codigo,horario,telefono,whatsapp,direccion,dpto,provincia,pais,facebook,instagram) VALUES ('".$_POST['idCliente']."','".$_POST['nomFantasia']."','".$_POST['codigo']."','".$_POST['horario']."','".$_POST['telefono']."','".$_POST['whatsapp']."','".$_POST['direccion']."','".$_POST['dpto']."','".$_POST['provincia']."','".$_POST['pais']."','".$_POST['facebook']."','".$_POST['instagram']."')";
		$mysqli->query($auditoria);
	}
header("location: direccion.php?slug=".$_GET['slug']);
exit();
}
?>