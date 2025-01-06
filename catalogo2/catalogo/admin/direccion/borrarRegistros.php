<?php 
require_once('../../conexion/conexion.php');
//////////////////////////////////////////////////
if($_GET['modulo']=='sucursal'){
$sql = "DELETE FROM sucursales WHERE idSucursal='".$_GET['idSucursal']."'";
$mysqli->query($sql);
header("location: direccion.php?slug=".$_GET['slug']);
exit();
}
?>