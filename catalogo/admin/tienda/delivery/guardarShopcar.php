<?php 
require_once('../../conexion/conexion.php');
///print_r($_POST); exit();
if($_GET['accion']=='envio'){
	if($_POST['eMesa']=='on') $eMesa=1; else $eMesa=0;
	if($_POST['eRetirar']=='on') $eRetirar=1; else $eRetirar=0;
	if($_POST['eDelivery']=='on') $eDelivery=1; else $eDelivery=0;
	if($_POST['pfueraZona']=='on') $pfueraZona=1; else $pfueraZona=0;
	if($_POST['idConfi']>0){
	$sql = "UPDATE car_configuracion SET celPedido='".$_POST['celPedido']."',eMesa='".$eMesa."',eRetirar='".$eRetirar."',eDelivery='".$eDelivery."',pEnvio='".$_POST['pEnvio']."',pDelivery='".$_POST['pDelivery']."',pMapZona='".htmlspecialchars($_POST['pMapZona'])."',pfueraZona='".$pfueraZona."',whatConsulta='".$_POST['whatConsulta']."',email_1='".$_POST['email_1']."',email_2='".$_POST['email_2']."' WHERE idCliente=".$_POST['idCliente']."";
		$mysqli->query($sql);
	}else{
	$insert = "INSERT INTO car_configuracion (idCliente,celPedido,eMesa,eRetirar,eDelivery,pEnvio,pDelivery,pMapZona,pfueraZona,whatConsulta,email_1,email_2) 
	VALUES ('".$_POST['idCliente']."','".$_POST['celPedido']."','".$eMesa."','".$eRetirar."','".$eDelivery."','".$_POST['pEnvio']."','".$_POST['pDelivery']."','".htmlspecialchars($_POST['pMapZona'])."','".$pfueraZona."','".$_POST['whatConsulta']."','".$_POST['email_1']."','".$_POST['email_2']."')";
		$mysqli->query($insert);
	}
header("location: ../configuracionShopcar.php?slug=".$_GET['slug']."&texEnvio=Cambios guardados");
exit();
}
if($_GET['accion']=='cobro'){
	if($_POST['efectivo_1']=='on') $efectivo_1=1; else $efectivo_1=0;
	if($_POST['efectivo_2']=='on') $efectivo_2=1; else $efectivo_2=0;
	if($_POST['efectivo_3']=='on') $efectivo_3=1; else $efectivo_3=0;
	if($_POST['tarjeta_1']=='on') $tarjeta_1=1; else $tarjeta_1=0;
	if($_POST['tarjeta_2']=='on') $tarjeta_2=1; else $tarjeta_2=0;
	if($_POST['tarjeta_3']=='on') $tarjeta_3=1; else $tarjeta_3=0;
	if($_POST['MerPago_1']=='on') $MerPago_1=1; else $MerPago=0;
	if($_POST['MerPago_2']=='on') $MerPago_2=1; else $MerPago_2=0;
	if($_POST['MerPago_3']=='on') $MerPago_3=1; else $MerPago_3=0;
	if($_POST['PedirCta_1']=='on') $PedirCta_1=1; else $PedirCta_1=0;
	if($_POST['idConfi']>0){
	$sql = "UPDATE car_configuracion SET efectivo_1='".$efectivo_1."',efectivo_2='".$efectivo_2."',efectivo_3='".$efectivo_3."',tarjeta_1='".$tarjeta_1."',tarjeta_2='".$tarjeta_2."',tarjeta_3='".$tarjeta_3."',MerPago_1='".$MerPago_1."',MerPago_2='".$MerPago_2."',MerPago_3='".$MerPago_3."',PedirCta_1='".$PedirCta_1."' WHERE idCliente=".$_POST['idCliente']."";
		$mysqli->query($sql);
		$texCobro='Métodos de Cobro Actualizado';
	}else{
	$insert = "INSERT INTO car_configuracion (idCliente,efectivo_1,efectivo_2,efectivo_3,MerPago_1,MerPago_2,MerPago_3,tarjeta_1,tarjeta_2,tarjeta_3,PedirCta_1) 
	VALUES ('".$_POST['idCliente']."','".$efectivo_1."','".$efectivo_2."','".$efectivo_3."','".$MerPago_1."','".$MerPago_2."','".$MerPago_3."','".$tarjeta_1."','".$tarjeta_2."','".$tarjeta_3.",'".$PedirCta_1."')";
		$mysqli->query($insert);
		$texCobro='Métodos de Cobro Cargado';
	}
header("location: ../configuracionShopcar.php?slug=".$_GET['slug']."&texCobro=".$texCobro);
exit();
}
if($_GET['accion']=='key'){
	if($_POST['idConfi']>0){
		if($_POST['vincular']=='Desvincular'){
		$sql = "UPDATE car_configuracion SET publi_key='',access_token='' WHERE idCliente=".$_POST['idCliente']."";
		$mysqli->query($sql);
		}else{
		$sql = "UPDATE car_configuracion SET publi_key='".$_POST['publi_key']."',access_token='".$_POST['access_token']."' WHERE idCliente=".$_POST['idCliente']."";
		$mysqli->query($sql);
		}
		$texEnvio='Métodos de Envío Actualizado';
	}else{
	$insert = "INSERT INTO car_configuracion (publi_key,access_token) 
	VALUES ('".$_POST['publi_key']."','".$_POST['access_token']."')";
		$mysqli->query($insert);
		$texEnvio='Métodos de Envío Cargado';
	}
header("location: ../configuracionShopcar.php?slug=".$_GET['slug']."&texEnvio=".$texEnvio);
exit();
}

if($_GET['accion']=='estado'){
//print_r($_POST);
////////////CREAR ARCHIVO CONFIG/////////////////////
if($_POST['estado']=='on') $carrito=1; else $carrito=0;
$sql = "UPDATE clientes SET abierto='".$carrito."' WHERE idCliente=".$_POST['idCliente']."";
$mysqli->query($sql);
header("location: ../configuracionShopcar.php?slug=".$_GET['slug']."&texEnvio=".$texEnvio);
exit();
}
?>