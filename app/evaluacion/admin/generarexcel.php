<?php

require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';

require __DIR__ . "../../../../vendor/autoload.php";

$id_evaluado=(int)$_POST['id_evaluado'];
$id_periodo=(int)$_POST['id_periodo'];


use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$sql = "select * from escalas where id='1' ";
$resesacalas = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$escala[5] = array();
while($row = mysqli_fetch_array($resesacalas)){
    $escala[0]['etiqueta']=$row['nivel1_etiqueta'];
    $escala[0]['inferior']=$row['nivel1_inferior'];
    $escala[0]['superior']=$row['nivel1_superior'];

    $escala[1]['etiqueta']=$row['nivel2_etiqueta'];
    $escala[1]['inferior']=$row['nivel2_inferior'];
    $escala[1]['superior']=$row['nivel2_superior'];

    $escala[2]['etiqueta']=$row['nivel3_etiqueta'];
    $escala[2]['inferior']=$row['nivel3_inferior'];
    $escala[2]['superior']=$row['nivel3_superior'];

    $escala[3]['etiqueta']=$row['nivel3_etiqueta'];
    $escala[3]['inferior']=$row['nivel3_inferior'];
    $escala[3]['superior']=$row['nivel3_superior'];

    $escala[4]['etiqueta']=$row['nivel4_etiqueta'];
    $escala[4]['inferior']=$row['nivel4_inferior'];
    $escala[4]['superior']=$row['nivel4_superior'];

    $escala[5]['etiqueta']=$row['nivel5_etiqueta'];
    $escala[5]['inferior']=$row['nivel5_inferior'];
    $escala[5]['superior']=$row['nivel5_superior'];
}

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

#$sheet = $documento->getActiveSheet();

/*$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Pregunta');
$sheet->setCellValue('C1', 'Calificación');*/

$coordinadaA='A';
$coordinadaB='B';
$coordinadaC='C';
$coordinadaD='D';
$coordinadaE='E';
$coordinadaF='F';
$coordinadaG='G';
$contusuarios=0;
$sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol from promedios_por_evaluado pe join empleados e
on e.id = pe.id_evaluador
join roles r on pe.id_rol_evaluador = r.id
where id_evaluado='$id_evaluado' and id_periodo ='$id_periodo'";

$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
$cont=2;


while($row2 = mysqli_fetch_array($resultado2)){
    $sql = "select da.aseveracion,pe.puntos,pe.id from promedios_por_evaluado pe join preguntas p 
                                        on p.id = pe.id_pregunta
                                        join decalogos_aseveraciones da 
                                        on da.id = p.id_decalogo_aseveracion
                                        where pe.id_evaluador = $row2[id_evaluador]
                                        ";
    $resultado3 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    $sheet=$documento->createSheet();
    $sheet->setTitle($row2['rol']);
    $sheet = $documento->getSheetByName($row2['rol']);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('A')->setWidth(5);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('B')->setWidth(50);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('C')->setWidth(5);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('D')->setWidth(30);

    #$sheet = $documento->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Pregunta');
    $sheet->setCellValue('C1', 'Calificación');

    while($row4 = mysqli_fetch_array($resultado3)){

        $coordinadaA=$coordinadaA . strval($cont);
        $coordinadaB=$coordinadaB . strval($cont);
        $coordinadaC=$coordinadaC . strval($cont);
        $coordinadaD=$coordinadaD . strval($cont);

        $sheet->setCellValue($coordinadaA, strval($cont));
        $sheet->setCellValue($coordinadaB, $row4['aseveracion']);
        $sheet->setCellValue($coordinadaC, $row4['puntos']);
        foreach($escala as $e){
            if($row4['puntos'] >= $e['inferior'] && $row4['puntos'] <= $e['superior']){
                $sheet->setCellValue($coordinadaD, $e['etiqueta']);
                break;
            }
        }
        $coordinadaA='A';
        $coordinadaB='B';
        $coordinadaC='C';
        $coordinadaD='D';
        $cont++;
    }
    $cont=2;
}

//TABULADOR
$dataSeriesLabels=[];
$dataSeriesValues =[];

$sheet=$documento->createSheet();
$sheet->setTitle('Tabulador');
$sheet = $documento->getSheetByName('Tabulador');
$documento->getSheetByName('Tabulador')->getColumnDimension('A')->setWidth(5);
$documento->getSheetByName('Tabulador')->getColumnDimension('B')->setWidth(50);
$documento->getSheetByName('Tabulador')->getColumnDimension('C')->setWidth(5);
$documento->getSheetByName('Tabulador')->getColumnDimension('D')->setWidth(30);


$sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol from promedios_por_evaluado pe join empleados e
on e.id = pe.id_evaluador
join roles r on pe.id_rol_evaluador = r.id
where id_evaluado='$id_evaluado' and id_periodo ='$id_periodo'";

$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));


while($row2 = mysqli_fetch_array($resultado2)){
    $sql = "select da.aseveracion,pe.puntos,pe.id from promedios_por_evaluado pe join preguntas p 
                                        on p.id = pe.id_pregunta
                                        join decalogos_aseveraciones da 
                                        on da.id = p.id_decalogo_aseveracion
                                        where pe.id_evaluador = $row2[id_evaluador] and pe.id_evaluado ='$id_evaluado' and pe.id_periodo ='$id_periodo';
                                        ";
    $resultado3 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

    $documento->getSheetByName('Tabulador')->getColumnDimension('A')->setWidth(5);
    $documento->getSheetByName('Tabulador')->getColumnDimension('B')->setWidth(50);
    $documento->getSheetByName('Tabulador')->getColumnDimension('C')->setWidth(20);
    $documento->getSheetByName('Tabulador')->getColumnDimension('D')->setWidth(20);
    $documento->getSheetByName('Tabulador')->getColumnDimension('E')->setWidth(20);
    $documento->getSheetByName('Tabulador')->getColumnDimension('F')->setWidth(20);
    $documento->getSheetByName('Tabulador')->getColumnDimension('G')->setWidth(20);

    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Pregunta');

    $coordinadaBusqueda='';
    $coordinadaBusqueda2='';


    if($contusuarios=='0'){
        $sheet->setCellValue('C1', $row2['rol']);
        $new = array_push($dataSeriesLabels,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$C$1', null, 1)); // 2011)
        $new = array_push($dataSeriesValues,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Tabulador!$C$2:$C$11', null, 12));
        $coordinadaBusqueda='C';
        $coordinadaBusqueda2='C';
    }elseif ($contusuarios=='1'){
        $sheet->setCellValue('D1', $row2['rol']);
        $new = array_push($dataSeriesLabels,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$D$1', null, 1)); // 2011)
        $new = array_push($dataSeriesValues,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Tabulador!$D$2:$D$11', null, 12));
        $coordinadaBusqueda='D';
        $coordinadaBusqueda2='D';
    }elseif ($contusuarios=='2'){
        $sheet->setCellValue('E1', $row2['rol']);
        $new = array_push($dataSeriesLabels,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$E$1', null, 1)); // 2011)
        $new = array_push($dataSeriesValues,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Tabulador!$E$2:$E$11', null, 12));
        $coordinadaBusqueda='E';
        $coordinadaBusqueda2='E';
    }elseif ($contusuarios=='3'){
        $sheet->setCellValue('F1', $row2['rol']);
        $new = array_push($dataSeriesLabels,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$F$1', null, 1)); // 2011)
        $new = array_push($dataSeriesValues,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Tabulador!$F$2:$F$11', null, 12));
        $coordinadaBusqueda='F';
        $coordinadaBusqueda2='F';
    }elseif ($contusuarios=='4'){
        $sheet->setCellValue('G1', $row2['rol']);
        $new = array_push($dataSeriesLabels,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$G$1', null, 1)); // 2011)
        $new = array_push($dataSeriesValues,new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Tabulador!$G$2:$G$11', null, 12));
        $coordinadaBusqueda='G';
        $coordinadaBusqueda2='G';
    }
    $contusuarios++;
    $promedio=0;
    while($row4 = mysqli_fetch_array($resultado3)){
        $coordinadaA=$coordinadaA . strval($cont);
        $coordinadaB=$coordinadaB . strval($cont);
        $coordinadaBusqueda=$coordinadaBusqueda . strval($cont);

        $sheet->setCellValue($coordinadaA, strval($cont-1));
        $sheet->setCellValue($coordinadaB, $row4['aseveracion']);
        $sheet->setCellValue($coordinadaBusqueda, $row4['puntos']);
        $sheet->setCellValue('h1', $contusuarios);


        $coordinadaA='A';
        $coordinadaB='B';
        $coordinadaC='C';
        $coordinadaC='D';
        $coordinadaC='E';
        $coordinadaC='F';
        $coordinadaC='G';
        $coordinadaBusqueda=$coordinadaBusqueda2;
        $cont++;
        $promedio += (int)$row4['puntos'];
    }
    $promedio=$promedio /($cont -2);
    $sheet->setCellValue($coordinadaB. strval($cont), 'Promedio');
    $sheet->setCellValue($coordinadaBusqueda.strval($cont), $promedio);
    $cont=2;
}

#require __DIR__ . '/../Header.php';

$worksheet = $documento->getSheetByName('Tabulador');

$xAxisTickValues = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Tabulador!$B$2:$B$11', null, 12), // Jan to Dec
];

// Build the dataseries
$series = new DataSeries(
    DataSeries::TYPE_RADARCHART, // plotType
    null, // plotGrouping (Radar charts don't have any grouping)
    range(0, count($dataSeriesValues) - 1), // plotOrder
    $dataSeriesLabels, // plotLabel
    $xAxisTickValues, // plotCategory
    $dataSeriesValues, // plotValues
    null, // plotDirection
    null, // smooth line
    DataSeries::STYLE_MARKER  // plotStyle
);
// Set up a layout object for the Pie chart
$layout = new Layout();
// Set the series in the plot area
$plotArea = new PlotArea($layout, [$series]);
// Set the chart legend
$legend = new Legend(Legend::POSITION_RIGHT, null, false);
$title = new Title('Test Radar Chart');
// Create the chart
$chart = new Chart(
    'chart1', // name
    $title, // title
    $legend, // legend
    $plotArea, // plotArea
    true, // plotVisibleOnly
    0, // displayBlanksAs
    null, // xAxisLabel
    null   // yAxisLabel - Radar charts don't have a Y-Axis
);
// Set the position where the chart should appear in the worksheet
$chart->setTopLeftPosition('A14');
$chart->setBottomRightPosition('F35');

$worksheet->addChart($chart);
$documento->removeSheetByIndex(0);

$nombreDelDocumento = "ReporteDeCompetencias.xlsx";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');


// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReportedeCompetencias.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->setIncludeCharts(true);
$writer->save('php://output');
exit;


?>