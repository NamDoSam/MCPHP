<?php 
require_once("template/cenefa.php");
require_once("template/menu.php");
echo "<br><br><br><br><br><br>";
///print_r($_SESSION);
if(!isset($_SESSION['sesiones'][1])){ ?>
<script type="text/javascript">
	window.location="login.php?c=<?php echo $_GET['c'] ?>&url=ultimosPedidos.php";
</script>
<?php }?>

<!--//////////////BORRAR CON AVISO//////////-->
<script language="JavaScript">
var mensaje="Desea eliminar el registro?";
function confirmar () { 
return confirm("Desea eliminar el registro?"); 
} 
</script>

<style>
.rectangulo {
	border:1px solid #CCC;
	padding: 10px;
	border-radius: 8px;
}
.boton {
    display: inline-block;
    padding: 3px 6px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
}
</style>

<div class="container">
<h5 align="center">- MIS PEDIDOS -<br><font size="2" color="#FF6600"><?php echo $_SESSION['sesiones'][2] ?></font></h5>
  <?php 
$cont=0;
$con="SELECT * FROM car_pedido pe,clientes cl 
WHERE pe.idComprador=".$_SESSION['sesiones'][1]." AND cl.idCliente=pe.idCliente AND pe.visible=0  ORDER BY pe.fechaPedido DESC";
$m=$mysqli->query($con);
while($row = $m->fetch_assoc()){
if($row['tipoPago']!='') $tipoPago=$row['tipoPago']; else $tipoPago='PENDIENTE';
$cont++;
if($row['idPedido'] > 0 && $cont <= 20){
$url=URL_BASE."?c=".$row['slug'];
?>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="rectangulo">
	  <?php echo "<a onclick='return confirmar()' style='color:red;'
	  href='conexion/borrar_compra.php?c=".$_GET['c']."&idPedido=".$row['idPedido']."' title='Borrar compra'><i class='fa fa-times-circle fa-lg'></i></a>&nbsp;&nbsp;";
	
	echo "<a href=".$url." title='Ir a ". $row['nomFantasia']."' style='color:#04c4c3; text-decoration:none;'><i class='fa fa-arrow-circle-up fa-lg'></i> ".$row['nomFantasia']."</a>";
	
	  echo " <small>".$row['rubro']."<br><font color='#999999'>Pago: ".$tipoPago." - ".date("d/m/y H:i",strtotime($row['fechaPedido']))." Hs</font>
	  </small>"; 
	
	  echo " <small><br><font color='#999999'>Modo Entrega: ".$row['envio']."</font></small>";
	  
	  if($row['vendedor']) { echo " <small><br><font color='#999999'>Vendedor: ".$row['vendedor']."</font></small>";}
	  
	  if($tipoPago=='PENDIENTE'){
	  echo "<br><br><small><a href='finPedido.php?c=".$_GET['c']."&idPedido=".$row['idPedido']."&token=".$row['token']."&mesa=".$row['mesa']."''><button type='button' class='btn btn-success boton'>Finalizar Pedido</button></a></small>"; 
	}
	   ?>
        <hr>
        <ul>
        <?php $pr="SELECT * FROM car_tabla_pedido tp,productos pr WHERE tp.token='".$row['token']."' AND tp.cliente=".$row['idCliente']." AND tp.idProducto=pr.idProducto";
		$x=$mysqli->query($pr);
		while($pro = $x->fetch_assoc()){?>
        	<li><small><?php echo $pro['cantidad']." x ".$pro['producto'] ?></small></li>
        <?php }?>
        </ul>
        <small>Total $ <strong><?php echo $row['total'] ?></strong></small>
      </div>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <br>

  <?php }} ?>
</div>
<br>
<br>
<br>
<br>
<br>
<?php require_once("template/footer.php"); ?>