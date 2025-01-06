<footer class="fixed-bottom">
<div class="container">
<div style="padding: 6px" align="center">
<div class="row">
  <div class="col-2"><?php if ($volver){ ?>
<!--<button type="button" class="btn btn-primary btn-xs" onclick="history.back();"><< Volver</button>-->
<a onclick="history.back();" href="#"><img src="<?php echo $url ?>img/iconos/volver.png" width="70"></a>
<?php }?>
</div>
  <div class="col-8">
  <?php  
if($tipoCat=='carrito')	{
	$m = $mysqli->query("SELECT SUM(cantidad) cantidad,SUM(precio*cantidad) total FROM car_temp_pedido WHERE token='".$_SESSION['sesiones'][0]."' AND cliente='".$idCliente."'");
	$rox = $m->fetch_assoc();
	$total=$rox['total'];
	if ($rox['total']>0){ ?>
		<a href="<?php //echo $url_base ?>listadoPedido.php?c=<?php echo $slug?>"><button type="button" class="btn btn-info"><?php  echo VER_PEDIDO." -  $ ".number_format($rox['total'], 2, ',', '.') ; ?></button></a>
	<?php }?>
	
<?php } if($tipoCat!='carrito' || $total==0){?>
	&nbsp;
	<a href="https://menucatalogo.com" style="text-decoration: none; vertical-align: middle;" target="_blank"><font color="#FFFFFF"; size="3"> By</font>
     <?php $logo=ID_CONSENTRADOR; if ($logo > 0){ ?>
		<img src="img/concentradores/<?php echo ID_CONSENTRADOR ?>.png" height="50"></a> 
    <?php }else{?>
		<img src="img/logo_qr/logoLogin.png" width="120"></a>
    <?php }?>
    
<?php }?>
  </div>
  <div class="col-2">
  <?php if ($volver){ ?>
	<a href="<?php echo $url_base."?c=".$slug ?>"><img src="<?php echo $url ?>img/iconos/home.png" width="70"></a>
<?php }?>
  </div>
  </div>
</footer>
</div></div>

 <!-- Bootstrap core JS-->
       
        <script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

<!--ANIMACION-->
<script>
$(document).ready(function() {
  $(".animsition").animsition({
    inClass: 'fade-in-left',
    outClass: 'fade-out-left',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: true,
    loadingParentElement: 'body', //animsition wrapper element
    loadingClass: 'animsition-loading',
    loadingInner: '', // e.g '<img src="loading.svg" />'
    timeout: false,
    timeoutCountdown: 5000,
    onLoadEvent: true,
    browser: [ 'animation-duration', '-webkit-animation-duration'],
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
    overlay : false,
    overlayClass : 'animsition-overlay-slide',
    overlayParentElement : 'body',
    transition: function(url){ window.location.href = url; }
  });
});
</script>

    </body>
</html>