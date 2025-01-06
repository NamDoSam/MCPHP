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
    color:#de0a0a;
}
.accordion .card-header.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\f0dd";
}
.card-header{
  background-color:#fff;
  cursor:pointer;
  color: #999;
}
a {
    color: #fff;
    text-decoration: none;
}
</style>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

<div class="container"><a class="navbar-brand" href="./"><img src="img/logos/logoLogin.png"alt="..." /></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation"><i class="fas fa-bars ms-1"></i></button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
      <li class="nav-item"><a class="nav-link" href="./">Inicio</a></li>
      <!--<li class="nav-item"><a class="nav-link" href="#categorias">Categorias</a></li>-->
      <!--<li class="nav-item"><a class="nav-link" href="beneficios.php">Beneficios</a></li>-->
      <li class="nav-item"><a class="nav-link" href="precios.php">Precios</a></li>
     <!-- <li class="nav-item"><a class="nav-link" href="preguntasFrecuentes.php">Preguntas frecuentes</a></li>-->
      <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
    </ul>
  </div>
</div>
</nav>

