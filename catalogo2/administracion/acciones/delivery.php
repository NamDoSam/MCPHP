<?php 
require_once('../conexion/conexion.php');
$path = "../../catalogo/imgCliente/".$_GET['slug']."/config/config.php";
require($path);
$file = fopen($path, "w");
fwrite($file, '<?php 
	const SLUG="'.SLUG.'";
 	const NUM_CLIENTE="'.NUM_CLIENTE.'";
	const COLOR_CENEFA="'.COLOR_CENEFA.'";
	const COLOR_TEXTO_MENU="'.COLOR_TEXTO_MENU.'";
	const CARRITO="'.$_GET['delivery'].'";
	const TITULO="'.TITULO.'";
	const URL_BASE="https://menucatalogo.com/catalogo/";
?>' . PHP_EOL);
fclose($file);
$sql = "UPDATE clientes SET delivery='".$_GET['delivery']."'  WHERE idCliente=".$_GET['idCliente']."";
		$mysqli->query($sql) or die(mysql_error);
header("location: ../clientes.php");
exit();
?>