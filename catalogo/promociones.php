<?php 
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="./?c=".$slug;
 ?>
 <style>
body {
	margin-top: 80px;
}
</style>
<div class="animsition">
<!-- Portfolio Grid-->
  <style>
a:hover {
  /*font-size:20px;*/
  color:#FC0;
  text-decoration: none;
}
.status {
    padding: 10px 5px;
    color: #fff;
    font-weight: 600;
    background: #ff0000;
    -webkit-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;
    writing-mode: vertical-lr;
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    text-orientation: sideways;
    text-align: right;
    text-orientation: sideways;
    margin: 0rem;
    position: absolute;
    top: 0;
    left: 12px;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 15px;
    z-index: 1;x
}

.statusAgotado {
    padding: 10px 5px;
    color: #fff;
    font-weight: 600;
    background: #a3bd31;
    -webkit-writing-mode: vertical-lr;
    -ms-writing-mode: tb-lr;
    writing-mode: vertical-lr;
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
    text-orientation: sideways;
    text-align: right;
    text-orientation: sideways;
    margin: 0rem;
    position: absolute;
    top: 0;
    left: 12px;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 15px;
    z-index: 1;x
}

.btn-menos {
        display: none;
}
.btn-mas {
        display: none;
}
</style>
<section class="page-section bg-light" id="<?php //echo $cat['menu'] ?>">
  <div class="container">

    <h4 style="background-color:#C00; color:#FFF; padding:5px; margin-bottom:20px; margin-top:20px" align="center">- <?php echo PROMOCIONES;?> -</h4>
    <div class="row">
      
    <?php $promo="SELECT * FROM productos WHERE idCliente='".$idCliente."' AND ocultar=0 AND (promo=1 || precioPromo > 0) ORDER BY ordenPromo";
$r = $mysqli->query($promo);
		while($prod = $r->fetch_assoc()){
		if ($prod['agotado']>0) $modal=''; else	$modal='modal';	
			?>
      <div class="col-lg-4 col-sm-6 col-mb-4">
        <div class="portfolio-item"> 
        <a class="portfolio-link" data-toggle="<?php echo $modal ?>" href="#detalle<?php echo $prod['idProducto'] ?>">
        
         <?php 
		 if (($prod['precioPromo']>0 && $prod['agotado']==0)  || $prod['promo']==1){ ?>
         <span class="status"><?php echo PROMOCION ?></span>
		 <?php }if ($prod['precioPromo']>0 && $prod['agotado']==1){?>
         <span class="statusAgotado"><?php echo AGOTADO ?></span>
         <?php }?>
         
         <?php 
		$imagen="imgCliente/".$slug."/productos/".$prod['idProducto'].".jpg";?>
        <img class="img-fluid" style="border: 1px solid #d1cece;" src="<?php echo $imagen."?ver=".time(); ?>" /> 
          <div style="background-color:#13363c; color:#FFF; padding:10px 0 10px; margin-bottom:20px; border-bottom:3px #FFF" align="center">
            <div><?php echo $prod['producto']?>
            <div><?php if($prod['codigo']) echo "<font size='2' color='#FFFFFF'>Cod. (".$prod['codigo'].")</font>" ?></div>
           
            <?php if ($prod['precio']>0){ ?>
            <?php if ($prod['precioPromo']>0){ ?>
   <font color="#999" style="font-size: 22px; text-decoration:line-through">$ <?php  echo number_format($prod['precio'], 2, ',', '.') ?></font>
            &nbsp;&nbsp;&nbsp;
            <font color="#fff" style="font-size: 22px;">$ <?php echo number_format($prod['precioPromo'], 2, ',', '.') ?></font>
            &nbsp;&nbsp;
            <?php }else{?>
            <font color="#fff" style="font-size: 22px;"> <?php if($prod['precio']>0) echo "$ ".number_format($prod['precio'], 2, ',', '.') ?></font>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }}?>
            <button type="button" class="btn btn-danger"><?php echo DETALLE ?></button></div></a>
            <!--<div class="portfolio-caption-subheading text-muted">Illustration</div>--> 
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>


<!-- Modal 1-->
<?php
$m = $mysqli->query("SELECT * FROM productos WHERE idCliente='".$idCliente."' AND ocultar=0 AND (promo=1 || precioPromo > 0) ORDER BY ordenPromo");
while($modal = $m->fetch_assoc()){?>
  <div class="portfolio-modal modal fade" id="detalle<?php echo $modal['idProducto'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
		  
	<div class="modal-header">
		<h5 class="modal-title"><?php echo $modal['producto']?>
        <?php if ($modal['codigo'] != '') echo "<br><font size='2'><strong>Cod. ".$modal['codigo']."</strong></font>" ?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
     <?php $imagen="imgCliente/".$slug."/productos/".$modal['idProducto'].".jpg";
		 if (file_exists($imagen)){ ?>
		  <img class="img-fluid d-block mx-auto" style="border: 0px solid #b3aeae;" src="imgCliente/<?php echo $slug ?>/productos/<?php echo $modal['idProducto'].".jpg?ver=".time() ?>"/>
		  <?php } else { echo "<br>";}?>
		  
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="modal-body">
				  
                <!-- Project Details Go Here-->
                <p class="item-intro text-muted"><?php echo $modal['descripcion'] ?></p>
                <?php if ($modal['precio'] > $modal['precioPromo'] && $modal['precioPromo'] > 0){  $precio=$modal['precioPromo']; ?>
                <font color="#999" style="font-size: 22px; text-decoration:line-through">$ <?php echo number_format($modal['precio'], 2, ',', '.') ?></font> &nbsp;<font color='#FF0000' size=3>[PROMO]</font>&nbsp; <font color="#333" style="font-size: 22px;">$ <?php echo number_format($modal['precioPromo'], 2, ',', '.') ?></font>
                <?php }else{ 
				if ($modal['precio']>0){  $precio=$modal['precio']; ?>
                <h3><font color="#666666" style="font-size: 22px;"><?php if($modal['precio']>0) echo "$ ".number_format($precio, 2, ',', '.') ?></font></h3>
                <?php }}?>
                <!-- <br> -->
                <td> <!-- <br> -->
                  <form name="form1" action="shopCar/acciones/cargarTempProductos.php?url=../../promociones.php&c=<?php echo $slug?>" method="post">
                    <input type="hidden" name="idProducto" value="<?php echo $modal['idProducto'] ?>">
                    <input type="hidden" name="producto" value="<?php echo $modal['producto'] ?>">
					<input type="hidden" name="tituloProducto" value="<?php echo $modal['categoria'] ?>">
                    <input type="hidden" name="precio" value="<?php echo $precio?>">
                    <input type="hidden" name="cliente" value="<?php echo $idCliente ?>">
                    <div align="center">
						
					<br>
					<?php 
					///////////////CARRITO//////////////////////////////////
					$k = $mysqli->query("SELECT abierto FROM clientes WHERE idCliente='".$idCliente."'");
					$z = $k->fetch_assoc();
					if($tipoCat == 'carrito' && $z['abierto']==1){?>
                      <div class="input-group mb-3" style="max-width: 170px;"> 
                        <!-- prepend "-" -->
                        <div class="input-group-prepend">
                          <button role="button" class="input-group-text btn-menos btn-custom-number-down" target="#numbersExample"> <i class="tk-icon-minus"></i> </button>
                        </div>
                        <!-- input -->
                        <input type="number" name="cantidad" id="numbersExample" class="form-control custom-number"  min="1" max="" aria-label="Username" aria-describedby="numbers" value="1" required>
                        <!-- append "+" -->
                        <div class="input-group-append">
                          <button role="button" class="input-group-text btn-mas btn-custom-number-up" target="#numbersExample"> <i class="tk-icon-plus"></i> </button>
                        </div>
                        
                      </div>
                      <div align='center'>
                      <label for="pwd"><?php echo NOTA_PRODUCTO ?></label>
                        <textarea name="nota" placeholder="<?php echo TEXTO_1 ?>" class="form-control" rows="2" cols="2"></textarea>
                      </div><br>
					<?php } else { echo "<br>";}?>	
						
                    </div>
                    <?php //echo $_SESSION['token'] ?>
                    <button class="btn btn-danger" data-dismiss="modal" type="button"> <i class="fas fa-times mr-1"></i> <?php echo CERRAR ?> </button>
					  <?php if($tipoCat == 'carrito' && $z['abierto']==1){?>
                    <button class="btn btn-primary" type="submit"> <i class="fas fa-cart-plus mr-1"></i> <?php echo CARGAR_PEDIDO ?> </button>
					  <?php }?>	
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }?>
 <br>
 <br>
 </div>
<script src="js/bootstrap-input-spinner.js"></script> 
<script>
    $("input[type='number']").inputSpinner()
</script>
<?php require_once("template/footer.php"); ?>