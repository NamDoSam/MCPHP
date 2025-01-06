<?php
require 'template/cenefa.php';
require 'template/menu.php';
require 'conexion/conexion.php';
//require 'archivos/sliderIconos.php';
$it=isset($_GET['it'])?$_GET['it']:'';
?>
<!-- Portfolio Grid-->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <br><!--<h3 class="section-heading" align="center">Categorias</h3>-->
<br><br><br><br>
<h3 class="section-heading" align="">30 días gratis<hr></h3>
<div style="background-color:#FFF; padding:50px">

<p>Al llenar este formulario, estás solicitando la prueba de 30 días GRATIS  en <strong>www.menucatalogo.com</strong>. A su vez estás aceptando los Términos y Condiciones, Políticas de Privacidad  y Política de Cookies.<br>
A la brevedad nos cumunicaremos para que sepas como configurar tu menú o catálogo digital.
<hr></p>
<h4>Formulario de Alta para los 30 días Gratis!!!</h4>
<?php if($it) echo "<br><div style='color: red'>".$_GET['it']."</div><br><br>"?>	
*Necesitamos estos datos para configurarte la herramienta.
<br><br>
<form method="post"  action="contacto/contacto.php">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">
                <div class="form-group">
                    <input  class="form-control" name="razonSocial" type="text" placeholder="Razón Social*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <input class="form-control" name="nombre" type="text"  placeholder="Apellido y Nombre*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <!-- <div class="form-group">
                    <input class="form-control" name="apellido" type="text" placeholder="Apellido*" required />
                    <p class="help-block text-danger"></p>
                </div>-->
                <div class="form-group">
                    <input class="form-control" name="email" type="email"  placeholder="Email*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" name="telefono" placeholder="Celular*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" name="dpto" placeholder="Departamento*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" name="rubro" placeholder="Tipo de Comercio*" required />
                    <p class="help-block text-danger"></p>
                </div>
				
               <!-- <a style="color: blue;" href="#">- Términos y Condiciones>></a>
                <div class="form-group mb-md-0">
                    <input type="checkbox" name="checkbox" id="checkbox" required>
  					<label for="checkbox"> He leído y acepto los términos y condiciones</label>
                </div>-->
                
            </div>
           
        </div>
        <div align="center">
            <button class="btn btn-primary" type="submit">Quiero los 30 días</button>
        </div>
    </form>
</div>
</div>

<div class="container" align="center">
<?php //require 'archivos/auspiciantes.php';?>
 </div>
 <br><br><br><br><br><br>

<?php require 'template/footer.php';?>