<?php 
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
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
<!--https://bootstrap-datepicker.readthedocs.io/en/latest/-->
<!--DATEPICKER-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/popup/js/lightbox-plus-jquery.min1.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.js"></script>
<script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/moment.min.js"></script>
<script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/daterangepicker.js"></script>
<link href="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/css/daterangepicker.css" rel="stylesheet">
<style>
.modal-content {
	background-color: #f1f1f1;
}
.table-container {
	max-width: 100%;
	overflow-x: scroll;
}
</style>
<script type="text/javascript">
        $(document).ready(function () {

            (function ($) {

                $('#filtrar').keyup(function () {

                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                })

            }(jQuery));

        });
</script>
<div class="container">
  <div style="padding-top:7px">
    <h3><a href="shopcar.php?slug=<?php echo SLUG ?>"><i class="fas fa-reply fa-lg"></i></a> | Reportes  | <font size="5" color="#999"><?php echo $item['item'] ?></font></h3>
  </div>
  <hr>
  <form name="form1" method="post">
    <!--<div class="container mt-5 mb-5" style="width: 600px">-->
    <div align="center">
    <div class="form-group col-sm-4">
      <label>Selecciona fechas:</label>
      <div class="input-group">
        <div class="input-group-addon"> <!--<i class="fa fa-calendar"></i>--> </div>
        <input type="text" id="date_range" name="date_range" class="form-control pull-right" value="<?php echo $fecha ?>">
        <span class="input-group-btn">
        <button class="btn btn-info btn-flat" type="submit" name="submitRangeDates">Buscar</button>
        </span> </div>
    </div>
    </div>
    <div class="row">
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
      <div class="col-sm-3">
        <input type="text" class="form-control" id="filtrar" <?php echo $may ?>  placeholder="Buscar...">
      </div>
      <div align="center" class="col-sm-3"><a href="bajarExcelReporte.php?idCliente=<?php echo NUM_CLIENTE ?>&fecha1=<?php echo $fecha1 ?>&fecha2=<?php echo $fecha2 ?>&envio=<?php echo $_POST['envio'] ?>"><img src="../img/bajarExcel.png" height="40"></a></div>
    </div>
  </form>
</div>
<br>
<div class="table-responsive">
  <div class="container">
    <table class="table table-hover  table-condensed table-bordered" style="background-color:#FFFFFF; font-size:13px">
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
	
    ?>
        <tr>
          <td><?php echo $num ?></td>
          <td><strong>
            <?php 
		if($row['envio']=='MESA' && $row['mesa']>0) echo $row['envio']." ".$row['mesa']; else echo $row['envio'] ?>
            </strong></td>
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
            <a href="delivery/acciones/vusualizarrPedido.php?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $row['idPedido']?>"> <i style='color:#228a90' class='fa fa-eye fa-lg'></i></a>
            <?php }?></td>
        </tr>
        <tr bgcolor="#99FF00">
          <?php  $total+=$row['total'];}?>
          <td colspan="6" align="right"><strong>TOTAL $</strong></td>
          <td align="right"><strong><?php echo number_format($total, 2, ',', '.') ?></strong></td>
          <td colspan="3" align="right"></td>
      </tbody>
    </table>
  </div>
</div>
</div>
<br><br><br><br><br><br><br>
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
<script>
$(function () {
    $('#date_range').daterangepicker({
        "locale": {
            "format": "DD-MM-YYYY",
            "separator": " - ",
            "applyLabel": "Guardar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Personalizar",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        /*"startDate": "<?php echo date('d-m-Y') ?>",
        "endDate": "<?php echo date('d-m-Y') ?>",*/
        "opens": "center"
    });
});
</script> 

<!--<script>
$('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
});
</script>-->
<?php require($url.'template/footer.php'); ?>
