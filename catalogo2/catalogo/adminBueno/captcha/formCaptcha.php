<?php
require("../../conexion/conexion.php");
//print_r($_POST);
$selec="SELECT * FROM clientes WHERE email='".stripslashes($_POST["email"])."' AND estado=1 AND slug='".$_POST["cliente"]."'";
$res = $mysqli->query($selec);
$row = $res->fetch_assoc();

//////////////////////////////////////////////////////////////////////
if($row['idCliente'] > 0){
////////////////////////////////////////////////
$emailCliente=$row['email'];
require("email/class.phpmailer.php");
require("email/class.smtp.php");
require('email/mensaje.php');
// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1920349.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@menucatalogo.com";  // Mi cuenta de correo
$smtpClave = "Clavemail246";  // Mi contraseña
//$emailUsuario="ventas@toldoshop.com.ar";
// Email donde se enviaran los datos cargados en el formulario de contacto

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465; 
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;

$mail->From = $smtpUsuario; // Email desde donde envío el correo.
$mail->FromName = 'MenuCatalogo';
$mail->AddAddress($emailCliente); // Esta es la dirección a donde enviamos los datos del formulario
//$mail->AddAddress($emailUsuario); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "MenuCatalogo - Recuperar contraseña"; // Este es el titulo del email.
$mail->Body = "{$mensaje} <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Presupuesto enviado por ToldoShop"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //
	
$estadoEnvio = $mail->Send(); 
if(!$estadoEnvio){
    echo "Ocurrió un error inesperado.";
	exit();
} else{ 
header("location: ../index.php?c=".$_POST["cliente"]."&nota=Su contraseña fue enviada a <strong>$emailCliente</strong>");
exit();
 }	
	
}else{
	header("location: ../index.php?c=".$_POST["cliente"]."&nota=NO está registrado o no tiene permiso.");
		exit();
}
?>