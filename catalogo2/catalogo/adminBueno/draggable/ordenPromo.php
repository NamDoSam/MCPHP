<?php
include_once("../../conexion/conexion.php");
/*foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE promociones SET orden = '.$key.' WHERE idProducto ='.$value;
    $mysqli->query($update);        
} */  
foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE productos SET ordenPromo = '.$key.' WHERE idProducto ='.$value;
    $mysqli->query($update);        
}
?>