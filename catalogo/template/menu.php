<style>
.navbar-nav {
    background: #<?php echo $color_cenefa ?>;
    display: flex;
    flex-direction: column;
    padding-left: 0px;
    margin-bottom: 0;
    list-style: none;
}
#mainNav .navbar-nav .nav-item .nav-link {
    font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 12px;
    color: #<?php echo $letra_menu ?>;
}
</style>
<?php 
//Compruebo si existe la foto
$logo=$url."imgCliente/".$slug."/logo/logo.png";
if (!file_exists($logo)) {
     $logotipo=$url."img/logo_qr/menucatalgo.png";
}else{
	$logotipo=$logo;
}?>
<!-- Navigation-->
<link href="<?php echo $url ?>css/categorias.css" rel="stylesheet" type="text/css" />
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #<?php echo $color_cenefa ?>; border-bottom: 2px solid #ff7b0a;">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="./?c=<?php echo $slug?>"><img src="<?php echo $logotipo ?>";/></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
  
                <li class="nav-item li"><a class="nav-link js-scroll-trigger" href="./?c=<?php echo $slug?>"><i class='fa fa-home'></i> <?php echo INICIO ?></a></li>
                
                <?php if($tipoCat == 'carrito'){
					if($_SESSION['sesiones'][1] > 0){?>
                <li class="nav-item li"><a class="nav-link js-scroll-trigger" href="<?php echo "conexion/salir.php?c=".$slug ?>">
				 <i class='fa fa-user'></i> <?php echo CERRAR_SESION ?></a></li>
                 <?php } else { ?> 
                 <li class="nav-item li"><a class="nav-link js-scroll-trigger" href="login.php?c=<?php echo $slug ?>&url=<?php echo $url_base ?>">
				 <i class='fa fa-user'></i> <?php echo INICIAR_SESION ?></a></li>
				 <?php } ?>
                
                <?php if($_SESSION['sesiones'][1] > 0){?>
                <li class="nav-item li"><a class="nav-link js-scroll-trigger" href="<?php //echo $url_base ?>ultimosPedidos.php?c=<?php echo $slug?>">
                 <i class='fa fa-shopping-cart'></i> <?php echo MIS_PEDIDOS ?></a>
                </li>
                <?php }}?>
                <?php if($tipoCat != 'presencia'){?>
                <li class="nav-item li"><a class="nav-link js-scroll-trigger" href="./?c=<?php echo $slug ?>#contacto"><i class="fa fa-map-marker"></i> <?php echo CONTACTO ?></a></li>
				<?php }?>
				<li class="nav-item li"><a class="nav-link js-scroll-trigger" href="whatsapp://send?text=<?php echo $url_base.'?c='.$slug ?>"><i class="fa fa-share-alt"></i> <?php echo COMPARTIR ?></a>
				</li>
		
              	<li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/?c=<?php echo $slug ?>" target="_blank"><i class="fa fa-cog"></i> <?php echo ADMIN ?></a></li>
                
                
                
            </ul>
        </div>
    </div>

</nav>
