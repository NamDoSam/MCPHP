
<!--<div class="video">
<a style="cursor:pointer;" data-toggle="modal" data-target="#myModal2"><img class="ImgVideo" title="Configuración de la zona de envío" src="videoTutorial.png" height="45px"></a>
</div>-->
    <h4>• Métodos de Cobro</h4>
    <?php if ($_GET['texCobro']!='') echo "<font color='#e8511c'>- ".$_GET['texCobro']." -</font>";?>
    <table class="table table-border" style="background-color: #fff;">
      <tr>
        <td><strong>A la mesa</strong></td>
        <td><strong>Paso a retirar</strong></td>
        <td><strong>Delivery</strong></td>
    
      </tr>
      <form name="form1" method="post" action="configuracion/guardarEstado.php?accion=cobro&slug=<?php echo SLUG ?>&menu=<?php echo $menu ?>">
        <input name="idCliente" type="hidden" value="<?php echo NUM_CLIENTE ?>">
        <input name="idConfi" type="hidden" value="<?php echo $row['idConfi'] ?>">
        <tr>
          <?php for($i=1;$i<=3;$i++){?>
          <td><div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="efectivo_<?php echo $i ?>" type="checkbox" <?php if($row["efectivo_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;&nbsp;Efectivo</label>
            </div>
            
            <br>
            <div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="tarjeta_<?php echo $i ?>" type="checkbox" <?php if($row["tarjeta_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;&nbsp;Posnet Local</label>
            </div>

            <br>
            <div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="MerPago_<?php echo $i ?>" type="checkbox" <?php if($row["MerPago_$i"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;&nbsp;Mercado Pago</label>
            </div>
            <?php if($i==1){?>
            <br>
            <div class="checkbox" style="margin-left:20px;">
              <label> &nbsp;
                <input name="PedirCta_1" type="checkbox" <?php if($row["PedirCta_1"]==1) echo "checked" ?> onchange="this.form.submit()">
                &nbsp;&nbsp;Pedir la cuenta</label>
            </div>
			<?php 	}?>		
			</td>
          <?php }?>
        </tr>
        <!--<td colspan="3" align="center">&nbsp;</td>-->
      </form>
      <tr>
        <td colspan="3"><?php if($row['MerPago_1']==1 || $row['MerPago_2']==1 || $row['MerPago_3']==1){?>
          <button class="accordion"><strong>• Vincular Mercado Pago</strong></button>
          <div class="panelAcordeon">
            <div class="form-group">
            <div align="center">
              <br>
              <div align="right">
              <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal3">
			<img class="ImgVideo" title="Cómo vincular a MercadoPago" src="videoTutorial.png" height="45px"></a>
            </div>
            
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

