<?php
$date =  $row['fechaAlta'];
$diasPrueba=$row['prueba'];
//Incrementando 2 dias
$mod_date = strtotime($date."+$diasPrueba days");
$fechaNva=date("Y-m-d",$mod_date) . "\n";

  $fechaActual = date('Y-m-d'); 
  $datetime1 = date_create($fechaEnvio);
  $datetime2 = date_create($fechaNva);
  $contador = date_diff($datetime1, $datetime2);
  $differenceFormat = '%a';
  $dias = $contador->format("%r");
  $dias .=$contador->format($differenceFormat);




    if($dias<=5 && $dias>=0)
        echo "<font color=red>".intval($dias)."</font> d";
    else if($dias < 0)
        echo "<font color=#91b5c4>".$dias."</font> d";
    else
        echo $dias." d";
?> 
