<?php 
include '../../../conexion/conexion.php';
//print_r($_POST);
if($_POST['idSucursal'] > 0){
$sql = "UPDATE sucursales SET nomFantasia='".$_POST['nomFantasia']."',descripcion='".$_POST['descripcion']."',horario='".$_POST['horario']."',telefono='".$_POST['telefono']."',celular='".$_POST['celular']."',whatsapp='".$_POST['whatsapp']."',email='".$_POST['email']."',direccion='".$_POST['direccion']."',dpto='".$_POST['departamento']."',provincia='".$_POST['provincia']."',pais='ARGENTINA',facebook='".$_POST['facebook']."',instagram='".$_POST['instagram']."'
WHERE idSucursal=".$_POST['idSucursal']."";
$mysqli->query($sql);
}else{
$sql = "INSERT INTO sucursales (idCliente,nomFantasia,descripcion,horario,telefono,celular,whatsapp,email,direccion,dpto,provincia,pais,facebook,instagram) 
	VALUES ('".$_POST['idCliente']."','".$_POST['nomFantasia']."','".$_POST['descripcion']."','".$_POST['horario']."','".$_POST['telefono']."','".$_POST['celular']."','".$_POST['whatsapp']."','".$_POST['email']."','".$_POST['direccion']."','".$_POST['dpto']."','".$_POST['provincia']."','ARGENTINA','".$_POST['facebook']."','".$_POST['instagram']."')";
	$mysqli->query($sql);
}
?>
 <script type="text/javascript">
	window.location="../presenciaWeb.php?slug=<?php echo $_GET['slug'] ?>";
</script>