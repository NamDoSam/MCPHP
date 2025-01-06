<?php
$mensaje = "<div>
<table width='100%' border='0' align='center' cellpadding='5'>
  <tr>
    <td align='center'><font size='4'><strong>RECUPERAR CONTRASEÑA</strong></font><hr></td>
  </tr>
   <tr>
	  <td>Cliente: <strong>".$row['apellido'].", ".$row['nombre']."</strong></td>
  </tr>
  <tr>
	  <td>Su Contraseña es: <strong>".$row['pass']."</strong></td>
  </tr>
   <tr>
	  <td>Fecha: <strong>".date('d-m-Y H:i')." Hs.</strong></td>
  </tr>
</table>
<br>
</div>";
?>
