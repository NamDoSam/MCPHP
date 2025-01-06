<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($_GET["pedido"]) || !isset($_GET["pago"]) || !isset($_GET["n_pedido"])  || !isset($_GET["email"])) {
    die ("Es necesario completar todos los datos del formulario");
}
$pedido = $_GET["pedido"];
$pago = $_GET["pago"];
$n_pedido = $_GET["n_pedido"];
$email = $_GET["email"];
$nombre = $_GET["nombre"];
//exit();

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "wwwtold.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "ventas@toldoshop.com.ar";  // Mi cuenta de correo
$smtpClave = "pOK@y*F6aV";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = $email;

$mensaje="<div align='center' style='background-color: #13394a;'><img src='https://toldoshop.com.ar/decorshop/images/logoDecoShopNvo.png'></div>
<br><br>
Nombre: ".$nombre."<br>
Fecha: ".date('d-m-Y')."<br>
Estado del Pago: ".$pago."<br>
Estado del Pedido: ".$pedido."<br><br>
<div align='center'>Visitanos en nuestro sitio: <a href='https://toldoshop.com.ar'>toldoshop.com.ar<a></div>
";

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
$mail->FromName = $nombre;
$mail->AddAddress($email); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "ToldoShop | Estado del pedido N° $n_pedido"; // Este es el titulo del email.
$mensajeHtml = $mensaje;
$mail->Body = "{$mensajeHtml} <br /><br /><br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    echo "El correo fue enviado correctamente.";
} else {
    echo "Ocurrió un error inesperado.";
}
