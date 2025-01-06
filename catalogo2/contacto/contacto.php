<?php
/**
 * @version 1.0
 */

require("class.phpmailer.php");
require("class.smtp.php");
//print_r($_POST);
// Valores enviados desde el formulario
if ( !isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["telefono"]) ) {
    die ("Es necesario completar todos los datos del formulario");
}
$nombre 	= $_POST["nombre"];
$email 		= $_POST["email"];
$consulta 	= $_POST["mensaje"];
$asunto 	= $_POST["asunto"];
$telefono 	= $_POST["telefono"];
$dpto 		= $_POST["dpto"];
$rubro 		= $_POST["rubro"];
$razonSocial = $_POST["razonSocial"];

if($rubro){
	$volver		= '../form_30diasgratis.php?it=Gracias, el pedido fue enviado.';
	$cabecera	= "Pedido de 30 días";
	$mensaje 	= '<strong>Razon Social:</strong> '.$razonSocial.'<br><br><strong>Nombre</strong>: '.$nombre.'<br><strong>Teléfono:</strong> '.$telefono.'<br><strong>E-mail:</strong> '.$email.'<br><strong>Departamento:</strong> '.$dpto.'<br><br><strong>Rubro:</strong> '.$rubro;
}else{
	$volver		= '../contacto.php?it=Gracias, la consulta fue enviada.';
	$cabecera	= "Consulta - Desde la página";
	$mensaje 	= '<strong>Nombre</strong>: '.$nombre.'<br><strong>Teléfono:</strong> '.$telefono.'<br><strong>E-mail:</strong> '.$email.'<br><strong>Departamento:</strong> '.$dpto.'<br><br><strong>Consulta:</strong> '.$consulta;
}
//exit();
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

$mail->Subject = $cabecera; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br /><a href='https://menucatalogo.com'>www.menucatalogo.com</a>"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Formulario de ejemplo By DonWeb"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){?>
<script>
   var url='<?php echo $volver ?>';
	window.location=url;
</script>
<?php exit(); 
} else {
    echo "Ocurrió un error inesperado.";
}
