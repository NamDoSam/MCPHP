<?php 
require("../imgCliente/".$_GET['slug']."/config/config.php");
require('../conexion/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../img/logo_qr/favicon.png" />
    <title>MenuCatalogo.com | Administración</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="draggable/css/styles.css" rel="stylesheet">



    <style type="text/css">
body {
	margin-top:0px;
}
.glyphicon {
	margin-right:10px;
}
.panel-body {
	padding:0px;
}
.panel-body table tr td {
	padding-left: 15px
}
.panel-body .table {
	margin-bottom: 0px;
}
.navbar-brand {
	float: left;
	padding: 10px 10px;
	font-size: 18px;
	line-height: 20px;
}
.navbar-default {
	background-color: #863114;
	border-bottom: 3px solid #ff7b0a;
}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover, .navbar-default .navbar-nav>.open>a:focus {
    /* color: #555; */
    background-color: #e9511c;
	color:#FFFFFF;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 8px;
}
</style>
	<script src="js/popup/js/lightbox-plus-jquery.min1.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
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

<script type="text/javascript">
        $(document).ready(function () {

            (function ($) {

                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
</script>

<?php 
$may="style='text-transform:uppercase;' onblur='javascript:this.value=this.value.toUpperCase();'";
$min="style='text-transform:lowercase;' onblur='javascript:this.value=this.value.lowercase();'";
?>    
    </head>
    <body>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#"><img src="../img/logo_qr/logoLogin.png" width="150"></a> </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="items.php?slug=<?php echo SLUG ?>">Rubros</a></li>
            <li><a href="imprimirCatalogo.php?slug=<?php echo SLUG ?>&idCliente=<?php echo NUM_CLIENTE ?>&titulo=<?php echo TITULO ?>" target="_blank">Imprimir</a></li>
			<li><a href="promociones.php?slug=<?php echo SLUG ?>">Promociones</a></li>
            <li><a href="excelProductos.php?slug=<?php echo SLUG ?>">Actualizar Precios</a></li>
            <li><a href="contacto.php?slug=<?php echo SLUG ?>">Contacto</a></li>
            <!--<li><a href="productos.php">Productos</a></li>-->
            <li><a href="auspiciantes.php?slug=<?php echo SLUG ?>">Auspiciantes</a></li>
            <!--<li><a href="shopcar.php">ShopCar</a></li>-->
    <?php if(CARRITO==1){?>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tienda
                <span class="caret"></span></a>
                <ul class="dropdown-menu a">
                  <li><a href="shopcar.php?slug=<?php echo SLUG ?>">Panel de Control</a></li>
                  <li><a href="configuracionShopcar.php?slug=<?php echo SLUG ?>">Configuración General</a></li>
                  <li><a href="reportes.php?slug=<?php echo SLUG ?>">Reportes</a></li>
                  <li><a href="vendedores.php?slug=<?php echo SLUG ?>">Vendedores</a></li>
                  <!--<li><a href="estadisticasExcel.php?slug=<?php echo SLUG ?>&idCliente=<?php echo NUM_CLIENTE ?>">Estadísticas Excel</a></li>-->
                 <!-- <li><a href="#">Configurar Delivery</a></li>-->
                </ul>
              </li>
     <?php }?>
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="perfil.php">Editar Perfil</a></li>-->
            <li><a href="cliente.php?slug=<?php echo SLUG ?>"><i class="fa fa-user fa-lg" aria-hidden="true"></i> <?php echo TITULO ?></a></li>
            <li><a href="./?c=<?php echo SLUG ?>">Salir</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </nav>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- DRAGDABLE -->
<link href="draggable/css/styles.css" rel="stylesheet">
<link href="draggable/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<!--<script src="js/jquery-3.5.1.js"></script>-->
<!--<script src="draggable/css/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>
<!-- /DRAGDABLE -->
<!--DATEPICKER-->
<script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/moment.min.js"></script>
<script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/daterangepicker.js"></script>
<link href="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/css/daterangepicker.css" rel="stylesheet">
<style>
/*.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
    border: 1px solid #dadada;
    margin-bottom:  10px;
    padding: 10px;  
}  

.header {
    text-align: center;
    margin-top: 10px;
}*/
</style>
<script>
$(function () {
    $('#date_range').daterangepicker({
        "locale": {
            "format": "DD-MM-YYYY",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        /*"startDate": "<?php echo date('d-m-Y') ?>",
        "endDate": "<?php echo date('d-m-Y') ?>",*/
        "opens": "center"
    });
});
</script>
