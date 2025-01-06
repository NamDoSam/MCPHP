<?php 
require_once('../conexion/conexion.php');
//print_r($_POST); 
if($_GET['form']=='vendedor'){ 
	if($_POST['idVendedor']>0){
		$sql = "UPDATE vendedores SET nombre='".$_POST['nombre']."',telefono='".$_POST['telefono']."',email='".$_POST['email']."' WHERE idVendedor=".$_POST['idVendedor']."";
		$mysqli->query($sql) or die(mysql_error);
	}else{
		$auditoria = "INSERT INTO vendedores (idCliente,nombre,telefono,email) 
		VALUES ('".$_POST['idCliente']."','".$_POST['nombre']."','".$_POST['telefono']."','".$_POST['email']."')";
		$mysqli->query($auditoria);

	}
header("location: ../vendedores.php?slug=".$_GET['slug']);
exit();
}
////////////////////////////////////////////////////////
if($_GET['form']=='item'){
	require('slug.php');  
	$menu=createSlug($_POST['item']);
		if($_POST['idItem']>0){
			$sql = "UPDATE rubros SET idCliente='".$_POST['idCliente']."',item='".$_POST['item']."',menu='".$menu."' WHERE idItem=".$_POST['idItem']."";
			$mysqli->query($sql) or die(mysql_error);
		}else{
			$auditoria = "INSERT INTO rubros (idCliente,item,menu,estado) 
			VALUES ('".$_POST['idCliente']."','".$_POST['item']."','".$menu."',1)";
			$mysqli->query($auditoria);
	
		}
	header("location: ../rubro.php?slug=".$_GET['slug']);
	exit();
	}
	////////////////////////////////////////////////////////
if($_GET['form']=='categoria'){  
	if($_GET['nvo']==0){
		$sql = "UPDATE categorias SET idCliente='".$_POST['idCliente']."',idItem='".$_POST['idItem']."',categoria='".$_POST['categoria']."' WHERE idCat=".$_POST['idCat']."";
		$mysqli->query($sql) or die(mysql_error);
	}else{
		$auditoria = "INSERT INTO categorias (idCliente,idItem,categoria,estado) VALUES ('".$_POST['idCliente']."','".$_POST['idItem']."','".$_POST['categoria']."',1)";
		$mysqli->query($auditoria);

	}
header("location: ../categorias.php?slug=".$_GET['slug']."&idCat=".$_POST['idCat']."&idItem=".$_POST['idItem']);
exit();
}
//////CONTACTO//////////////////////////////////////////////////
if($_GET['form']=='contacto'){ 
	if($_GET['idSucursal']>0){
		$sql = "UPDATE sucursales SET idCliente='".$_POST['idCliente']."',nomFantasia='".$_POST['nomFantasia']."',horario='".$_POST['horario']."',telefono='".$_POST['telefono']."',whatsapp='".$_POST['whatsapp']."',direccion='".$_POST['direccion']."',dpto='".$_POST['dpto']."',provincia='".$_POST['provincia']."',pais='".$_POST['pais']."' WHERE idSucursal=".$_GET['idSucursal']."";
		$mysqli->query($sql) or die(mysql_error);
	}else{
		$auditoria = "INSERT INTO sucursales (idCliente,nomFantasia,horario,telefono,whatsapp,direccion,dpto,provincia,pais) VALUES ('".$_POST['idCliente']."','".$_POST['nomFantasia']."','".$_POST['horario']."','".$_POST['telefono']."','".$_POST['whatsapp']."','".$_POST['direccion']."','".$_POST['dpto']."','".$_POST['provincia']."','".$_POST['pais']."')";
		$mysqli->query($auditoria);
	}
header("location: ../contacto.php?slug=".$_GET['slug']);
exit();
}
//////ADICIONAR PRODUCTO//////////////////////////////////////////////////
if($_GET['form']=='adicion'){ 
	if($_GET['idProducto']>0){
		$sql = "UPDATE productos SET promo=1 WHERE idProducto=".$_GET['idProducto']."";
		$mysqli->query($sql) or die(mysql_errno());
	}
header("location: ../promociones.php?slug=".$_GET['slug']);
exit();
}
/////PRODUCTO///////////////////////////////////////////////////
if($_GET['form']=='producto'){
//exit();
	if($_POST['idProducto']>0){
	$sql = "UPDATE productos SET idCliente='".$_POST['idCliente']."',idCat='".$_POST['categoria']."',producto='".$_POST['producto']."',descripcion='".$_POST['descripcion']."',precio='".$_POST['precio']."',precioPromo='".$_POST['precioPromo']."' WHERE idProducto=".$_POST['idProducto']."";
		$mysqli->query($sql);
		$id=$_POST['idProducto'];
	}else{
		$auditoria = "INSERT INTO productos (idCliente,idCat,producto,descripcion,precio,precioPromo,estado) VALUES ('".$_POST['idCliente']."','".$_POST['categoria']."','".$_POST['producto']."','".$_POST['descripcion']."','".$_POST['precio']."','".$_POST['precioPromo']."',1)";
		$mysqli->query($auditoria);
		$id = $mysqli->insert_id;
	}
////SUBIR IMAGEN////////////////
if ($_FILES['imagen']['name'] != null) {
	include('subirImagen.php');
}
header("location: ../productos.php?slug=".$_GET['slug']."&idItem=".$_GET['idItem']."&idCat=".$_GET['idCat']);
exit();
}
////////////////////////////////////////////////////////
if($_GET['form']=='esponsor'){ 
	if($_POST['idEsponsor']>0){
		$sql = "UPDATE esponsor SET idCliente='".$_POST['idCliente']."',esponsor='".$_POST['esponsor']."',link='".$_POST['link']."',orden='".$_POST['orden']."' WHERE idEsponsor=".$_POST['idEsponsor']."";
		$mysqli->query($sql);
		$id=$_POST['idEsponsor'];
	}else{
		$auditoria = "INSERT INTO esponsor (idCliente,esponsor,link,fecha,orden,estado) VALUES ('".$_POST['idCliente']."','".$_POST['esponsor']."','".$_POST['link']."','".date('Y-m-d')."','".$_POST['orden']."',1)";
		$mysqli->query($auditoria);
		$id = $mysqli->insert_id;
	}

////SUBIR IMAGEN////////////////
if ($_FILES['imagen']['name'] != null) {
	require('subirImagenEsponsor.php');
	/*echo $sql = "UPDATE esponsor SET imagen='".$id.".jpg"."' WHERE idEsponsor=".$id."";
	$mysqli->query($sql);*/
}
////////////////////////////////
header("location: auspiciantes.php?slug=".$_GET['slug']);
exit();
}

?>