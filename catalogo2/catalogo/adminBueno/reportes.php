<?php 
require_once 'menu/menu.php';
if(!isset($_POST['date_range'])){
	$fecha=date('Y-m-d');
}else{
	$fecha=$_POST['date_range'];
}
$fechaExplode=explode(' - ',$fecha);
$fecha1=date("Y-m-d",strtotime($fechaExplode[0]));
$fecha2=date("Y-m-d",strtotime("+1 day", strtotime($fechaExplode[1])));
$ast="<font color='#FF0000'; size='4'><i class='fa fa-certificate'></i> </font>";
?>

<style>
.modal-content {
    background-color: #f1f1f1;
  }
 .table-container{
	max-width: 100%;
	overflow-x: scroll;
}
</style>
<div class="container">
  <h2><a href="shopcar.php?slug=<?php echo SLUG ?>" title="VOVER AL PANEL DE CONTROL"><i style='color:#228a90' class='fa fa-arrow-left fa-lg'></i></a>&nbsp;&nbsp;&nbsp; Reportes</h2> <hr>


<div class="form-group" align="center">
<div class="row">
<form name="form1" method="post">
        <div class="form-group col-md-3"></div>
            <div class="form-group col-md-6">
                <label>Selecciona fechas:</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    	<input type="text" id="date_range" name="date_range" class="form-control pull-right" value="<?php echo $fecha ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-flat" type="submit" name="submitRangeDates">Buscar</button> 
                    </span>
                    </div>
                </div>
           
    </div>
</div>
<!--</form>
<form name="form2" method="post">-->
  <div class="form-group">
  <div class="col-sm-3"></div>
  	<div class="col-sm-3">
     <!-- <input type="text" class="form-control" width="500px" id="filtrar" <?php echo $may ?>  placeholder="Buscar...">-->
     <select name="envio" id="select" class="form-control" onchange="this.form.submit()">
     <option value="" <?php if ($_POST['envio']=='') echo "selected"?>>SELECCIONAR</option>
   <?php 
   $re = $mysqli->query('SELECT envio,mesa FROM car_pedido WHERE idCliente="'.NUM_CLIENTE.'" AND fechaPedido >="'.$fecha1.'" AND fechaPedido <="'.$fecha2.'" GROUP BY envio,mesa ');
   while ($r = $re->fetch_assoc()) { 
   if($r['envio']=='MESA') $envio=$r['envio']." ".$r['mesa']; else $envio=$r['envio'] ?>  
    <option value="<?php echo $envio ?>"<?php if ($envio == $_POST['envio']) echo "selected"?>><?php echo $envio ?></option>
    <?php }?>
  </select>
      </div>
      
      	<div class="col-sm-3">  <input type="text" class="form-control" id="filtrar" <?php echo $may ?>  placeholder="Buscar..."></div>

    	<div align="center" class="col-sm-3"><a href="bajarExcelReporte.php?idCliente=<?php echo NUM_CLIENTE ?>&fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>&envio=<?php echo $_POST['envio'] ?>"><img src="../img/iconos/bajarExcel.png" height="40"></a></div>
        
    </div>
</form>
</div>
<br>

<div class="table-responsive">

<div class="container">
<div class="table-container">

  <table class="table table-hover  table-condensed table-bordered">
    <thead>
      <tr>
        <th style="width:30px;">#</th>
        <th style="width:80px;">Envío</th>
        <th style="width:180px;">Cliente</th>
        <th style="width:130px;">Fecha y Hora</th>
        <th style="width:150px;">Estado</th>
        <th style="width:100px;">Tipo Pago</th>
        <th style="width:80px;">Total $</th>
        <th style="width:500px;">Cantidad | Producto | <?php echo $ast ?> No entregado</th>
    	<!--<th style="width:80px; text-align:center">Pedido</th>-->
        <th style="width:80px; text-align:center">Oculto</th>
      </tr>
    </thead>
    <tbody class="buscar">
<?php
if($_POST['envio']==''){ 
	$sam='SELECT * FROM car_pedido cp, car_comprador cc WHERE cp.idCliente="' . NUM_CLIENTE . '" AND cp.idComprador=cc.idComprador AND cp.fechaPedido >="'.$fecha1.'" AND cp.fechaPedido <="'.$fecha2.'" ORDER BY cp.idPedido';
}else{ $numMesa=explode(' ',$_POST['envio']); 
	$sam='SELECT * FROM car_pedido cp, car_comprador cc WHERE cp.idCliente="' . NUM_CLIENTE . '" AND cp.idComprador=cc.idComprador AND cp.fechaPedido >="'.$fecha1.'" AND cp.fechaPedido <="'.$fecha2.'" AND envio="'.$numMesa[0].'" AND mesa="'.$numMesa[1].'" ORDER BY cp.idPedido';
}
$num = 0;
$total = 0;
//$sam       = 'SELECT * FROM car_pedido WHERE idCliente="' . NUM_CLIENTE . '" AND fechaPedido >="'.$fecha1.'" AND fechaPedido <="'.$fecha2.'" ORDER BY idPedido';
$resultado = $mysqli->query($sam);
while ($row = $resultado->fetch_assoc()) {
    $num++;
	$total+=$row['total'];
    ?>
      <tr>
      	<td><?php echo $num ?></td>
        <td><strong><?php 
		if($row['envio']=='MESA' && $row['mesa']>0) echo $row['envio']." ".$row['mesa']; else echo $row['envio'] ?></strong>
        </td>
        <td><?php echo $row['nombreComp']."<br>".$row['celComp'] ?></td>
        <td><?php echo date("d-m-Y H:i",strtotime($row['fechaPedido']))." hs" ?></td>
        <td><?php echo $row['estadoPedido'] ?></td>
        <td><?php echo $row['tipoPago'] ?></td>
        <td align="right"><?php  echo number_format($row['total'], 2, ',', '.')?></td>
        <td><?php 
		$sel="SELECT * FROM car_tabla_pedido  WHERE cliente='".$row['idCliente']."' AND token='".$row['token']."'";
		$m=$mysqli->query($sel);
		while($rowCli = $m->fetch_assoc()){
			if($rowCli['entregado']==0){echo $ast;} echo $rowCli['cantidad']." - ".$rowCli['categoria']." | ".$rowCli['producto']."<br>";
		} ?></td>
        <!--<td align="center">
            <a href="javascript:void(0)" onclick="mostrarId('<?php echo $row['idPedido']?>')"><i style="color:#228a90" class='fa fa-list-ul fa-lg'></i></a>
        </td>-->
        <td><?php if($row['ocultar']==1){?> 
        <a href="delivery/acciones/vusualizarrPedido.php?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $row['idPedido']?>" 
        <i style='color:#228a90' class='fa fa-eye fa-lg'></i></a>
        <?php }?>
        </td>
      </tr>	
<tr bgcolor="#99FF00">
 <?php  }?>
<td colspan="6" align="right"><strong>TOTAL $</strong></td>		
<td align="right"><strong><?php echo number_format($total, 2, ',', '.') ?></strong></td>
<td colspan="3" align="right"></td>	
<tr>	
    </tbody>
  </table>
</div>
</div>
<div id="divModal"></div>
<script>
	function mostrarId(id){
		/*alert(id);*/
		var slug='<?php echo SLUG ?>';
		var ruta = 'modalReporte.php?idPedido='+id+'&slug='+slug;
		$.get(ruta, function (data){
		$('#divModal').html(data);
		$('#myModal').modal('show');
	});
	}
</script>
</body>
</html>