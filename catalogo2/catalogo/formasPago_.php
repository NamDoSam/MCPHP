<?php 
session_start();
if(!isset($_SESSION['idComprador'])){?>
<script type="text/javascript">
window.location="login.php?c=<?php echo $_GET['c'] ?>";
</script>
<?php exit();}
$_SESSION['mesa']=$_POST['mesa'];
/*print_r($_SESSION);
print_r($_POST);
exit();*/
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="finalizarPedido.php?c=".SLUG;
$may="style='text-transform:capitalize;' onblur='javascript:this.value=this.value.capitalize();'";
//require_once('MP_pago/mp_sdk.php');
?>
<style type="text/css">
.Rent {
  width: 200px;
  /*width: 80%;*/
}
.a{
	text-decoration: none;}
}
</style>
<div class="animsition">
<br><br><br><br><br>
<div class="container">
	<h3 align="center">Pagar Pedido </h3>
	<h6 align="center"><font color="#908F8F"><?php echo $_SESSION['nombreComp']?></font></h6>
	<h6 align="center">Mesa: <?php echo "<strong>".$_SESSION['mesa']."</strong>&nbsp;&nbsp; | &nbsp;&nbsp;Pago: <strong>$ ".number_format($_SESSION['totalPago'], 2, ',', '.')."</strong>"?></h6>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 col-sm-6 my-2">

	  <div style="margin-bottom:20px">
	  	<a style="text-decoration:none" href="delivery/cargarPago.php?c=<?php echo SLUG ?>&pago=EFECTIVO"><button type="button" class="btn btn-success btn-block"><i class="fas fa-money-bill-wave fas-lg" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; PAGO CON EFECTIVO</button></a>
        </div>
<?php //print_r($_SESSION); ?>
        <div style="margin-bottom:20px">
        <a style="text-decoration:none" href="<?php echo $preference->init_point; ?>"><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal-delivery"><i class="fa fa-credit-card" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; PAGO CON TARJETA</button></a>
        </div>

        <div style="margin-bottom:20px">
        <a href="<?php echo $volver ?>"><button type="button" class="btn btn-danger"><< Volver</button></a>
        </div>

</div>
</div>
</div>
</div>
<?php require("template/footer.php"); ?>

