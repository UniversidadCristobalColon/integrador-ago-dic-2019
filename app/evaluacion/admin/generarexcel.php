<?php

require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';

require __DIR__ . "../../../../vendor/autoload.php";
$id_eval='1';
$id_periodo='1';
$sql = "select * from promedios_por_pregunta where id_evaluado='$id_eval' and id_periodo ='$id_periodo'";
$resultado = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
global $suma;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Marlon') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');

$documento->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$sheet = $documento->getActiveSheet();

$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Pregunta');
$sheet->setCellValue('C1', 'Calificación');

$coordinadaA='A';
$coordinadaB='B';
$coordinadaC='C';

while($row = mysqli_fetch_array($resultado)){
    $sql ="select * from preguntas where id='$row[id_preguntas]'";
    $resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
    while($row2 = mysqli_fetch_array($resultado2)){
        $coordinadaA=$coordinadaA . strval((int)$row["id"]+1);
        $coordinadaB=$coordinadaB . strval((int)$row["id"]+1);
        $coordinadaC=$coordinadaC . strval((int)$row["id"]+1);

        $sheet->setCellValue($coordinadaA, $row["id"]);
        $sheet->setCellValue($coordinadaB, $row2["pregunta"]);
        $sheet->setCellValue($coordinadaC, $row["puntos"]);

        $coordinadaA='A';
        $coordinadaB='B';
        $coordinadaC='C';
    };
}

#$sheet->setCellValue('C7', '=SUM(C1:C6)');

$nombreDelDocumento = "Mi primer archivo.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');


// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ExcelPrueba.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;


?>