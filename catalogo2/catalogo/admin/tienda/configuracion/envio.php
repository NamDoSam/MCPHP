
<div class="video">
<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal2"><img class="ImgVideo" title="Configuración de la zona de envío" src="videoTutorial.png" height="45px"></a>
</div>

<form name="form2" method="post" action="configuracion/guardarEstado.php?accion=envio&slug=<?php echo SLUG ?>&menu=<?php echo $menu ?>">

<input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
<input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">

<h5>• Configurar Precio de envío</h5>
<div align="center">

  <div class="row">
  <div class="col-sm-4">
  	<strong>Pecio del Envío $
            <input name="pEnvio" step="any" class="form-control" placeholder="000.00" type="number" value="<?php echo $row['pEnvio'] ?>">
    </strong>
  </div>
  <div class="col-sm-4">
  <strong>Compra mínima p/Envío $
            <input name="pDelivery" step="any" class="form-control" placeholder="000.00" type="number" value="<?php echo $row['pDelivery'] ?>">
  </strong>
  </div>
  <div class="col-sm-4"></div>
  
</div>   
</div>
<hr>
<!--<div class="video">
<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal3"><img class="ImgVideo" title="Configuración de la zona de envío" src="videoTutorial.png" height="45px"></a>
</div>-->
<h5>• Configurar Zona de envío</h5>
<div align="center">

<div class="row">
  <div class="col-sm-4">
  	<input name="pMapZona" step="any" class="form-control" placeholder="Pegar el código del mapa" type="text" value="<?php echo htmlspecialchars($row['pMapZona']) ?>">
  </div>
  <div class="col-sm-4">
  <a href="https://www.google.com/maps/d/" target="_blank">
            <button type="button" class="btn btn-success"><i class="fa fa-map-marker"></i> Configurar Zona</button>
   </a>
  </div>
  <div class="col-sm-4"></div>
  
</div>   
</div>

<hr>

<div class="row">
  <div class="col-sm-4">
  <input style="margin-left:20px;" name="pfueraZona" type="checkbox" <?php if($row['pfueraZona']==1) echo "checked" ?>> <strong>&nbsp;&nbsp;Consultar envíos fuera de la zona</strong>
  </div>
  <div class="col-sm-3">
	  
	  <label class="textfield">Código país<?php //echo FORM_2 ?></label>
         <select name="codigoCons" class="form-control">
			<option value="54 9"<?php if($row['codigoCons'] == "54 9") echo "selected" ?>>Argentina +54 9</option>
			<option value="55 64"<?php if($row['codigoCons'] == "55 64") echo "selected" ?>>Brasil +55 64</option>
			<option value="56 9"<?php if($row['codigoCons'] == "56 9") echo "selected" ?>>Chile +56 9</option>
		  </select>
      </div>
	<div class="col-sm-4">  
		<label class="textfield"><strong>Whatsapp consulta</strong></label>
  <input name="whatConsulta" class="form-control" placeholder="000 0000 000" type="text" value="<?php echo $row['whatConsulta'] ?>">
  </div>
  <!--<div class="col-sm-4"></div>-->
</div>

<hr>
<h5>• Email para aviso de pedido</h5>
<div class="row">
  <div class="col-sm-4">
  <input name="email_1" <?php echo $min ?> class="form-control" placeholder="Email 1" type="email" value="<?php echo $row['email_1'] ?>">
  </div>
  <div class="col-sm-4">
  <input name="email_2" <?php echo $min ?> class="form-control" placeholder="Email 2" type="email" value="<?php echo $row['email_2'] ?>">
  </div>
  <div class="col-sm-4"></div>
</div>

<hr>
<h5>• Whatspp para aviso de pedido</h5>
	
	<table width="95%" border="0">
  <tbody>
    <tr>
      <td width="23%">
        <label class="textfield">Código país<?php //echo FORM_2 ?></label>
         <select name="codigo" class="form-control">
			<option value="54 9"<?php if($row['codigo'] == "54 9") echo "selected" ?>>Argentina +54 9</option>
			<option value="55 64"<?php if($row['codigo'] == "55 64") echo "selected" ?>>Brasil +55 64</option>
			<option value="56 9"<?php if($row['codigo'] == "56 9") echo "selected" ?>>Chile +56 9</option>
		  </select>
      </div>
		</td>
      <td width="74%">
		<label for="textfield">Num. Movil </label>  
		  <input name="celPedido" style="width: 150px" class="form-control" placeholder="00000000000" type="text" value="<?php echo $row['celPedido'] ?>"/></td>
      <td width="3%">&nbsp;</td>
    </tr>
  </tbody>
</table>
	
	
<!--<div class="row">
  <div class="col-xs-2" align="right">
	  <label for="textfield">Código +</label>
	  <input name="codigo" style="width: 90px"  class="form-control" placeholder="0000" type="number" value="<?php echo $row['codigo'] ?>"/>
	</div>
  <div class="col-xs-4">
  <input name="celPedido" style="width: 150px" class="form-control" placeholder="00000000000" type="number" value="<?php echo $row['celPedido'] ?>"/>
  </div>
	  
  <div class="col-xs-4" align="left"> &nbsp;(Con el código de área, sin el 15 y sin espacios.) </div> 	
	  
</div>-->

<hr>
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4" align="center"><button type="submit" class="btn btn-warning">&nbsp;&nbsp;Guardar envío >>&nbsp;&nbsp;</button></div>
  <div class="col-sm-4"></div>
</div>

</form>
<br>

