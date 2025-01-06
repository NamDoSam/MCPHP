<?php 
set_time_limit(0);
require_once('Excel/funcion.php');
activeErrorReporting();
noCli();
require_once ('Excel/Classes/PHPExcel.php');
require_once('../conexion/conexion.php');

/** Include PHPExcel */
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("MenuCatalogo.com")
							 ->setLastModifiedBy("Tres Zonas")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->freezePaneByColumnAndRow("A4")

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'ID (No modificar)')
            ->setCellValue('B1', 'Rubro (No modificar)')
			->setCellValue('C1', 'Categoría (No modificar)')
			->setCellValue('D1', 'Código')
			->setCellValue('E1', 'Producto')
            ->setCellValue('F1', 'Descripción')
            ->setCellValue('G1', 'Precio')
			->setCellValue('H1', 'Promo');
			

$num=2;
$cate='SELECT * FROM productos pr,rubros ru,categorias ca WHERE pr.idCliente="'.$_GET['idCliente'].'" AND pr.idCat=ca.idCat AND ca.idItem=ru.idItem AND pr.ocultar=0 ORDER BY pr.idCat,pr.ordenPro';
$resultado = $mysqli->query($cate);
while($row = $resultado->fetch_assoc()){
	
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$num, $row['idProducto'])
			->setCellValue("B".$num, $row['item'])
			->setCellValue("C".$num, $row['categoria'])
			->setCellValue("D".$num, $row['codigo'])
            ->setCellValue("E".$num, $row['producto'])
            ->setCellValue("F".$num, $row['descripcion'])
            ->setCellValue("G".$num, $row['precio'])
			->setCellValue("H".$num, $row['precioPromo']);
$num++;
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
getHeaders();

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
