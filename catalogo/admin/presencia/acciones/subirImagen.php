<?php
$id=$_GET['id'];
$carpeta_destino="../../../imgCliente/".$_GET['slug']."/presencia/";
if (!file_exists($carpeta_destino)) {
    mkdir($carpeta_destino, 0777, true);
}
$nombre=date('yndHs');
$tipo_imagen=$_FILES['imagen']['type'];
$imagen=$_FILES['imagen']['name'];
if($tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/jpeg' || $tipo_imagen == 'image/png'){
	$extension = pathinfo($imagen, PATHINFO_EXTENSION);
	$imagen_destino=$carpeta_destino.$nombre.".".$extension;
$imagefile = $_FILES['imagen']['tmp_name'];

function icreate($filename)
{
  $isize = getimagesize($filename);
  if ($isize['mime']=='image/jpeg')
    return imagecreatefromjpeg($filename);
  elseif ($isize['mime']=='image/png')
    return imagecreatefrompng($filename);
  /* Add as many formats as you can */
}

function resizeCrop($image, $width, $height, $displ='center')
{
  /* Original dimensions */
  $origw = imagesx($image);
  $origh = imagesy($image);

  $ratiow = $width / $origw;
  $ratioh = $height / $origh;
  $ratio = max($ratioh, $ratiow); /* This time we want the bigger image */

  $neww = $origw * $ratio;
  $newh = $origh * $ratio;

  $cropw = $neww-$width;
  /* if ($cropw) */
  /*   $cropw/=2; */
  $croph = $newh-$height;
  /* if ($croph) */
  /*   $croph/=2; */

  if ($displ=='center')
    $displ=0.5;
  elseif ($displ=='min')
    $displ=0;
  elseif ($displ=='max')
    $displ=1;

  $new = imageCreateTrueColor($width, $height);
 /* $kek=imagecolorallocate($new, 255, 255, 255);
  imagefill($new,0,0,$kek);*/

  imagecopyresampled($new, $image, -$cropw*$displ, -$croph*$displ, 0, 0, $width+$cropw, $height+$croph, $origw, $origh);
  return $new;
}
$imgh = icreate($imagefile);
$imgr = resizeCrop($imgh, 500, 350, 0.4);
imagejpeg($imgr,$imagen_destino); ?>

 <script type="text/javascript">
	window.location="../presenciaWeb.php?slug=<?php echo $_GET['slug']?>";
</script>

<?php exit();
}else{
	echo "<br>El formato de la imagen debe ser unicamente jpg ó jpeg";
	exit();
}
?>