<?php
include_once("../../conexion/conexion.php");
foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE rubros SET orden = '.$key.' WHERE idItem ='.$value;
    $mysqli->query($update);        
}   
?>