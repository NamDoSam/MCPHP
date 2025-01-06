<?php
session_start();
/////////////////////////////////////////////////////////
$tipoCat		=	'';
$idCliente		=	'';
$estado			=	'';
$slug			=	'';
$titulo			=	'';
$color_cenefa	=	'';
$letra_menu		=	'';
///////////////////////////////////////////////////////////
include $url . '../conexion/cerrarSesion.php';
include $url . '../conexion/conexion.php';
require $url . "../imgCliente/".$_GET['slug']."/config/config.php";
if($_GET['c'] != '') $slug=$_GET['c']; else $slug=$_GET['slug']; 
require_once($url."idiomas/idioma.php");
$sql="SELECT cl.idCliente,cl.slug,cl.nomFantasia,cl.tipoCat,cl.estado,di.cenefa, di.letra_menu 
FROM clientes cl LEFT JOIN car_configuracion co ON cl.idcliente=co.idCliente LEFT JOIN diseno di ON cl.slug=di.slug
WHERE cl.slug='".$slug."'";
$za = $mysqli->query($sql);
$row = $za->fetch_assoc();
/////////////////////////////////////////////////////////
$tipoCat		=	$row['tipoCat'];
$idCliente		=	$row['idCliente'];
$estado			=	$row['estado'];
//$slug			=	$row['slug'];
$titulo			=	$row['nomFantasia'];
$color_cenefa	=	$row['cenefa'];
$letra_menu		=	$row['letra_menu'];
///////////////////////////////////////////////////////////
$host= $_SERVER["HTTP_HOST"];
if($host=='localhost'){
	$url_base="http://localhost/MenuCatalogo2.0/catalogo/";
}else{
	$url_base="https://menucatalogo.com/catalogo/";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name = "viewport" content = "width = device-width, initial-scale = 1.0, minimum-scale = 1.0, maximum-scale = 1.0, user-scalable = no">
    <title>Sistema Gestión Catálogo</title>
    <link rel="icon" type="image/png" href="<?php echo $url ?>img/logo/favicon.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo $url ?>plugins/summernote/summernote-bs4.min.css">
		
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    
    
<?php
$may = "style='text-transform:uppercase;' onblur='javascript:this.value=this.value.toUpperCase();'";
$min = "style='text-transform:lowercase;' onblur='javascript:this.value=this.value.lowercase();'";
?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!--<div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>-->
<script language="JavaScript">
var mensaje="Desea eliminar el registro?";
function confirmar () { 
return confirm("Esta seguro de eliminar el registro?"); 
} 
</script>

<!--//////////////OCULTAR CON AVISO//////////-->
<script language="JavaScript">
function ocultar() { 
 return confirm("Desea ocultar el pedido?"); 
} 
</script>
