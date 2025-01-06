<?php 
require_once('menu/menu.php');
$resultado = $mysqli->query("SELECT * FROM delivery");
$row = $resultado->fetch_assoc();
?>
<link rel="stylesheet" href="popup/css/lightbox.min.css">
<div class="container">
<h2>Delivery</h2> <hr>
<?php if($row['	idDely']>0 && $row['estado']==1){?>
<table width="90%" border="0" cellpadding="5">
  <tr>
    <td><strong>Teléfono:</strong></td>
    <td>0261 251 3652</td>
  </tr>
  <tr>
    <td><strong>Dirección:</strong></td>
    <td>Cervantes 1540 - Godoy Cruz - Mendoza - Argentina</td>
  </tr>
  <tr>
    <td><strong>Horarios:</strong></td>
    <td>de 12 a 15 y de 20 a 23 hs</td>
  </tr>
</table>
<?php }else{?>

<?php }?>
<div align="center">

</div>
</div>

</body>
</html>