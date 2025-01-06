<?php 
session_start();
/*print_r($_SESSION);
echo "<br>";
print_r($_POST);
echo "<br>";*/
//exit();
require_once("../conexion/conexion.php");
$total=$_SESSION['sesiones'][3] + $_GET['pEnvio'];
if($_SESSION['sesiones'][1]>0 && $_GET['idCliente']>0){
	if($_POST['direccion']!=''){
		$inser = "INSERT INTO car_direccion_envio (idComprador,direccion,provincia,localidad,detalle) 
		VALUES ('".$_SESSION['sesiones'][1]."','".$_POST['direccion']."','".$_POST['provincia']."','".$_POST['localidad']."','".$_POST['detalle']."')";
		$mysqli->query($inser);
		$direc=$mysqli->insert_id;
	}else{$direc=$_GET['idDireccion'];}
//exit();
if($_POST['dentroZona']=='on') $dentroZona=1; else $dentroZona=0;
		$inser = "INSERT INTO car_pedido (envio,idCliente,idComprador,idDireccion,dentroZona,token,fechaPedido,total,estadoPedido) 
		VALUES ('DELIVERY','".$_GET['idCliente']."','".$_SESSION['sesiones'][1]."','".$direc."','".$dentroZona."','".$_SESSION['sesiones'][0]."','".date('Y-m-d H:i')."','".$total."','PEDIDO RECIBIDO')"; 
		$mysqli->query($inser);
		$_SESSION['sesiones'][5]=$mysqli->insert_id;

$m=$mysqli->query("SELECT * FROM car_temp_pedido WHERE token='".$_SESSION['sesiones'][0]."' AND cliente='".$_GET['idCliente']."'");
	while($row = $m->fetch_assoc()){
		$inser = "INSERT INTO car_tabla_pedido (cliente,token,categoria,idProducto,producto,nota,cantidad,precio) 
		VALUES ('".$row['cliente']."','".$row['token']."','".$row['categoria']."','".$row['idProducto']."','".$row['producto']."','".$row['nota']."','".$row['cantidad']."','".$row['precio']."')"; 
		$mysqli->query($inser);
		$consulta = "DELETE FROM car_temp_pedido WHERE numPedido=".$row['numPedido']."";
		$mysqli->query($consulta);
	}

?>
<script type="text/javascript">
	window.location="../finPedido.php?c=<?php echo $_GET['c'] ?>";
</script>
<?php }?>