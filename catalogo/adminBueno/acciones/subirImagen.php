<?php 
$carpeta_destino="../../imgCliente/".$_GET['slug']."/productos/";
if (!file_exists($carpeta_destino)) {
    mkdir($carpeta_destino, 0777, true);
}
$tipo_imagen=$_FILES['imagen']['type'];
if($tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/jpeg'){
$imagen_destino="../../imgCliente/".$_GET['slug']."/productos/".$id.".jpg";
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
imagejpeg($imgr,$imagen_destino);
//exit();
}else{
	echo "<br>El formato de la imagen debe ser unicamente jpg ó jpeg";
	exit();
}
?>