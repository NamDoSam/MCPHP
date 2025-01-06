<?php 
$nombre_imagen=$_FILES['imagen']['name'];
$tipo_imagen=$_FILES['imagen']['type'];
$tamagno_imagen=$_FILES['imagen']['size'];

$imagefile = $_FILES['imagen']['tmp_name'];

/**
 * Opens new image
 *
 * @param $filename
 */
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

  imagecopyresampled($new, $image, -$cropw*$displ, -$croph*$displ, 0, 0, $width+$cropw, $height+$croph, $origw, $origh);
  return $new;
}

$imgh = icreate($imagefile);
$imgr = resizeCrop($imgh, 500, 350, 0.4);
//Definimos la calidad de la imagen final
header('Content-type: image/jpeg');
imagejpeg($imgr);
$_FILES['imagen']['tmp_name']=$imgr;
	//if($imgr == 'image/jpg' || $imgr == 'image/jpeg'){
	$carpeta_destino="../../imgCliente/1/productos/15.jpeg";
	move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino);
	/*}else{
		echo "<br>El formato de la imagen debe ser unicamente jpg";
	}*/
exit();
?>