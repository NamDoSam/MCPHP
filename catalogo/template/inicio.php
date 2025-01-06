<?php 
session_start();
require_once("conexion/conexion.php");
if($_SESSION['idCliente']!=$_GET['c']){
$resu = $mysqli->query("SELECT cl.idCliente,cl.nomFantasia,di.cenefa,di.botones_menu,di.letra_menu FROM clientes cl, diseno di 
WHERE cl.slug='".$_GET['c']."' AND cl.idCliente=di.idCliente AND cl.estado=1");
$c = $resu->fetch_assoc();
	$_SESSION['idCliente']=$c['idCliente'];
	$_SESSION['cenefa']=$c['cenefa'];
	$_SESSION['botones_menu']=$c['botones_menu'];
	$_SESSION['letra_menu']=$c['letra_menu'];
	$_SESSION['titulo']=$c['nomFantasia'];
	$_SESSION['slug']=$_GET['c'];
}
?>