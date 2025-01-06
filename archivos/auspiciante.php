<section class="page-section bg-light" id="portfolio">

    <div class="row">
<?php
if($_GET['c']){$rubro=$_GET['c']; $rub=''; $limit='';}else{$rubro=$rubro; $rub=1; $limit="LIMIT 12";}
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"]; 
$selec="SELECT rubro,nomFantasia,slug,localidad,provincia FROM clientes WHERE  concentrador='".$_GET['ausp']."' AND estado=1";
$c=$mysqli->query($selec);
$rub.$num_row = mysqli_num_rows($c);
while($cli = $c->fetch_assoc()){ ?>
      <div class="col-6 col-lg-2 col-sm-6 mb-4"> <!-- Portfolio item 2-->
        <div class="portfolio-item" >
        <a class="portfolio-link"  href="https://menucatalogo.com/catalogo?c=<?php echo $cli['slug'] ?>" target="_blank">

          <img class="img-fluid" src="img/div_fondo.png" alt="<?php echo $cli['nomFantasia'] ?>" />
           <img class="eye" src="catalogo/imgCliente/<?php echo $cli['slug'] ?>/logo/logo.png" height="90px" alt="<?php echo $cli['nomFantasia'] ?>" /> </a>
          <div class="portfolio-caption">
            <div class="portfolio-caption-heading"><?php echo $cli['nomFantasia'] ?></div>
            <div class="portfolio-caption-subheading text-muted"><?php echo $cli['rubro'] ?></div>
            <div style="font-size:10px"><?php echo $cli['localidad']." - ".$cli['provincia'] ?></div>
          </div>
        </div>
      </div>
   <?php }?>
    </div>
<?php if($num_row >= 12 && $rub==1){?>
<div align="right"><a style="color:#009; font-size: 14px;" href="<?php echo $host."catalogo.php?c=".$rubro ?>">Ver más tiendas >></a></div>
<?php }?>
</section>