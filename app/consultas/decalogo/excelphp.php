<?php

require_once("../../../vendor/PHPExcel/PHPExcel.php");

PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

$excel = new PHPExcel();


$hoja = $excel->getActiveSheet();
$hoja->getColumnDimension('A')->setWidth(12);
$hoja->setCellValue("A1", "Alumno");
$objWriter = new PHPExcel_Writer_Excel5($excel);
$hoy = date("Ymd");
$archivo = "archivo_{$hoy}.xls";

$objWriter->save($archivo);
?>