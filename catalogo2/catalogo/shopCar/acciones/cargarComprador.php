<?php 
session_start();
//print_r($_POST);
require_once("../../conexion/conexion.php");
$inser = "INSERT INTO car_comprador (nombreComp,celComp,fechaAlta) 
VALUES ('".$_POST['nombreComp']."','".$_POST['celComp']."','".date('Y-m-d H:i')."')"; 
$mysqli->query($inser);
$_SESSION['sesiones'][1] = $mysqli->insert_id;
$_SESSION['sesiones'][2] = $_POST['nombreComp'];
?>
<script type="text/javascript">
window.location="../../menuFormaPedido.php?c=<?php echo $_GET['c'] ?>";
</script>