<?php 
session_start();
require_once($url."conexion/conexion.php");
require_once($url."imgCliente/".$_GET['c']."/config/config.php");
require_once($url."idiomas/idioma.php");
$za = $mysqli->query("SELECT tipoCat,estado FROM clientes WHERE idCliente='".NUM_CLIENTE."'");
$p = $za->fetch_assoc();
$tipoCat=$p['tipoCat'];
$estado=$p['estado'];
$ta = $mysqli->query("SELECT * FROM car_configuracion WHERE idCliente='".NUM_CLIENTE."'");
$config = $ta->fetch_assoc();
//echo "CARRITO ".CARRITO;
if($_SESSION['sesiones'][0]=='' && CARRITO==1){
 $_SESSION['sesiones'][0]=NUM_CLIENTE."_".date('dmYHis')."_".rand(1,100); 
}//else{ $_SESSION['sesiones'][0]='';}
$url_img=URL_BASE."imgCliente/".SLUG."/logo/logo.png";
//$_SESSION['celPedido']=$config['celPedido'];
?>
<!DOCTYPE html>
<html lang="<?php echo $user_language ?>">
    <head>
    <link rel="icon" type="image/png" href="<?php echo $url ?>img/logo_qr/favicon.png" />
        <meta charset="utf-8" />
        <meta name="theme-color" content="#e9521d">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
       	<meta property="og:url" content="<?php echo URL_BASE.'?c='.SLUG ?>"/>
        <meta property="og:type" content="website"/>
        <meta data-ue-u="og:image" property="og:image" content="<?php echo URL_BASE?>imgCliente/<?php echo SLUG?>/logo/logo.png"/>
        <meta property="og:site_name" content="MenuCatalogo"/>
        <meta name="author" content="" />
        <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src https://*; child-src 'none';">-->
        <title><?php echo TITULO ?></title>
        
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
   
 