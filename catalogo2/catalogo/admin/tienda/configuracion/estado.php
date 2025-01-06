
<!--<div class="video">
<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal"><img class="ImgVideo" title="Configuración general de la tienda" src="videoTutorial.png" height="45px"></a>
</div>-->

<form name="form2" method="post" action="configuracion/guardarEstado.php?accion=estado&slug=<?php echo SLUG ?>&menu=<?php echo $menu ?>">
<input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
<input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">

<h5>• Configurar tienda</h5>
<div align="center">
<strong>Estado de la tienda&nbsp;&nbsp;&nbsp;
            <?php $res = $mysqli->query("SELECT delivery,abierto FROM clientes WHERE  idCliente='".NUM_CLIENTE."'");
			$r = $res->fetch_assoc(); 
			if($r['abierto']==1){ $checked="checked"; $estado='<font color="#00CC00">Abierto</font>';
			}else{$estado='<font color=red>Cerrado</font>';}?>
            <input name="estado" type="checkbox" <?php if($r['abierto']==1)  echo "checked" ?> onchange="this.form.submit()">
            <label>&nbsp;&nbsp;<?php echo $estado ?></label>
            </strong>
</div>
<hr>
<h5>• Métodos de entrega</h5>
<div class="row">
  <div class="col-sm-4">
  <label>
  <input style="margin-left:20px;" name="eMesa" style="" type="checkbox" <?php if($row['eMesa']==1) echo "checked" ?> onchange="this.form.submit()">
    &nbsp;&nbsp;A la mesa
    </label> 
  </div>
  <div class="col-sm-4">
  <label>
  <input style="margin-left:20px;" name="eRetirar" type="checkbox" <?php if($row['eRetirar']==1) echo "checked" ?> onchange="this.form.submit()">
    &nbsp;&nbsp;Paso a retirar
    </label> 
  </div>
  <div class="col-sm-4">
  <label>
  <input style="margin-left:20px;" name="eDelivery" type="checkbox" <?php if($row['eDelivery']==1) echo "checked" ?> onchange="this.form.submit()">
    &nbsp;&nbsp;Delivery 
    </label> 
  </div>
</div>
</form>
<br>

