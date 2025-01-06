<?php
////////////////////////////////////////////////
require("class.phpmailer.php");
require("class.smtp.php");
//exit();
require('mensaje.php');
/*echo "email vendedor".$emailV;
exit();*/

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1920349.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "pedidos@menucatalogo.com";  // Mi cuenta de correo
$smtpClave = "dQ283@91lW";  // Mi contraseña
$emailUsuario="pedidos@menucatalogo.com";
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
$mail->FromName = 'Nuevo Pedido';
$mail->AddAddress($cliente['email_1']); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddAddress($cliente['email_2']); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddAddress($emailV); // Esta es la dirección a donde enviamos los datos del formulario
//exit();
$mail->Subject = $titulo; // Este es el titulo del email.
$mensajeHtml = $mensaje;
$mail->Body = "{$mensajeHtml} <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Pedido"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //
	
$estadoEnvio = $mail->Send(); 

if(!$estadoEnvio){
    echo "Ocurrió un error inesperado.";
	exit();
}?>