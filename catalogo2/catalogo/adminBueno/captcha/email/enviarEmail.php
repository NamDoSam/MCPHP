<?php
$pedi="SELECT * FROM clientes WHERE idCliente=".$idCliente."";
$pe = $mysqli->query($pedi)or die ($Sql .mysql_error()."" );
$cliente = $pe->fetch_assoc();
	$emailCliente=$cliente['email'];
	$nombreCliente=$cliente['apellido'].", ".$cliente['nombre'];
	$telefonoCliente=$cliente['telefono'];
	$direccion=$cliente['calle']." - ".$cliente['numCalle']." - ".$cliente['localidad']." (".$cliente['cPostal'].") - ".$cliente['provincia'];


////////////////////////////////////////////////
require("class.phpmailer.php");
require("class.smtp.php");

// Valores enviados desde el formulario
if ( !isset($emailCliente) || !isset($nombreCliente) || !isset($telefonoCliente) ) {
    die ("Es necesario completar todos los datos del formulario");
	exit();
}
//exit();
require('mensaje.php');
// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "wwwtold.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "ventas@toldoshop.com.ar";  // Mi cuenta de correo
$smtpClave = "pOK@y*F6aV";  // Mi contraseña
$emailUsuario="ventas@toldoshop.com.ar";
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
$mail->FromName = 'ToldoShop';
$mail->AddAddress($emailCliente); // Esta es la dirección a donde enviamos los datos del formulario
$mail->AddAddress($emailUsuario); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "ToldoShop - Web"; // Este es el titulo del email.
$mensajeHtml = $mensaje;
$mail->Body = "{$mensajeHtml} <br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n Presupuesto enviado por ToldoShop"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //
	
$estadoEnvio = $mail->Send(); 
if(!$estadoEnvio){
    echo "Ocurrió un error inesperado.";
	exit();
} else{ ?>

	<script type="text/javascript">
	var idCliente="<?php echo $idCliente ?>";
	var enviado="1";
	location.href="../comprar.php?idCliente="+idCliente+"&enviado="+enviado;
	</script>

<?php } ?>