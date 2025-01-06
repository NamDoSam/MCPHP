<?php
include_once("../../conexion/conexion.php");
foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE productos SET ordenPro = '.$key.' WHERE idProducto ='.$value;
    $mysqli->query($update);        
}   
?>