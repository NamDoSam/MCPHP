<?php 
session_start();
require_once("../imgCliente/".$_GET['c']."/config/config.php");
require_once('../conexion/conexion.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="panel panel-default">
            <h6>
                <table class="table table-striped table-condensed">
                    <tbody>
<?php   
$result = $mysqli->query("SELECT * FROM car_pedido WHERE idPedido='".$_SESSION['sesiones'][5]."' ORDER BY idPedido DESC");
	$data = $result->fetch_assoc();
	$vendedor=$data['vendedor'];
	 $a = $mysqli->query("SELECT * FROM estado_pedido WHERE estadoPedido='".$data['estadoPedido']."'");
				$color = $a->fetch_assoc();
				$color="<font color=".$color['color']."><i class='fa fa-circle fa-lg'></i></font>";
if($data['envio']=='MESA')	$envio= "MESA N° ".$data['mesa']; else 	$envio=	$data['envio'];
?>
                        <tr>
                            <td>Nombre:</td>
                            <td><strong><?php echo $_SESSION['sesiones'][2]?></strong></td>
                        </tr>

                        <tr>
                            <td>Fecha:</td>
                            <td><strong><?php echo date("d-m-Y H:i",strtotime($data['fechaPedido']))." Hs." ?></strong></td>
                        </tr>
                        
                        <tr>
                            <td>Pedido:</td>
                            <td> <?php echo "<b>".$envio."</b>" ?> </td>
                        </tr>

					<?php if ($data['pago']=='SI' || $data['tipoPago']!=''){ ?>
                        <tr>
                            <td>Estado del pedido:</td>
                            <td> <?php echo $color." <b>".$data['estadoPedido']."</b>" ?></td>
                        </tr>
                      <?php } ?>  
                        <!--<tr>
                            <td colspan="2"><img src="img/iconos/estadoPedido.jpg" width="300"></td>
                        </tr>-->
                        
                         <?php if($data['vendedor']){?>
                        <tr>
                        	<td>Vendedor:</td>
                            <td>
								<?php echo "<b>".$vendedor."</b>"?>
							</td>
						</tr>
						<?php }?>

                        <?php if($envio!='MESA'){?>
                        <!--<tr>
                            <td colspan=2 align="center" style="color: red">
                                <h5>*Para finalizar selecciona un forma de pago.</h5>
							</td>
						</tr>-->
						<?php }?>
                        
                       
						<?php  if($data['tipoPago']!='') {?>
                        
                        <tr>
                        	<td>Pago</td>
                            <td><strong><?php echo $data['tipoPago'] ?></strong></td>
                   		</tr>
                        <?php } //print_r($_SESSION); 
						//echo "<br>token".$_SESSION['sesiones'][0];?>
                        
                    </tbody>
               
                </table>
                
            </h6>
        </div>
    </div>
    
</div>

      
<!-- <br><br><br><br><br> -->