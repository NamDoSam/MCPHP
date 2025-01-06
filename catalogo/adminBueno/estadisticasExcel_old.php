<?php 
set_time_limit(0);
require_once('Excel/funcion_estadisticas.php');
activeErrorReporting();
noCli();
require_once ('Excel/Classes/PHPExcel.php');
require_once('../conexion/conexion.php');
$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

//exit();
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
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
//$objPHPExcel->getActiveSheet()->freezePaneByColumnAndRow("A4")

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Pedido N°')
            ->setCellValue('B1', 'Tipo Pedido')
            ->setCellValue('C1', 'Cliente')
            ->setCellValue('D1', 'Día')
			->setCellValue('E1', 'Mes')
			->setCellValue('F1', 'Año')
			->setCellValue('G1', 'Hora')
			->setCellValue('H1', 'Nom. Día')
            ->setCellValue('I1', 'Cdad.')
            ->setCellValue('J1', 'Rubro')
			->setCellValue('K1', 'Categoría')
			->setCellValue('L1', 'Producto')
            ->setCellValue('M1', 'Importe')
			->setCellValue('N1', 'Total')
			->setCellValue('O1', 'Tipo Pago')
			->setCellValue('P1', 'Estado')
			->setCellValue('Q1', 'Celular')
			->setCellValue('R1', 'Domicilio')
			->setCellValue('S1', 'Localidad')
			->setCellValue('T1', 'Provincia');
			

$num=2;
/*$cate='SELECT * FROM car_tabla_pedido tp,car_pedido cp,car_comprador co,car_direccion_envio de,productos pro,categorias cat,rubros rub
WHERE tp.cliente="'.$_GET['idCliente'].'" AND (tp.cliente=cp.idCliente && tp.token=cp.token) AND tp.idProducto=pro.idProducto AND pro.idCat=cat.idCat AND cat.idItem=rub.idItem AND cp.idComprador=co.idComprador AND cp.idDireccion=de.idDireccion
ORDER BY cp.idPedido';

$cate='SELECT * FROM car_pedido cp,car_tabla_pedido tp,car_comprador co,rubros ru,categorias cat WHERE cp.idCliente="'.$_GET['idCliente'].'" AND tp.token=cp.token AND cp.idComprador=co.idComprador AND tp.idCat=cat.idCat AND cat.idItem=ru.idItem ORDER BY cp.idPedido';*/
$cate='SELECT * FROM car_pedido cp,car_tabla_pedido tp,car_comprador co,rubros ru,categorias cat,productos pro WHERE cp.idCliente="'.$_GET['idCliente'].'" AND tp.idProducto=pro.idProducto AND tp.token=cp.token AND cp.idComprador=co.idComprador AND pro.idCat=cat.idCat AND cat.idItem=ru.idItem ORDER BY cp.idPedido';
//exit();
$resultado = $mysqli->query($cate);
while($row = $resultado->fetch_assoc()){

if($row['idDireccion']>0){
	$re = $mysqli->query("SELECT * FROM car_direccion_envio WHERE idDireccion=".$row['idDireccion']."");
	$dir = $re->fetch_assoc();
	$direccion=$dir['direccion'];
	$localidad=$dir['localidad'];
	$provincia=$dir['provincia'];
}

	$dia=date("d",strtotime($row['fechaPedido']));
	$mes=date("m",strtotime($row['fechaPedido']));
	$anio=date("Y",strtotime($row['fechaPedido']));
	$hora=date("H:i",strtotime($row['fechaPedido']));
$i = strtotime($row['fechaPedido']);
$sem=jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m",$i),date("d",$i), date("Y",$i)) , 0 );
$total = $row['cantidad']*$row['precio'];
$producto=$row['item']." - ".$row['categoria']." - ".$row['producto'];

	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$num, $row['idPedido'])
			->setCellValue("B".$num, $row['envio'])
            ->setCellValue("C".$num, $row['nombreComp'])
            ->setCellValue("D".$num, ltrim($dia, "0"))
            ->setCellValue("E".$num, ltrim($mes, "0"))
			->setCellValue("F".$num, $anio)
			->setCellValue("G".$num, $hora)
            ->setCellValue("H".$num, $dias[$sem])
            ->setCellValue("I".$num, $row['cantidad'])
            ->setCellValue("J".$num, $producto)
			->setCellValue("K".$num, $row['precio'])
			->setCellValue("L".$num, $total)
			->setCellValue("M".$num, $row['tipoPago'])
            ->setCellValue("N".$num, $row['estadoPedido'])
			->setCellValue("O".$num, $row['celComp'])
			->setCellValue("P".$num, $direccion)
			->setCellValue("Q".$num, $localidad)
			->setCellValue("R".$num, $provincia);
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
