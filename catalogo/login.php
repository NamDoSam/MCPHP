<?php
session_start();
$_SESSION['sesiones'][3] = $_GET['total'];
if($_SESSION['sesiones'][1]==''){
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="listadoPedido.php?c=".$slug;
$url='';
//require_once("conexion/conexion.php");
//extit();
?>
<br>
<style type="text/css">
.Rent {
  /*width: 180px;*/
  /*width: 80%;*/
}
.input {
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,.06) inset;
  color: #555;
  font-size: 24px;
  padding: 8px;
  text-align: center
}
.inputMesa {
  width: 60px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
</style>
<div class="animsition">
<br><br><br><br><br>
<div class="container">
	<!--<h3 align="center">Abrir Sesión</h3>-->
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4 col-sm-6 my-2">
<?php if($_POST['celular']=='') {?>
<form name="form1" method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo INICIAR_SESION ?></label>
    <input type="number" autocomplete="on" name="celular" class="form-control input" placeholder="1125895684" required>
    <font size="2"><?php echo TEXTO_3 ?></font>
  </div>
  <button type="submit" class="btn btn-success btn-block"><?php echo CARGAR ?></button>
</form>
<?php } else {
$resultado = $mysqli->query("SELECT idComprador,nombreComp FROM car_comprador WHERE celComp='".$_POST['celular']."'");
$row = $resultado->fetch_assoc(); 
if($row['idComprador']>0){
$_SESSION['sesiones'][1] = $row['idComprador'];
$_SESSION['sesiones'][2] = $row['nombreComp'];
$url=$_GET['url']."?c=".$_GET['c'];
?>
<script type="text/javascript">
	window.location="<?php echo $url ?>";
</script>
<?php exit(); }else{?>
<form name="form2" method="post" action="shopCar/acciones/cargarComprador.php?c=<?php echo $slug ?>">
		  <div class="form-group">
			 <table class="table table-sm">
			  <tbody>
				  
				<tr>
				  <td nowrap><?php echo CELULAR ?> </td>
				  <td>
					<input type="number" readonly name="celComp" class="form-control input" placeholder="<?php echo CELULAR ?>" value="<?php echo $_POST['celular']?>" required>
					</td>
				</tr>
				<tr>
				  <td><?php echo NOMBRE ?> </td>
				  <td><input type="text" name="nombreComp" <?php echo $may?> class="form-control Rent" placeholder="<?php echo NOMBRE ?>" value="<?php echo $row['nombreComp']?>" required>
				  </td>
				</tr>
                
				<!--<tr>
				  <td>Mesa N° </td>
				  <td><input type="number" name="mesa" class="form-control input inputMesa" placeholder="0" required></td>
				</tr>-->
                
			  </tbody>
			</table>
		  </div>
			
		  <a href="<?php echo $volver ?>"><button type="button" class="btn btn-danger"><< <?php echo VOLVER ?></button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit" class="btn btn-success"><?php echo NUEVO_USUARIO ?> >></button>
		</form>
<?php	}}?>

</div>
</div>
</div>
</div>
<?php require("template/footer.php");
}else{ ?>
<script type="text/javascript">
	window.location="<?php echo $_GET['url'] ?>?c=<?php echo $_GET['c'] ?>";
</script>
<?php }?>

