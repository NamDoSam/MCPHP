<?php 
session_start();
require_once($url."conexion/conexion.php");
require_once($url."idiomas/idioma.php");
$url=="https://menucatalogo.com/catalogo/";
$sql="SELECT cl.idCliente,cl.slug,cl.nomFantasia,cl.tipoCat,cl.estado,di.cenefa, di.letra_menu 
FROM clientes cl LEFT JOIN car_configuracion co ON cl.idcliente=co.idCliente LEFT JOIN diseno di ON cl.slug=di.slug
WHERE cl.slug='".$_GET['c']."'";
$za = $mysqli->query($sql);
$row = $za->fetch_assoc();
/////////////////////////////////////////////////////////
$tipoCat		=	$row['tipoCat'];
$idCliente		=	$row['idCliente'];
$estado			=	$row['estado'];
$slug			=	$row['slug'];
$titulo			=	$row['nomFantasia'];
$color_cenefa	=	$row['cenefa'];
$letra_menu		=	$row['letra_menu'];
///////////////////////////////////////////////////////////

if($_SESSION['sesiones'][0]=='' && $tipoCat=='carrito'){
 $_SESSION['sesiones'][0]=$idCliente."_".date('dmYHis')."_".rand(1,100); 
}
$host= $_SERVER["HTTP_HOST"];
if($host=='localhost'){
	$url_base="http://localhost/MenuCatalogo2.0/catalogo/";
}else{
	$url_base="https://menucatalogo.com/catalogo/";
}

$url_img=$url_base."imgCliente/".$slug."/logo/logo.png";
?>
<!DOCTYPE html>
<html lang="<?php echo $user_language ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="theme-color" content="#e9521d">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       	<meta property="og:url" content="<?php echo $url_base.'?c='.$slug ?>"/>
        <meta property="og:type" content="website"/>
        <meta data-ue-u="og:image" property="og:image" content="<?php echo $url_base?>imgCliente/<?php echo $slug?>/logo/logo.png"/>
        <meta property="og:site_name" content="MenuCatalogo"/>
        <meta name="author" content="" />
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';">-->
        <link rel="icon" type="image/png" href="img/logo/favicon.png" />
        <title><?php echo $titulo ?></title>
        
        <!-- Font Awesome icons (free version)-->
        
        <script src="//use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="//fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="//fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
        

		<!--<link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">-->
        
        <link href="<?php echo $url ?>css/styles.css" rel="stylesheet" />
        
        <!-- animsition.css -->
        <link rel="stylesheet" href="<?php echo $url ?>js/animsition/animsition.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- animsition.js -->
        <script src="<?php echo $url ?>js/animsition/animsition.min.js"></script>

<?php  
$may="style='text-transform:uppercase;' onblur='javascript:this.value=this.value.toUpperCase();'";
$min="style='text-transform:lowercase;' onblur='javascript:this.value=this.value.lowercase();'";
?> 
    </head>
<body id="page-top" style="background-color: #fff;">

<style>
footer {
   /* position: fixed;*/
    height: 60px;
    bottom: 10px;
    width: 100%;
	bottom: 0;
	background-color: #e9521d !important;
}
.btn-circle {
  width: 35px;
  height: 35px;
  text-align: center;
  padding: 5px;
  font-size: 16px;
  line-height: 1.428571429;
  border-radius: 17px;
  background-color: #F90;
  font-weight: 700;
  color:#fff;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 18px;
    font-weight: 400;
}
.dropdown-header {
    font-size: 1.6rem;
}
.dropdown-menu>li>a {
	color:#3a3f40;
    font-size: 1.6rem;
}
.dropdown-toggle::after {
    margin-left: 0em;
}
.bootstrap-select.btn-group .dropdown-toggle .caret {
    display: none;
}
.bootstrap-select.btn-group .dropdown-menu {
    background-color: #fff;
}
.dropdown-menu>li>a {
    font-family: "Montserrat";
}
 </style>  
   
 