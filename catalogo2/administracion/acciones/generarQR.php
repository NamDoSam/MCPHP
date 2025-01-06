<?php
 //////////////GENERAR CODIGO QR///////////////////////////////	
$urlImagen = "../../catalogo/imgCliente/$slug/qr";
	if (!file_exists($urlImagen)) {
	    mkdir($urlImagen, 0777, true);
}
require('../phpqrcode/qrlib.php');	
	$tamaño=12;
	$level="Q";
	$franSize=3;
	$textoQR="https://menucatalogo.com/catalogo/?c=$slug";
	$nombreQR="codigoQR.png";
	QRCode::png($textoQR,$urlImagen."/".$nombreQR,$level,$tamaño,$franSize);
//fopen("../IMAGENES/".$idDireccion  ."/index.html", "a");
?>