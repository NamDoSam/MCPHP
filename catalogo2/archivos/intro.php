<style>
.cuadroImg {
    position: absolute;
    width: 90%;
    height: auto;
    z-index: 1;
}
.img{
	width: 100%;
}

</style>

<section class="page-section bg-light" id="portfolio">
    <div class="row">
<?php
		

if($_GET['c']){
	$rubro=$_GET['c']; 
	$idCat=$_GET['idCat'];
	$rub=''; 
	$limit='';
}
if($row['idCat']){
	$rubro=$rubro; 
	$rub=1;
	$idCat=$row['idCat'];
	$limit="LIMIT 12";
}
		
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"]; 
	
if($titulo)	{?>
<div align="center">Filtrar por Departamento</div>
	<div align="center">
		
<form name="form1" method="post" action="">
  <select style="width: 200px" name="dpto" class="form-select" onchange="this.form.submit()">
	  <option value="">Todos</option>
	<?php $resultado = $mysqli->query("SELECT * FROM departamentos ORDER BY departamento");
		while($dep = $resultado->fetch_assoc()){?>  
	  <option value="<?php echo $dep['departamento']?>"<?php if($dep['departamento']==$dpto) echo "selected"?>><?php echo $dep['departamento']?></option>
	  <?php }?>
  </select>
</form>
		</div>
		
<?php }	
if($dpto){
	$selec="SELECT cl.item,cl.nomFantasia,cl.slug,cl.localidad,cl.provincia,ce.cenefa
FROM clientes cl LEFT JOIN diseno ce ON cl.slug=ce.slug WHERE cl.item='".$idCat."' AND cl.localidad='".$dpto."' AND estado=1 ORDER BY cl.slug $limit ";
}else{
	$selec="SELECT cl.item,cl.nomFantasia,cl.slug,cl.localidad,cl.provincia,ce.cenefa
FROM clientes cl LEFT JOIN diseno ce ON cl.slug=ce.slug WHERE cl.item='".$idCat."' AND estado=1 ORDER BY cl.slug $limit ";
}
$c=$mysqli->query($selec);
$rub.$num_row = mysqli_num_rows($c);
		
while($cli = $c->fetch_assoc()){  
	
if($cli['cenefa'] != '') $colorCenefa=$cli['cenefa']; else $colorCenefa='#fff';
$directorio = "catalogo/imgCliente/".$cli['slug']."/logo/logo.png";
?>
      <div class="col-6 col-lg-2 col-sm-6 mb-4"> <!-- Portfolio item 2-->
        <div class="portfolio-item" >
        <a class="portfolio-link"  href="https://menucatalogo.com/catalogo?c=<?php echo $cli['slug'] ?>" target="_blank">

   <img style="background-color: #<?php echo $colorCenefa ?>;" class="img-fluid" src="img/div_fondo.png" alt="<?php echo $cli['nomFantasia'] ?>" />
<?php 
if(file_exists($directorio)){?> 
	<div class="cuadroImg">    
   		<img src="<?php echo $directorio ?>" style="width:140px" alt="<?php echo $cli['nomFantasia'] ?>" /> 
    </div>
<?php }else{ ?>
	<img class="cuadroImg" src="catalogo/img/logo_qr/menucatalgo.png" height="100%" alt="<?php echo $cli['nomFantasia'] ?>" /> 
<?php }?>           
           </a>
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
<div align="right"><a style="color:#009; font-size: 14px;" href="<?php echo $host."catalogo.php?c=".$rubro."&idCat=".$idCat ?>">Ver más tiendas >></a></div>
<?php  }?>
</section>