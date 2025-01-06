<?php
require 'template/cenefa.php';
require 'conexion/conexion.php';
?>
<style>
.eye {
  position: absolute;
  width: 90%;
  height: auto;
  /*top: 40px;
  left: 40px;*/
  z-index: 1;
}
.container{
	width: 95%;
	/*text-align:center;*/
}
.accordion .card-header:after {
    font-family: 'FontAwesome';
    content: "\f0de";
    float: right;
    color:#fff;
}
.accordion .card-header.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f0dd";
}
.card-header{
  background-color:#358284;
  cursor:pointer;
  color: #adf5f7;
}
a {
    color: #fff;
    text-decoration: none;
}
</style>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

<div class="container"><a class="navbar-brand" href="#page-top"><img src="img/logos/logoLogin.png"alt="..." /></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><i class="fas fa-bars ms-1"></i></button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
      <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#categorias">Categorias</a></li>
      <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
      <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
    </ul>
  </div>
</div>
</nav>
<!-- Masthead-->
<header class="masthead">
  <div class="container">
    <div align="center">
      <div class="col-10 col-m-6 col-lg-6">
        <form method="POST" action="">
        <br>
        <div class="input-group">

                      <input type="text" class="form-control buscador" placeholder="Buscar...">
                      <div class="input-group-btn">
                        <button class="btn btn-warning buscador"  type="submit"><i style="color: orange;" class="fa fa-search fa-2x" aria-hidden="true"></i></button>
                      </div>
                    </div>
          <!--data-size="3" -->
          <!--<select id="first-disabled" class="selectpicker form-control buscador"
                                data-hide-disabled="true" data-live-search="true">
            <optgroup disabled="disabled" label="disabled">
            <option>Hidden</option>
            </optgroup>
            <optgroup label="Fruit">
            <option>Apple</option>
            <option>Orange</option>
            </optgroup>
            <optgroup label="Vegetable">
            <option>Corn</option>
            <option>Carrot</option>
            </optgroup>
            <option>Hidden</option>
            </optgroup>
            <optgroup label="Fruit">
            <option>Apple</option>
            <option>Orange</option>
            </optgroup>
            <optgroup label="Vegetable">
            <option>Corn</option>
            <option>Carrot</option>
            </optgroup>
          </select>-->
        </form>
      </div>
    </div>
    <br>
    
    <div class="masthead-subheading">Bienvenidos a MenúCatálogo</div>
    <div class="masthead-heading text-uppercase">tu catalogo on-line - autogestionable</div>

  <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>-->
  </div>
</header>
<!--slider de iconos-->
<?php require 'archivos/sliderIconos.php';?>

<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div id="categorias" class="container">
  <br><h3 class="section-heading" align="center">Categorias</h3>

<?php 
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"];
$sel="SELECT * FROM categorias WHERE estado=0";
$n=0;
$m=$mysqli->query($sel);
while($row = $m->fetch_assoc()){
	$n++;
?> 
    <div id="accordion" class="accordion">
        <div class="card mb-0">
            <div class="card-header collapsed" data-toggle="collapse"  aria-expanded="true" href="#collapse<?php echo $n ?>">
			<i class="fas fa-<?php echo $row['icono'] ?>"> &nbsp;</i> <?php echo $row['categoria'] ?></div>
            <div id="collapse<?php echo $n ?>" class="card-body collapse" data-parent="#accordion">
               <?php require 'archivos/intro.php';?>
            </div> 
        </div>
   </div>
   <br>
 <?php }?>
 
 <br></div>
<h3 class="section-heading" align="center">Auspiciantes</h3>
<div class="container" align="center">
<?php require 'archivos/card.php';?>
 </div>
 <br><br><br><br><br><br>

<?php require 'template/footer.php';?>