<style>
[class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
    color: #000000;
}
.navbar-white {
    background-color: #ffa140;
    color: #1f2d3d;
}
</style>

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i style="font-size:22px" class="fas fa-bars"></i></a>
         </li>

     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li><div align="center">
         <?php $logo=ID_CONSENTRADOR; if ($logo > 0){ ?>
            <img style="padding: 0px;" src="<?php echo URL_BASE ?>img/concentradores/<?php echo ID_CONSENTRADOR ?>.png" width="80"></a> 
        <?php echo $letras; }else{?>
                <img src="<?php echo $url_base."img/logo_qr/logoLogin.png" ?>" width="100">
        <?php  echo $letras; }?>
		 </a></div></li>
         <li class="nav-item">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <!--<a href="#" class="nav-link"><h4>Sistema Vial</h4></a>-->
         </li>

         <!-- Messages Dropdown Menu -->
         <li class="nav-item dropdown">
             
         </li>
     </ul>
 </nav>
 <!-- /.navbar -->



<?php /////////////////////////////////////////////////////////////////////// ?>

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <div align="center"><a href="#" class="brand-link" style="background-color: #ffa140;">
         <?php $logo=ID_CONSENTRADOR; if ($logo > 0){ ?>
            <img src="<?php echo URL_BASE ?>img/concentradores/<?php echo ID_CONSENTRADOR ?>.png" width="140"></a> 
        <?php }else{?>
                <img src="<?php echo URL_BASE ?>img/logo_qr/logoLogin.png" width="140"></a>
        <?php }?>
		 </a></div>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3  d-flex">
             <div class="info">
                 <a href="#" class="d-block"><i class="fas fa-user"></i>&nbsp;&nbsp; <?php echo TITULO ?></a>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 
                <li class="nav-header" style="font-size: 0.9rem;" ><?php echo ADMINISTRACION ?></li>
<?php //////////////////////////////////////////////////////?>
	<?php 
	$target='';
	$sqli="SELECT tipoCat FROM clientes WHERE slug='".$_GET['slug']."'";
	$re = $mysqli->query($sqli);
	$r = $re->fetch_assoc();
	$sql="SELECT * FROM areas WHERE ".$r['tipoCat']." = 1 ORDER BY idArea";
	$resultado = $mysqli->query($sql);
	while($row = $resultado->fetch_assoc()){
	?>			 
                 <li class="nav-item" style="font-size: 0.9rem;">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-<?php echo $row['icono']?>"></i>
						<p><?php echo $row["area_$user_language"]?><i class="fas fa-angle-left right"></i></p>
                     </a>
		
        <?php //}
		$res = $mysqli->query("SELECT * FROM submenu WHERE area=".$row['idArea']." AND estado=0 ORDER BY idSubmenu");
		while($rows = $res->fetch_assoc()){	
		if($rows['target'] == 1) $target= "target='_blank'"; else $target='';
		?>	 
                     <ul class="nav nav-treeview" style="background-color: #ffc107; color: #2B2B2B;">
                         <li class="nav-item">
                             <a href="<?php echo $url.$rows['url']."?slug=".$_GET['slug']; ?>" <?php echo $target ?> class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p style="color: #000;"><?php echo $rows["submenu_$user_language"]?></p>
                             </a>
                         </li>
                     </ul>
		<?php }?>				 
                 </li>
                 
	<?php }//}?>
    <li><hr></li>
    <li class="nav-item" style="font-size: 0.9rem;">
    <div style=" font-size:19px; padding-left:20px"><a href="<?php echo $url?>conexion/salir.php?c=<?php echo $_GET['slug'] ?>"><i class="fas fa-sign-out-alt"></i> <?php echo SALIR ?></a></div>
    </li>			 
<?php //////////////////////////////////////////////////////?>	 
    
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<div class="content-header">-->
      <div class="container-fluid">
        
          <!--<div class="col-sm-12">
            <h1 class="m-0"><?php echo $title?></h1><hr>
          </div>--><!-- /.col -->
        <!-- /.row -->
      <!--</div>--><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->