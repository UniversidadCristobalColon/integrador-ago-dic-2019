<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/WriterPart.php';
include_once '../../../vendor/psr/simple-cache/src/CacheInterface.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Calculation.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Logical.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Category.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/Logger.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IComparable.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Worksheet.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Engine/CyclicReferenceStack.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/StringHelper.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Cells.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/CellsFactory.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Settings.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Collection/Memory.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/PageSetup.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/PageMargins.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/HeaderFooter.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/SheetView.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Protection.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Dimension.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/RowDimension.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/ColumnDimension.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/AutoFilter.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Document/Properties.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Document/Security.php';

include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Supervisor.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Font.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Style.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Color.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Fill.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Border.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Borders.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Alignment.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/NumberFormat.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Style/Protection.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/ReferenceHelper.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Worksheet/Iterator.php';

include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Coordinate.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/DataType.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/IValueBinder.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Cell.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/DefaultValueBinder.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/IWriter.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/BaseWriter.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/BIFFwriter.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Escher.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Font.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Parser.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Workbook.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Worksheet.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xls/Xf.php';


include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Chart.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Comments.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/ContentTypes.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/DocProps.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Drawing.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Rels.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/RelsRibbon.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/RelsVBA.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/StringTable.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Style.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Theme.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Workbook.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/Worksheet.php';

include_once'../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Chart.php';
include_once '../../../vendor/phpoffice/phpspreadsheet /src/PhpSpreadsheet/Chart/DataSeries.php';
include_once '../../../vendor/phpoffice/phpspreadsheet /src/PhpSpreadsheet/Chart/DataSeriesValues.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Layout.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Legend.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/PlotArea.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Title.php';

include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/HashTable.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/File.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Functions.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Functions.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/XMLWriter.php';

include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/Date.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/CodePage.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/Drawing.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/Font.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/Escher.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/OLE.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Xlsx/WriterPart.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Calculation/Token/Stack.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/RichText.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/ITextElement.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/TextElement.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/RichText/Run.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Properties.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Axis.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/GridLines.php';
include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/Layout.php';
//include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Chart/';



//include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/';
//include_once '../../../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Shared/';



//require __DIR__ . "../../../../vendor/autoload.php";

/*$preloads = array(
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/Chart.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/DataSeries.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/DataSeriesValues.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/Layout.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/Legend.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/PlotArea.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Chart/Title.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/IOFactory.php',
'../../../vendor/PhpOffice/PhpSpreadsheet/src/PhpSpreadsheet/Spreadsheet.php',
);*/
/*$preloads = array(
    'argo/Functions.php',
    'argo/Object.php',
    'argo/Controller.php',
    'argo/Widget.php',
    'argo/WidgetTracker.php',
    'view/ContactForm.php',
    'view/CookieBanner.php',
    'view/FollowButtons.php',
    'view/RecentPosts.php',
    'view/ShareButtons.php',
    'view/LegalNotice.php',
    'controller/CookieController.php',
);
*/
/*foreach($preloads as $file) {
    include_once(__DIR__ . '/' . $file);
}*/


$id_evaluado = $_GET['id_evaluado'];//78;
$id_periodo =  $_GET['id_periodo'];;
$id_evaluacion=$_GET['id_evaluacion'];
$id_escala = 1; //calcular el id de la escuela correcta



use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;



$sql = "select * from escalas where id= $id_escala";
$resesacalas = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$escala[5] = array();
while($row = mysqli_fetch_array($resesacalas)){
    $escala[0]['etiqueta']=$row['nivel1_etiqueta'];
    $escala[0]['inferior']=$row['nivel1_inferior'];
    $escala[0]['superior']=$row['nivel1_superior'];
    $escala[0]['descripcion']=$row['nivel1_descripcion'];

    $escala[1]['etiqueta']=$row['nivel2_etiqueta'];
    $escala[1]['inferior']=$row['nivel2_inferior'];
    $escala[1]['superior']=$row['nivel2_superior'];
    $escala[1]['descripcion']=$row['nivel2_descripcion'];

    $escala[2]['etiqueta']=$row['nivel3_etiqueta'];
    $escala[2]['inferior']=$row['nivel3_inferior'];
    $escala[2]['superior']=$row['nivel3_superior'];
    $escala[2]['descripcion']=$row['nivel3_descripcion'];

    $escala[3]['etiqueta']=$row['nivel3_etiqueta'];
    $escala[3]['inferior']=$row['nivel3_inferior'];
    $escala[3]['superior']=$row['nivel3_superior'];
    $escala[3]['descripcion']=$row['nivel3_descripcion'];

    $escala[4]['etiqueta']=$row['nivel4_etiqueta'];
    $escala[4]['inferior']=$row['nivel4_inferior'];
    $escala[4]['superior']=$row['nivel4_superior'];
    $escala[4]['descripcion']=$row['nivel4_descripcion'];

    $escala[5]['etiqueta']=$row['nivel5_etiqueta'];
    $escala[5]['inferior']=$row['nivel5_inferior'];
    $escala[5]['superior']=$row['nivel5_superior'];
    $escala[5]['descripcion']=$row['nivel5_descripcion'];
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

$coordinadaA='A';
$coordinadaB='B';
$coordinadaC='C';
$coordinadaD='D';
$coordinadaE='E';
$coordinadaF='F';
$coordinadaG='G';
$contusuarios=0;
$sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol, pe.id_evaluacion, pe.id_rol_evaluador,pe.creacion,pu.puesto 
            from promedios_por_evaluado pe join empleados e
            on e.id = pe.id_evaluador
            join roles r on r.id = pe.id_rol_evaluador 
            join puestos pu on pu.id = e.id_puesto
            where id_evaluado=$id_evaluado and id_evaluacion = $id_evaluacion
            order by id_evaluacion desc, pe.id_rol_evaluador asc";

$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$sql = "select e.nombre,e.apellidos,p.puesto from promedios_por_evaluado pe join empleados e
on e.id = '$id_evaluado'
join puestos p 
on p.id=e.id_puesto
";
$evaluado= mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
$nomeval ='';
$apellidoeval='';
$puesto='';
while($row2 = mysqli_fetch_array($evaluado)) {
    $nomeval = $row2['nombre'];
    $apellidoeval=$row2['apellidos'];
    $puesto = $row2['puesto'];
}
$cont=2;

while($row2 = mysqli_fetch_array($resultado2)){
    $sql = "select da.aseveracion,pe.puntos 
            from promedios_por_evaluado pe join preguntas p 
            on p.id = pe.id_pregunta
            join decalogos_aseveraciones da 
            on da.id = p.id_decalogo_aseveracion
            where pe.id_evaluador = $row2[id_evaluador] 
            and pe.id_evaluado = '$id_evaluado' 
            and pe.id_evaluacion = $id_evaluacion                                   
            ";
    $resultado3 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
    $sheet=$documento->createSheet();
    $sheet->setTitle($row2['rol']);
    $sheet = $documento->getSheetByName($row2['rol']);

    $styleArray = array(
        'borders' => array(
            'outline' => array(
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_HAIR,
                'color' => array('argb' => '0000'),
            ),
        ),
    );

    #$sheet = $documento->getActiveSheet();
    $sheet->mergeCells('F1:I1');
    $sheet->mergeCells('F2:I2');
    $sheet->mergeCells('F3:I3');
    $sheet->mergeCells('F4:I4');
    $sheet->mergeCells('F5:I5');
    $sheet->mergeCells('F6:I6');
    $sheet->mergeCells('J1:M1');
    $sheet->mergeCells('J2:M2');
    $sheet->mergeCells('J3:M3');
    $sheet->mergeCells('J4:M4');
    $sheet->mergeCells('J5:M6');

    $sheet->getStyle('F1:M10')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('F1:I1')->applyFromArray($styleArray);
    $sheet->getStyle('F1:I1') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('F1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('F1', 'Nombre del evaluado');

    $sheet ->getStyle('F2:I2')->applyFromArray($styleArray);
    $sheet->setCellValue('F2', $nomeval.' '.$apellidoeval);

    $sheet ->getStyle('F3:I3')->applyFromArray($styleArray);
    $sheet->getStyle('F3:I3') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('F3:I3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('F3', 'Nombre de quien evalua');

    $sheet ->getStyle('F4:I4')->applyFromArray($styleArray);
    $sheet->setCellValue('F4', $row2['nombre']. '' .$row2['apellidos']);


    $sheet->getStyle('F5:I5') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('F5:I5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet ->getStyle('F5:I5')->applyFromArray($styleArray);
    $sheet->setCellValue('F5', 'Fecha');

    $sheet ->getStyle('F6:I6')->applyFromArray($styleArray);
    $sheet->setCellValue('F6', $row2['creacion']);


    $sheet->getStyle('J1:M1')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('J1:M1')->applyFromArray($styleArray);
    $sheet->getStyle('J1:M1') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('J1:M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('J1', 'Puesto del evaluado');

    $sheet->getStyle('J2:M2')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('J2:M2')->applyFromArray($styleArray);
    $sheet->setCellValue('J2', $puesto);

    $sheet->getStyle('J3:M3')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('J3:M3')->applyFromArray($styleArray);
    $sheet->getStyle('J3:M3') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('J3:M3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('J3', 'Puesto de quien evalúa');

    $sheet->getStyle('J4:M4')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('J4:M4')->applyFromArray($styleArray);
    $sheet->setCellValue('J4',$row2['puesto'].'/'.$row2['rol']);

    $sheet->getStyle('J5:M6')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('J5:M6')->applyFromArray($styleArray);
    $sheet->getStyle('J5:M6') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('J5:M6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('J5', $row2['rol']);


    $sheet->mergeCells('A1:B1');
    $sheet->mergeCells('C1:D1');
    $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('A1', 'DECALOGO LIDERAZGO ICAVE');
    $sheet->setCellValue('C1', 'CALIFICACIÓN');
    $sheet->getStyle('C1:D1') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('C1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');

    $contescala=14;
    $contescalasupp=1;
    $sheet->mergeCells('A13:H13');
    $sheet ->getStyle('A13:H13')->applyFromArray($styleArray);
    $sheet->getStyle('A13:H13') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('A13:H13')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0218a2');
    $sheet->setCellValue('A13', 'Escala de clasificación');
    foreach($escala as $e){

            $sheet ->getStyle('A'.$contescala)->applyFromArray($styleArray);
            $sheet ->getStyle('B'.$contescala)->applyFromArray($styleArray);
            $sheet ->getStyle('C'.strval($contescala).':H'.strval($contescala))->applyFromArray($styleArray);

            $sheet->setCellValue('A'.$contescala, $contescalasupp);
            //$sheet->mergeCells('B'.strval($contescala).':D'.strval($contescala));
            $sheet->setCellValue('B'.$contescala, $e['etiqueta']);
            $sheet->mergeCells('C'.strval($contescala).':H'.strval($contescala));
            $sheet->setCellValue('C'.$contescala, $e['descripcion']);

            $contescala++;
            $contescalasupp++;
    }


    $documento->getSheetByName($row2['rol'])->getColumnDimension('A')->setWidth(10);
    $sheet->getStyle('A1') ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    $sheet->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('009be0');
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('D')->setAutoSize(true);

    $sheet->getStyle('A1:D11')->getAlignment()->setHorizontal('center');
    $sheet ->getStyle('C1:D1')->applyFromArray($styleArray);

    while($row4 = mysqli_fetch_array($resultado3)){

        $coordinadaA=$coordinadaA . strval($cont);
        $coordinadaB=$coordinadaB . strval($cont);
        $coordinadaC=$coordinadaC . strval($cont);
        $coordinadaD=$coordinadaD . strval($cont);

        $sheet->setCellValue($coordinadaA, strval($cont-1));
        $sheet->getStyle($coordinadaA) ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $sheet->getStyle($coordinadaA)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('009be0');
        $sheet->setCellValue($coordinadaB, $row4['aseveracion']);
        $sheet->getStyle($coordinadaB)->getAlignment()->setHorizontal('left');
        $sheet->setCellValue($coordinadaC, $row4['puntos']);
        $sheet ->getStyle($coordinadaA)->applyFromArray($styleArray);
        $sheet ->getStyle($coordinadaB)->applyFromArray($styleArray);
        $sheet ->getStyle($coordinadaC)->applyFromArray($styleArray);

        foreach($escala as $e){
            if($row4['puntos'] >= $e['inferior'] && $row4['puntos'] <= $e['superior']){
                $sheet->setCellValue($coordinadaD, $e['etiqueta']);
                $sheet ->getStyle($coordinadaD)->applyFromArray($styleArray);
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
where id_evaluado='$id_evaluado' and id_evaluacion ='$id_evaluacion'";

$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));


while($row2 = mysqli_fetch_array($resultado2)){
    $sql = "select da.aseveracion,pe.puntos,pe.id from promedios_por_evaluado pe join preguntas p 
                                        on p.id = pe.id_pregunta
                                        join decalogos_aseveraciones da 
                                        on da.id = p.id_decalogo_aseveracion
                                        where pe.id_evaluador = $row2[id_evaluador] 
                                        and pe.id_evaluado ='$id_evaluado' 
                                        and pe.id_periodo ='$id_periodo'
                                        and pe.id_evaluacion = $id_evaluacion
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


$nombreDelDocumento = "ReporteDeCompetencias.xlx";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');


// Redirect output to a client’s web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ReportedeCompetencias.xls"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0

$writer = IOFactory::createWriter($documento, 'Xls');
$writer->setIncludeCharts(true);

$writer->save('php://output');
exit;


?>
