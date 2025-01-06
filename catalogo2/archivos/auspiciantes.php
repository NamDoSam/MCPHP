<div class="row">
<?php 
$selec="SELECT nombre,imagen,slug FROM concentradores WHERE visible=1";
$a=$mysqli->query($selec);
while($ausp = $a->fetch_assoc()){   
?>
      <div class="col-lg-4 col-md-4 col-sm-3 col-6">
         <!--<div class="card mb-3">-->
            <a href="auspiciantes.php?ausp=<?php echo $ausp['slug'] ?>"><img class="card-img-top" src="img/Auspiciantes/<?php echo $ausp['imagen'] ?>" alt="<?php echo $ausp['nombre']?>"></a>
      </div>
    <?php }?>
</div>