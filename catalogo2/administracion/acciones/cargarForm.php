<?php 
session_start();
require_once('../conexion/conexion.php');
require_once('../script/slug.php');
require_once('../script/generaPass.php');
$slug=slug($_POST['nomFantasia']);
$nomFantasia=$_POST['nomFantasia'];
$delivery=$_POST['delivery'];
$id=0;
/*print_r($_POST);
echo "<br><br>";*/
//exit;
//////CLIENTE//////////////////////////////////////////////////
if($_GET['form']=='cliente'){ 
	if($_POST['idCliente']>0){//print_r($_POST); exit();
		$sql = "UPDATE clientes SET idUsuario='".$_SESSION['idUsuario']."',idConcentrador='".$_SESSION['idConcentrador']."',tipoCat='".$_POST['tipoCat']."',item='".$_POST['item']."',nomFantasia='".$_POST['nomFantasia']."',slug='".$slug."',nomFantasia='".$_POST['nomFantasia']."',apellido='".$_POST['apellido']."',nombre='".$_POST['nombre']."',email='".$_POST['email']."',cuit='".$_POST['cuit']."',telefono='".$_POST['telefono']."',direccion='".$_POST['direccion']."',localidad='".$_POST['localidad']."',provincia='".$_POST['provincia']."',pais='".$_POST['pais']."',sponsor='".$_POST['sponsor']."',prueba='".$_POST['prueba']."',delivery='".$delivery."'  WHERE idCliente=".$_POST['idCliente']."";
		$mysqli->query($sql) or die(mysql_error); 
		//exit;
	}else{
		$auditoria = "INSERT INTO clientes (idUsuario,idConcentrador,tipoCat,item,razonSocial,slug,nomFantasia,apellido,nombre,email,pass,cuit,telefono,direccion,localidad,provincia,pais,fechaAlta,sponsor,prueba,delivery) VALUES ('".$_SESSION['idUsuario']."','".$_SESSION['idConcentrador']."','".$_POST['tipoCat']."','".$_POST['item']."','".$_POST['razonSocial']."','".$slug."','".$_POST['nomFantasia']."','".$_POST['apellido']."','".$_POST['nombre']."','".$_POST['email']."','".$pass."','".$_POST['cuit']."','".$_POST['telefono']."','".$_POST['direccion']."','".$_POST['localidad']."','".$_POST['provincia']."','".$_POST['pais']."','".date('Y-m-d')."','".$_POST['sponsor']."','".$_POST['prueba']."','".$delivery."')";
		$mysqli->query($auditoria);
		$id = $mysqli->insert_id;
	}
//if($id > 0){
$path = "../../catalogo/imgCliente/$slug";
	if (!file_exists($path)) {
	    mkdir($path, 0777, true);
}
	
$path = "../../catalogo/imgCliente/$slug/logo";
	if (!file_exists($path)) {
	    mkdir($path, 0777, true);
}
$path = "../../catalogo/imgCliente/$slug/promo";
	if (!file_exists($path)) {
	    mkdir($path, 0777, true);
}
$path = "../../catalogo/imgCliente/$slug/productos";
	if (!file_exists($path)) {
	    mkdir($path, 0777, true);
}


////////////CREAR ARCHIVO CONFIG/////////////////////
/*$path = "../../catalogo/imgCliente/$slug/config";
	if (!file_exists($path)) {
	    mkdir($path, 0777, true);

$file = fopen("$path/config.php", "w");
fwrite($file, '<?php 
	const SLUG				=	"'.$slug.'";
	const ID_CONSENTRADOR	=	"'.$_SESSION['idConcentrador'].'";
 	const NUM_CLIENTE		=	"'.$id.'";
	const COLOR_CENEFA		=	"fff";
	const COLOR_TEXTO_MENU	=	"000";
	const CARRITO			=	"'.$delivery.'";
	const TITULO			=	"'.$nomFantasia.'";
	const URL_BASE="https://menucatalogo.com/catalogo/";
?>' . PHP_EOL);
fclose($file);
}*/
////////////FIN ARCHIVO CONFIG/////////////////////

$sql = "INSERT INTO diseno (slug,cenefa,botones_menu,letra_menu) 
VALUES ('".$slug."','fff','000','000')";
$mysqli->query($sql);
}
if($slug){
	include 'generarQR.php';
}
header("location: ../clientes.php");
exit();
//}

?>