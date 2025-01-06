<?php 
session_start();
//require('login/cerrarSesion.php');
require('conexion/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="img/logo/favicon.png" />
    <title>MenuCatalogo.com | Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
	background-color: #297575;
	border-bottom: 3px solid #ff7b0a;
}
</style>
	<script src="popup/js/lightbox-plus-jquery.min1.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    
<script language="JavaScript">
var mensaje="Desea eliminar el registro?";
function confirmar () { 
return confirm("Esta seguro de eliminar el registro?"); 
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
          <a class="navbar-brand" href="#"><img src="img/logo/logoLogin.png" width="150"></a> </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="auspiciantes.php">Auspiciantes</a></li>
           <!-- <li><a href="#">Contacto</a></li>
            <!~~<li><a href="productos.php">Productos</a></li>~~>
            <li><a href="#">Auspiciantes</a></li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="perfil.php">Editar Perfil</a></li>-->
            <li><a href="cliente.php"><i class="fa fa-user fa-lg" aria-hidden="true"></i> <?php echo $_SESSION['nomUsuario'] ?></a></li>
            <li><a href="login/salir.php">Salir</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
    </nav>
<!-- DRAGDABLE -->
<link href="draggable/css/styles.css" rel="stylesheet">
<link href="draggable/css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="js/jquery-3.5.1.js"></script>
<script src="draggable/css/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>
<!-- /DRAGDABLE -->