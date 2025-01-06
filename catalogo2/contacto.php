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
<h3 class="section-heading" align="">Contacto<hr></h3>
<div style="background-color:#FFF; padding:50px">

<!--<p>Al llenar este formulario, estás solicitando la prueba de 30 días GRATIS  en <strong>www.menucatalogo.com</strong>. A su vez estás aceptando los Términos y Condiciones, Políticas de Privacidad  y Política de Cookies.<br>
A la brevedad nos cumunicaremos para que sepas como configurar tu menú o catálogo digital.
<hr></p>-->
<h4>Formulario de Consulta</h4>
<?php if($it) echo "<br><div style='color: red'>".$_GET['it']."</div><br><br>"?>	
<br>
<form name="form1" method="post" action="contacto/contacto.php">
        <div class="row align-items-stretch mb-5">
            <div class="col-md-6">

                <div class="form-group">
                    <input class="form-control" name="nombre" type="text" placeholder="Apellido y Nombre*" required />
                    <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Email*" required />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="form-group mb-md-0">
                    <input class="form-control" name="telefono" placeholder="Celular*" required />
                    <p class="help-block text-danger"></p>
                </div>

            </div>
            <div class="col-md-6">
            
         		<div class="form-group mb-md-0">
                    <input class="form-control" name="dpto" placeholder="Departamento*" required />
                    <p class="help-block text-danger"></p>
                </div>
            
                <div class="form-group form-group-textarea mb-md-0">
                    <textarea rows="3" required class="form-control" name="mensaje" placeholder="Consulta*"></textarea>
                    <p class="help-block text-danger"></p>
              </div>
            </div>
        </div>
        
        <div align="center"> 
            <div id="success"></div>
            <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Enviar</button>
        </div>
        
    </form>

</div>
</div>

<div class="container" align="center">
<?php //require 'archivos/auspiciantes.php';?>
 </div>
 <br><br><br><br><br><br>

<?php require 'template/footer.php';?>