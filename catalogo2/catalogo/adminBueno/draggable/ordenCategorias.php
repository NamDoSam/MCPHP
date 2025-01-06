<?php
include_once("../../conexion/conexion.php");
foreach($_POST['city'] as $key=>$value) {
    $update = 'UPDATE categorias SET ordenCat = '.$key.' WHERE idCat ='.$value;
    $mysqli->query($update);        
}   
?>