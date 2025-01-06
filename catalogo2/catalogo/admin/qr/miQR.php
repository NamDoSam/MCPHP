<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$re = $mysqli->query("SELECT cenefa FROM diseno WHERE slug='".$_GET['slug']."'");
$row = $re->fetch_assoc();
$color=$row['cenefa'];
?>
<style>
.marco{
	border:#F90 2px solid;
	border-radius: 8px;
	padding: 10px;
	background-color:#fff;
}
.logo{
	margin-bottom:10px;
	background-color:#<?php echo $color ?>;
	padding: 5px 0px 5px 0px;
}
.marca{
	margin-top:5px;
}
</style>

<div class="container">
<h2>Código QR</h2><hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
  <div class="marco">
  		<div class="logo" align="center">
        	<img src="../../imgCliente/<?php echo $_GET['slug']?>/logo/logo.png" width="70%">
        </div>
        
  		<img src="../../imgCliente/<?php echo $_GET['slug']?>/qr/codigoQR.png" width="100%">
        
        <div class="marca" align="center">
        	<img src="../../img/logo_qr/menucatalgo-marca.png" width="40%">
        </div>
  </div>
  	<div align="center"><br><a href="javascript:window.print()" >Imprimir</a></div>
  </div>
   <div class="col-sm-4"></div>
  </div>

</div>

<br><br><br><br><br><br>
<?php require($url.'template/footer.php'); ?>