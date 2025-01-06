<?php 
session_start();
if($_SESSION['sesiones'][1]==''){?>
<script type="text/javascript">
window.location="login.php?c=<?php echo $_GET['c'] ?>";
</script>
<?php 
exit();
}
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="listadoPedido.php?c=".$slug;
$may="style='text-transform:capitalize;' onblur='javascript:this.value=this.value.capitalize();'";
//$_SESSION['totalPago']=$_GET['total'];
?>
<br>
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
	<h3 align="center"><?php echo FINALIZAR_PEDIDO ?></h3> <div align="center" style="color:#999999"><?php echo $_SESSION['sesiones'][2] ?></div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 col-sm-6 my-2">
<?php
//if($_POST['vendedor']==''){
///////////////VENDEDORES//////////////////
$V=$mysqli->query("SELECT COUNT(idVendedor) AS cant FROM vendedores WHERE idCliente='".$idCliente."'");
		$row = $V->fetch_assoc();
		if($row['cant'] > 0 && $_POST['vendedor']==''){?>
			
		<form name="form1" method="post" action="">
		  <div align="center"><label for="select"><?php echo TEXTO_4 ?></label></div>
		  <select class="form-control" name="vendedor" onchange="this.form.submit()" required>
          <option value=""></option>
          <?php $z=$mysqli->query("SELECT * FROM vendedores WHERE idCliente='".$idCliente."'");
			while($r = $z->fetch_assoc()){?>
			<option value="<?php echo $r['nombre'] ?>"><?php echo $r['nombre'] ?></option>
            <?php }?>
		  </select>
		</form>
		
		<?php }else{
			if($_POST['vendedor']){
echo "<h6 align='center'>Vendedor: <small><strong>".$_POST['vendedor']."</strong></small></h6>";	
			}
///////////////////////////////////////////	
"SELECT eMesa,eRetirar,eDelivery,pEnvio FROM car_configuracion WHERE idCliente='".$idCliente."'";	
$m=$mysqli->query("SELECT eMesa,eRetirar,eDelivery,pEnvio FROM car_configuracion WHERE idCliente='".$idCliente."'");
		$rox = $m->fetch_assoc(); ?>
        <?php if($rox['eMesa']==1){ ?>
	  <div style="margin-bottom:20px">
	  	<a style="text-decoration:none" href="shopCar/mesa/mesa.php?c=<?php echo $slug?>&envio=MESA&vendedor=<?php echo $_POST['vendedor'] ?>"><button type="button" class="btn btn-success btn-block"><i class="fa fa-coffee" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; <?php echo PEDIDO_1 ?></button></a>
        </div>
		<?php } if($rox['eRetirar']==1){ ?>
        <div style="margin-bottom:20px">
        <a style="text-decoration:none" href="shopCar/cargarPedido.php?c=<?php echo $slug?>&idCliente=<?php echo $idCliente?>&envio=RETIRO&vendedor=<?php echo $_POST['vendedor'] ?>"><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal-retiro"><i class="fa fa-car" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; <?php echo PEDIDO_2 ?></button></a>
        </div>
        <?php } if($rox['eDelivery']==1){ ?>
        <div style="margin-bottom:20px"> 
        <?php if($config['pDelivery'] <= $_SESSION['sesiones'][3]){?>
        <a style="text-decoration:none" href="shopCar/delivery/ubicacion.php?c=<?php echo $slug ?>&envio=DELIVERY&idCliente=<?php echo $idCliente?>&vendedor=<?php echo $_POST['vendedor'] ?>"><button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal-retiro"><i class="fa fa-motorcycle" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; DELIVERY <br>(<?php echo PEDIDO_3 ?> $<?php echo $rox['pEnvio']?>)</button></a>
        <?php }else{?>
        <button type="button" class="btn btn-success btn-block disabled" data-toggle="modal" data-target="#myModal-retiro"><i class="fa fa-motorcycle" style="font-size: 25px"></i> &nbsp;&nbsp;&nbsp; DELIVERY<br>(<?php echo PEDIDO_3 ?> $<?php echo $rox['pEnvio']?>)</button>
         <?php }}?>
        </div>  
 <?php }?>
</div>
</div>
</div>
</div>
<?php require("template/footer.php"); ?>

