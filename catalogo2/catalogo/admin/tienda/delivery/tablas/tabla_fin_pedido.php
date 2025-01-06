<?php 
session_start();
require_once('../../../../conexion/conexion.php');
require_once('../../../idiomas/es.php');
?>

    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
            <h6>
            <div class="table-responsive">
                <table class="table table-hover table-condensed table-bordered" style="font-size:14px;background-color:#FFF;">
                <thead>
                  <tr>
                    <th><?php echo TABLA_19 ?></th>
                    <th><?php echo TABLA_20 ?></th>
                    <th><?php echo TABLA_21 ?></th>
                    <th><?php echo TABLA_22 ?></th>
                    <th><?php echo TABLA_23 ?></th>
                    <th><?php echo TABLA_24 ?></th>
                    <th><?php echo TABLA_10 ?></th>
                    <th><?php echo TABLA_25 ?></th>
                    <th><?php echo TABLA_26 ?></th>
                  </tr>
                </thead>
                <tbody>
<?php
$shop="SELECT * FROM car_pedido cp,car_comprador ca 
WHERE cp.idCliente='".$_GET['idCliente']."'  AND cp.idComprador=ca.idComprador AND ocultar=0  ORDER BY fechaPedido DESC"; 
     $result = $mysqli->query($shop);
	 $row_cnt = $result->num_rows;
      while($data = $result->fetch_assoc()){
if($data['tipoPago'] != '' || $data['envio'] == 'MESA') {
		 
		  $datos=$data['idPedido']."||".$data['estado'];
			 $a = $mysqli->query("SELECT * FROM estado_pedido WHERE estadoPedido_es='".$data['estadoPedido_es']."'");
				$color = $a->fetch_assoc();
				$color="<font color=".$color['color']."><i class='fa fa-circle fa-lg'></i></font>";
 $total+=$precio;
?>
        <tr <?php echo $pagado ?>>
            <td align="center"><strong><?php echo $data['idPedido']?></strong></td>
            <td><?php if($data['envio']=='DELIVERY'){?>
            <a href="?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $data['idPedido']?>&#popup2"><i style="color:#ba007c" class="fa fa-map-marker fa-2x"></i></a>&nbsp;
			<?php }?> 
			<?php echo "<strong>".$data['envio']."</strong>"; if($data['envio']=='MESA')  echo " | ".$data['mesa']?>
            </td>
            <td><?php echo $data['nombreComp']." - <strong>".$data['celComp']."</strong>"?></td>
            <td><?php echo date("d-m-Y H:i",strtotime($data['fechaPedido']))." Hr."?></td>
            <td align="right"><?php  echo number_format($data['total'], 2, ',', '.')?></td>
            <td><?php echo $data['tipoPago']?></td>
            
            <td><?php echo $color?> 
				<a href="?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $data['idPedido']?>&estadoPedido_es=<?php echo $data['estadoPedido_es']?>&#popup">
            <button type="button" class="btn btn-default btn-xs"><?php echo $data['estadoPedido_es'] ?></button>
            </a>
            </td>
            
            <td>
             <a href="?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $data['idPedido']?>&#popup1">
            <button type="button" class="btn btn-primary btn-xs"><?php echo BOTON_10 ?></button>
            </a></td>

             <td align="center"> 
            <?php if($data['estadoPedido_es']=='PAGADO' || $data['estadoPedido_es']=='ANULADO'){?>
             <a onclick="return ocultar()" title="Ocultar Pedido" href="delivery/acciones/ocultarPedido.php?slug=<?php echo $_GET['slug'] ?>&idPedido=<?php echo $data['idPedido']?>">
            <button type="button" class="btn btn-warning btn-xs"><i class='fa fa-eye-slash'></i></button>
            </a></td>
            <?php }}?>
        </tr>
			<?php $row_cnt=$row_cnt-1;}?>
                    
                   
                    </tbody>
               
                </table>
            </div>    
            </h6>
        </div>
    

        
<!-- <br><br><br><br><br> -->