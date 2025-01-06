<?php 
session_start();
if($_SESSION['idCliente']==''){
	header("location: ../");
exit();
}
?>