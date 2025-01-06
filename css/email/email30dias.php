<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["razonSocial"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre = $_POST["nombre"];
$razonSocial = $_POST["razonSocial"];
$email = $_POST["email"];
$provincia = $_POST["provincia"];
$rubro = $_POST["rubro"];
$telefono = $_POST["telefono"];
$mensaje = "<b>Pedido de 30 días Gratis</b>\n\nRazon Social: ".$razonSocial."\n Nombre: ".$nombre."\n Email: ".$email."\n Telefono: ".$telefono."\n Provincia: ".$provincia."\n Rubro: ".$rubro;

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1920349.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@menucatalogo.com";  // Mi cuenta de correo
$smtpClave = "Clavemail246";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "info@menucatalogo.com";

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

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Pedido de 30 días Gratis"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Envío desde menucatalogo.com<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
