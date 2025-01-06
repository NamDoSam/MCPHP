<?php 
$animales = "<?php ";
$animales .= " \n ";
$animales .= "const SERVERURL='http://localhost/qr/demo/restaurante/';";
$animales .= " \n ";
$animales .= "const NUM_CLIENTE='1';";
$animales .= " \n ";
$animales .= "?>";
if ($fp = fopen("animales.php", "w")){
    fwrite($fp, $animales);
}
fclose($fp);
?>