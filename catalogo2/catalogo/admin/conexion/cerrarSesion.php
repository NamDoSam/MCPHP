<?php 
session_start();
if($_SESSION['sesiones'][1]!=''){
	header("location: login.php?c=".$_GET['c']);
exit();
}
?>