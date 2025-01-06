<?php 
require_once('menu/menu.php');
if(!$_FILES['archivo']['name'] != null){?>
<div class="container">
	<h2>Subir Excel de productos</h2>
	<div class="row">
	  <div class="col-sm-4"></div>
	  <div class="col-sm-4">

	    <form method="post" enctype="multipart/form-data" action="subirExcel.php?slug=<?php echo $_GET['slug'] ?>&idCliente=<?php echo $_GET['idCliente'] ?>">
	      <div class="form-group">
	        <label>Archivo .xls | .xlsx</label>
	         <input type="file" name="archivo" class="form-control" accept=".xls,.xlsx" required>
	      </div>
	      <button type="submit" class="btn btn-primary">Subir Archivo</button>
	    </form>

	  </div>
</div>
<?php }else{
$numRows=0;
if ($_FILES['archivo']['name'] != null) {
$nombre_imagen=$_FILES['archivo']['name'];
$tipo_imagen=$_FILES['archivo']['type'];
$tamagno_imagen=$_FILES['archivo']['size'];
$fileNameCmps = explode(".", $nombre_imagen);
$fileExtension = strtolower(end($fileNameCmps));


if($fileExtension == 'xls' || $fileExtension == 'xlsx'){
	$carpeta_destino="Excel/archivosExcel/MenuCatalogo.".$fileExtension;
	move_uploaded_file($_FILES['archivo']['tmp_name'],$carpeta_destino);
	}else{
		echo "<br>El formato del archivo de ser xls ó xlsx";
		exit();
	}
	
}

require_once ('Excel/Classes/PHPExcel/IOFactory.php');
	//echo $carpeta_destino='Excel/archivosExcel/QR_Menu.xls';
	$objPHPExcel = PHPEXCEL_IOFactory::load($carpeta_destino);
	$objPHPExcel->setActiveSheetIndex(0);
	$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	for($i = 2; $i <= $numRows; $i++){
		$idProducto=$objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
		$codigo=$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
		$producto=$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
		$descripcion=$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
		$precio=$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
		$precioPromo=$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
		
	$sql = "UPDATE productos SET codigo='".$codigo."',producto='".$producto."',descripcion='".$descripcion."',precio='".$precio."',precioPromo='".$precioPromo."' WHERE idProducto='".$idProducto."' AND idCliente='".$_GET['idCliente']."'";
		$mysqli->query($sql);
	$result = $mysqli->query($sql);
	}
//header("location: productos.php");
?>
<script type="text/javascript">
	location.href = "excelProductos.php?slug=<?php echo $_GET['slug'] ?>";
</script>
<?php exit; }?>
