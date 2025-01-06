<?php
require_once('menu/menu.php');
if($_SESSION['delivery']==0){
$diaHoy=date('Y-m-d');
$fecha1=isset($_POST['fecha1']) ? $_POST['fecha1'] : $_GET['fecha1'];
$fecha2=isset($_POST['fecha2']) ? $_POST['fecha2'] : $_GET['fecha2']; 
if(!isset($fecha1)) $fecha1=$diaHoy;
if(!isset($fecha2)) $fecha2=$diaHoy;
$resultado = $mysqli->query("SELECT * FROM car_configuracion WHERE  idCliente='".NUM_CLIENTE."'");
$row = $resultado->fetch_assoc();
?>
<style>
body {
	background-color:#fff;
}
.panel {
	margin-bottom: 0px;
	background-color: #fff;
	padding:10px;
	border: 1px solid #CCC;
	border-radius: 8px;
	-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.btn.active span.nonCheckBoxAllow {
	display: none;
}
.btn.active span.checkBoxAllow {
	display: inline;
}
.btn span.nonCheckBoxAllow {
	display: inline;
}
.btn span.checkBoxAllow {
	display: none;
}
.accordion {
	background-color: #e1e8a6;
	color: #444;
	cursor: pointer;
	padding: 18px;
	width: 100%;
	border: none;
	text-align: left;
	outline: none;
	font-size: 15px;
	transition: 0.4s;
}
.active, .accordion:hover {
	background-color: #d3da9b;
}
.accordion:after {
	content: '\002B';
	color: #777;
	font-weight: bold;
	float: right;
	margin-left: 5px;
}
.active:after {
/*content: "\2212";*/
}
.panelAcordeon {
	padding: 0 18px;
	background-color: white;
	max-height: 0;
	overflow: hidden;
	transition: max-height 0.2s ease-out;
}
input[type=checkbox] {
	transform: scale(1.8);
	cursor:pointer;
}
.table {
       border-bottom:0px !important;
}
.table th, .table td {
       border: 1px !important;
}
.fixed-table-container {
       border:0px !important;
}
.w-75 {width:50%}
</style>
<link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
<div class="container">
<div class="row">
  <div class="col-md-6 col-lg-6 col-12">
    <div class="panel panel-default">
      <h4>• Configuración General  &nbsp;&nbsp;&nbsp;&nbsp;
		<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
			<img class="ImgVideo" title="Configuración general de la tienda" src="videoTuto.jpg" height="45px"></a></h4>
      <?php if ($_GET['texEnvio']!='') echo "<font color='#e8511c'>- ".$_GET['texEnvio']." -</font>";?>
      <form name="form2" method="post" action="delivery/guardarShopcar.php?accion=estado&slug=<?php echo SLUG ?>&id=<?php echo NUM_CLIENTE ?>">
        <input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
        <table class="table" style="background-color: #fbffe0; border-top: 0px !important;; ">
        <tr>
          <td colspan="4" align="center"><strong>Estado del negocio&nbsp;&nbsp;&nbsp;
            <?php $res = $mysqli->query("SELECT delivery,abierto FROM clientes WHERE  idCliente='".NUM_CLIENTE."'");
			$r = $res->fetch_assoc(); if($r['abierto']==1){ $checked="checked"; $estado='<font color="#00CC00">Abierto</font>';}else{$estado='<font color=red>Cerrado</font>';}?>
            <input name="estado" type="checkbox" <?php if($r['abierto']==1)  echo "checked" ?> onchange="this.form.submit()">
            <label>&nbsp;&nbsp;&nbsp;<?php echo $estado ?></label>
            </strong>
        </tr>
      </form>
      <tr>
          <td colspan="4" bgcolor="#e1e8a6"></td>
        </tr>
      <tr>
        <td colspan="4"><h4>• Métodos de Venta</h4></td>
      </tr>
      <form name="form2" method="post" action="delivery/guardarShopcar.php?accion=envio&slug=<?php echo SLUG ?>">
        <input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
        <input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">
        <tr>
          <td colspan="4" align="center"><strong>
            <input name="eMesa" type="checkbox" <?php if($row['eMesa']==1) echo "checked" ?> onchange="this.form.submit()">
            &nbsp;&nbsp;A la mesa
            </label>
            </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>
            <input name="eRetirar" type="checkbox" <?php if($row['eRetirar']==1) echo "checked" ?> onchange="this.form.submit()">
            &nbsp;&nbsp;Paso a retirar
            </label>
            </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>
            <input name="eDelivery" type="checkbox" <?php if($row['eDelivery']==1) echo "checked" ?> onchange="this.form.submit()">
            &nbsp;&nbsp;Delivery
            </label>
            </strong></td>
        </tr>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#e1e8a6"></td>
        </tr>
        <tr>
          <td colspan="4"><h4>• Configurar Precio y Zona de envío<h4></td>
        </tr>
        <tr>
          <td colspan="1"><strong>Pecio del Envío $
            <input name="pEnvio" step="any" class="form-control" placeholder="000.00" type="number" value="<?php echo $row['pEnvio'] ?>">
            </strong></td>
          <td colspan="2"><strong>Mínimo para Envío $
            <input name="pDelivery" step="any" class="form-control" placeholder="000.00" type="number" value="<?php echo $row['pDelivery'] ?>">
            </strong></td>
          <td align="center">&nbsp;&nbsp;&nbsp;&nbsp;
		<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal2">
			<img class="ImgVideo" title="Configuración de la zona de envío" src="videoTuto.jpg" height="45px"></a></td>
        </tr>
        
        <tr>
          <td colspan="3">
          <input name="pMapZona" step="any" class="form-control" placeholder="Pegar el código del mapa" type="text" value="<?php echo htmlspecialchars($row['pMapZona']) ?>"></td>
          
          <td align="right"><a href="https://www.google.com/maps/d/" target="_blank">
            <button type="button" class="btn btn-success"><i class="fa fa-map-marker"></i> Configurar Zona</button>
            </a></td>
          
          <!-- <td align="right"><a href="https://www.google.com/maps/d/" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-map-marker"></i> Configurar Zona</button></a></td>--> 
        </tr>
        <tr>
        <td colspan="3" align="center">&nbsp;&nbsp;<input name="pfueraZona" type="checkbox" <?php if($row['pfueraZona']==1) echo "checked" ?>> <strong>&nbsp;&nbsp;&nbsp;Consultar envíos fuera de la zona</strong></td>
        <td><strong>Whatsapp consulta</strong>
          <input name="whatConsulta" class="form-control" placeholder="011652415874" type="text" value="<?php echo $row['whatConsulta'] ?>"></td>
        </tr>
        <tr>
        	<td colspan="4"><h4>• Email para aviso de pedido<h4></td>
        </tr>
        <tr>
        	<td colspan="2"><input name="email_1" <?php echo $min ?> class="form-control" placeholder="Email 1" type="email" value="<?php echo $row['email_1'] ?>"></td>
            
            <td colspan="2"><input name="email_2" <?php echo $min ?> class="form-control" placeholder="Email 2" type="email" value="<?php echo $row['email_2'] ?>"></td>
        </tr>
        
        <tr>
        	<td colspan="4"><h4>• Whatspp para aviso de pedido<h4></td>
           
        </tr>
        
         <tr>
         	<td colspan="1" align="right">
            <input name="celPedido" class="form-control w-75" style placeholder="54 9" type="number" value="<?php echo $row['celPedido'] ?>">
            </td>
        	<td colspan="2"><input name="celPedido" class="form-control" placeholder="11xxxxxxxxx" type="number" value="<?php echo $row['celPedido'] ?>"></td>
             <td colspan="2">(Con el código de área,<br>sin el 15 y sin espacios.)</td>
        </tr>
        
        <tr>
        	<td align="center" colspan="4"><button type="submit" class="btn btn-warning">Guardar</button></td>
        </tr>
			  <tr>
          <td colspan="4" bgcolor="#e1e8a6"></td>
        </tr>
          </table>
      </form>
    </div>
  </div>
  
  <!--/////////////////////////////////////////////////////////////////////////////////////////-->
  
  <div class="col-md-6 col-lg-6 col-12">
    <div class="panel panel-default">
    <h4>• Métodos de Cobro</h4>
    <?php if ($_GET['texCobro']!='') echo "<font color='#e8511c'>- ".$_GET['texCobro']." -</font>";?>
    <table class="table table-border" style="background-color: #fbffe0;">
      <tr>
        <td><strong>A la mesa</strong></td>
        <td><strong>Paso a retirar</strong></td>
        <td><strong>Delivery</strong></td>
      </tr>
      <form name="form1" method="post" action="delivery/guardarShopcar.php?accion=cobro&slug=<?php echo SLUG ?>">
        <input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
        <input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">
        <tr>
          <?php for($i=1;$i<=3;$i++){?>
          <td><div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="efectivo_<?php echo $i ?>" type="checkbox" <?php if($row["efectivo_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;Efectivo</label>
            </div>
            
            <br>
            <div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="tarjeta_<?php echo $i ?>" type="checkbox" <?php if($row["tarjeta_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;Posnet Local</label>
            </div>

            <br>
            <div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="MerPago_<?php echo $i ?>" type="checkbox" <?php if($row["MerPago_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;Mercado Pago</label>
            </div>
						
			</td>
          <?php }?>
        </tr>
        <td colspan="3" align="center">&nbsp;</td>
      </form>
      <tr>
        <td colspan="3"><?php if($row['MerPago_1']==1 || $row['MerPago_2']==1 || $row['MerPago_3']==1){?>
          <button class="accordion"><strong>• Vincular Mercado Pago</strong> &nbsp;&nbsp;&nbsp;&nbsp;
		<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal3">
			<img class="ImgVideo" title="Cómo vincular a MercadoPago" src="videoTuto.jpg" height="45px"></a></button>
          <div class="panelAcordeon">
            <div class="form-group">
            <div align="center">
              <h4><a href="https://www.mercadopago.com.ar/developers/panel/credentials" target="_blank">Ingresa tu Credencial de Mercado Pago</a></h4>
              Modo Producción</div>
            <br>
            <form name="form3" method="post" action="delivery/guardarShopcar.php?accion=key&slug=<?php echo SLUG ?>" >
              <input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
              <input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">
              <!--<label class="control-label col-sm-2" for="pwd">Public Key:</label>
              <div class="col-sm-10">
                <?php  if($row['publi_key']!='') $readonly="readonly"; else $readonly=''?>
                <input type="text" <?php echo $readonly ?> autocomplete="new-text" class="form-control" placeholder="Public Key" name="publi_key" required value="<?php echo $row['publi_key'] ?>">
              </div>
              </div>
              <br>
              <br>-->
              <label class="control-label col-sm-2" for="pwd">Access Token:</label>
              <div class="col-sm-10">
                <?php  if($row['access_token']!='') $readonly="readonly"; else $readonly=''?>
                <input type="password" <?php echo $readonly ?> autocomplete="new-password" class="form-control" placeholder="Access Token" name="access_token" required value="<?php echo $row['access_token'] ?>">
                <br>
              </div>
              <div align="right">
                <?php if($row['access_token']!=''){?>
                <input name="vincular" type="hidden" value="Desvincular">
                <button type="submit" name="Desvincular" class="btn btn-danger">Desvincular</button>
                <?php }else{?>
                <input name="vincular" type="hidden" value="Vincular">
                <button type="submit" name="Vincular" class="btn btn-primary">Vincular</button>
                <?php }?>
              </div>
              <br>
            </form>
          </div>
        </div>
      
      <?php }?>
        </td>
      
    </table>
  </div>
</div>
<br>
<br>
<!-- Modal I -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Configuracion general de la tienda</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/y6BaN5QgNi8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<!-- Modal II -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Configuracion general de la tienda</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe2" width="100%" height="400" src="https://www.youtube.com/embed/y6BaN5QgNi8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<!-- Modal III -->
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><font size="30">&times;</font></button>
        <h4 class="modal-title">Cómo vincular a MercadoPago</h4>
      </div>
      <div class="modal-body">
        <iframe class="myframe3" width="100%" height="400" src="https://www.youtube.com/embed/y6BaN5QgNi8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
      </div>-->
    </div>

  </div>
</div>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe').attr('src', 'https://www.youtube.com/embed/e5z_geq0Imo');
	});
	
	$('.close').click(() => {
	$('.myframe').removeAttr('src');
});
</script>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe2').attr('src', 'https://www.youtube.com/embed/M2Q-dSO9bxI');
	});
	
	$('.close').click(() => {
	$('.myframe2').removeAttr('src');
});
</script>

<script>
	$('.ImgVideo').click(() => {
		$('.myframe3').attr('src', 'https://www.youtube.com/embed/kK6pq2DkuaA');
	});
	
	$('.close').click(() => {
	$('.myframe3').removeAttr('src');
});
</script>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script> 
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
</body>
</html>
<?php }else{?>
<script>
location.href="index.php";
</script>
<?php }?>
