<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" href="../img/logo_qr/favicon.png" />
    <title>MenuCatalogo.com | Administración</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
 integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
.containerOwnApp {
   box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);
   padding-top: 15px;
}
 
.login-page {
  padding: 8% 0 0;
  margin: 0 auto 100px;
  max-width: 360px;
  position: relative;
}
 
.login-form {
   /*box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);*/
}
 
.login-form-header {
   padding-top: 16px;
}
 
.login-from-row {
   padding-top: 10px;
  /* padding-bottom: 16px;*/
}
 
.login-form-font-header {
   font-size:20px; 
   font-weight: bold;
   color:#FFF
}
 
.login-form-font-header span {
   color: #007C9B;
}
    </style>
  </head>
  <body style="background-image:url(imagen/intro/intro_1.jpg)">
     <div class="container">
        <div class="row text-center login-page">
	   <div class="col-md-12 login-form">
	      <form action="login/login.php?slug=<?php echo $_GET['c'] ?>" method="post">		
	         <div class="row">
		    <div class="col-md-12 login-form-header">
            <font color="#FFFFFF">BIENVENIDO A NUESTRO SISTEMA DE<br>GESTION PARA EL MENU-CATALOGO</font><br><br>
		       <p class="login-form-font-header"><img src="../img/logo_qr/menucatalgo-login.png" width="250"></p>
              <?php if ($_GET['nota']) echo "<font color=red>* ".$_GET['nota']."</font>"?>
		    </div>
		</div>
		<div class="row">
		   <div class="col-sm-12 login-from-row input-group-lg" align="center" >
		      <input name="email" class="form-control" type="email" style="width: 250px;" placeholder="Email" autofocus required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-sm-12 login-from-row input-group-lg" align="center">
		      <input name="pass" class="form-control" type="password" style="width: 250px;" placeholder="Contraseña" required/>
		   </div>
		</div>
		<div class="row">
		   <div class="col-md-12 login-from-row">
		      <button class="btn btn-warning btn-block"> Entrar </button>
		   </div>

       <div class="col-md-12 login-from-row">
        <br>
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">¿Olvidó su contraseña?</button>
		   </div>
		</div>
	    </form>
	</div>
     </div>
  </div>

<?php require_once('captcha/captcha.php'); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>