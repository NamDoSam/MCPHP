<?php 
$url='../';
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$idCliente=$_GET['idCliente'];
if(!$_FILES['archivo']['name'] != null){?>
<div class="container">
	<h2>Subir Excel de productos</h2><hr>
	<div class="row">
	  <div class="col-sm-4"></div>
	  <div class="col-sm-4">

	    <form method="post" enctype="multipart/form-data" action="subirExcel.php?idCliente=<?php echo $idCliente ?>&slug=<?php echo $_GET['slug'] ?>">
	      <div class="form-group">
	        <label>Subir archivo .xls | .xlsx</label>
	         <input type="file" name="archivo" class="form-control" accept=".xls, .xlsx" required>
	      </div>
	      <button type="submit" class="btn btn-primary">Subir Archivo</button>
	    </form>

	  </div>
</div>
<?php }else{
if ($_FILES['archivo']['name'] != null) {
$nombre_imagen=$_FILES['archivo']['name'];
$tipo_imagen=$_FILES['archivo']['type'];
$tamagno_imagen=$_FILES['archivo']['size'];
$fileNameCmps = explode(".", $nombre_imagen);
$fileExtension = strtolower(end($fileNameCmps));

	if($tamagno_imagen <= 1500000){
		if($fileExtension == 'xls' || $fileExtension == 'xlsx'){
	$carpeta_destino="Excel/archivosExcel/MenuCatalogo.".$fileExtension; 
	move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta_destino);
	}else{
		echo "<br>El formato de la imagen debe ser unicamente jpg";
	}
	}else{
		echo "<br>El tamaño de la imagen es demaciado grande";
	}
}

require_once ('Excel/Classes/PHPExcel/IOFactory.php');
	//$carpeta_destino='Excel/archivosExcel/QR_Menu.xls';
	$objPHPExcel = PHPEXCEL_IOFactory::load($carpeta_destino);
	$objPHPExcel->setActiveSheetIndex(0);
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	for($i = 2; $i <= $numRows; $i++){
		$idProducto=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$producto=$objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
		$descripcion=$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
		$precio=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$precioPromo=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		
	$sql = "UPDATE productos SET producto='".$producto."',descripcion='".$descripcion."',precio='".$precio."',precioPromo='".$precioPromo."' WHERE idProducto='".$idProducto."' AND idCliente='".$idCliente."'";
		$mysqli->query($sql);
	$result = $mysqli->query($sql);
	}
//header("location: productos.php");
?>
<script type="text/javascript">
	location.href = "excelProductos.php?slug=<?php echo $_GET['slug'] ?>";
</script>
<?php exit; }?>
</div>
<?php require($url.'template/footer.php'); ?>
