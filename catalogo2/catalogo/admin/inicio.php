<?php 
$url='';
require('template/cenefa.php'); 
require('template/menu.php'); 
?>
<style>
.imgRedonda {
	width:250px;
    height:250px;
    background-image: url();
	background-size: cover;
	border-radius: 50%;
	margin: 0 auto;
    border-radius:160px;
    border:8px solid #acacad;
}
.recuadro{
	padding:10px;
	background-color:#<?php echo $color_cenefa ?>;
	border: #999 1px solid;
	border-radius: 8px;
}
</style>

<div class="container">
<div align="center">
<br><br><br>
<h5>ADMINISTRACION</h5>
<?php
$logo="../imgCliente/".$slug."/logo/logo.png";
if (!file_exists($logo)) {
     $logotipo="img/logo/menucatalgo-cuadrada.jpg";
}else{
	$logotipo=$logo;
}
?>
<div ><img src="<?php echo $logotipo ?>" class="recuadro"/></div>
</div>
</div>

<?php 
require('template/footer.php'); 
?>