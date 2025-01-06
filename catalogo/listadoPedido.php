<?php 
require_once("template/cenefa.php");
require_once("template/menu.php");
$volver="./?c=".$slug;
?>
<div class="animsition">
    <style type="text/css">
    body {
        margin: 0;
        font-family: Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 14px;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: left;
        background-color: #fff;
    }

    .table th,
    .table td {
        padding: 0.55rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }
    </style>
    <script language="JavaScript">
    var mensaje = "Desea eliminar el registro?";

    function confirmar() {
        return confirm("Desea eliminar este producto?");
    }
    </script>
    <br><br><br><br><br><br>
    <div class="container">
        <h3><?php echo TITULO_1 ?></h3>
        <p style="font-family:Arial,Verdana; size: 2">
        <div class="table-responsive">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo CANT ?></th>
                        <th><?php echo IMAGEN ?></th>
                        <th><?php echo PRODUCTO ?></th>
                        <th><?php echo PRECIO ?></th>
                        <th><?php echo BORRAR ?></th>
                    </tr>
                </thead>
                <tbody>
<?php //print_r($_SESSION);
$sel="SELECT pro.idProducto,car.cantidad,car.categoria,car.precio,car.producto,car.numPedido 
FROM car_temp_pedido car,productos pro 
WHERE car.token='".$_SESSION['sesiones'][0]."' AND car.cliente='".$idCliente."' AND pro.idProducto=car.idProducto AND car.cliente=pro.idCliente AND pro.estado=0";
$m=$mysqli->query($sel);
while($rox = $m->fetch_assoc()){ 
$subtotal= ($rox['cantidad'] * $rox['precio']);
$total+=$subtotal;
?>
<tr>
    <td><?php echo $rox['cantidad']?></td>
    <td><img class="img-fluid"
            src="imgCliente/<?php echo $slug ?>/productos/<?php echo $rox['idProducto'].".jpg?ver=".time() ?>"
            alt="" width="60" height="" /></td>
    <td><?php echo "<strong>".$rox['categoria']."</strong><br>".$rox['producto']?></td>
    <td><?php echo number_format($subtotal, 2, ',', '.') ?></td>
    <td><a onclick="return confirmar()"
            href="shopCar/acciones/borrarProducto.php?slug=<?php echo $slug ?>&numPedido=<?php echo $rox['numPedido'] ?>"
            title="Borrar Producto">
            <font color="#df0024"><i class="fa fa-times-circle fa-2x"></i></font>
        </a></td>
</tr>
<?php } ?>
<tr>
    <td colspan="3" align="right"><b>Total $</b></td>
    <td><b><font size="3"><?php $total; echo number_format($total, 2, ',', '.') ?></font></b></td>
    <td></td>
</tr>
</tbody>
</table>
</p>
</div>

        <div align="center">
<?php if($total >0 && $tipoCat=='carrito'){?>
		<a href="login.php?url=menuFormaPedido.php&c=<?php echo $slug ?>&minimo=<?php echo $roc['minimo']?>&total=<?php echo $total ?>"><button type="button"
		class="btn btn-success btn-lg"><?php echo REALIZAR_PEDIDO ?> >></button></div></a>

<p align='center'><br><?php echo TEXTO_2 ?><br> <font size="5"><strong>
<?php if($config['pDelivery']>0) echo "$".$config['pDelivery']; else echo SIN_MINIMO;?></strong></font></p>
<?php }else{echo "No hay producto seleccionado.";}?>
    </div>

</div>
</div>
<br> <br> <br><br>
<?php require("template/footer.php"); ?>