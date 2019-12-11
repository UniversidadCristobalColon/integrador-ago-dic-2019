<?php
require_once '../../../vendor/PHPExcel-1.8/Classes/PHPExcel.php';


//require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';


$id_evaluado = $_GET['id_evaluado'];//78;
$id_periodo =  $_GET['id_periodo'];;
$id_evaluacion=$_GET['id_evaluacion'];
$id_escala = 1; //calcular el id de la escuela correcta

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
$documento = new PHPExcel ();

$sheet=$documento->createSheet();

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

while($row2 = mysqli_fetch_array($resultado2)) {
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
    $sheet = $documento->createSheet();
    $sheet->setTitle($row2['rol']);
    $sheet = $documento->getSheetByName($row2['rol']);

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

    $borderthin= array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $letrablanca = array(
        'font'  => array(
            'color' => array('rgb' => 'FFFFFF')
        ));

    $fondoazul=array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'color' => array('rgb' => '009be0')
            )
        );
    $fondoazul2=array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '022169')
        )
    );
    $sheet->getStyle("A1:B1")->applyFromArray($borderthin);
    $sheet->getStyle("C1:D1")->applyFromArray($borderthin);
    $sheet->getStyle("A13:H13")->applyFromArray($borderthin);
    $sheet->getStyle("F1:M1")->applyFromArray($borderthin);
    $sheet->getStyle("F2:M2")->applyFromArray($borderthin);
    $sheet->getStyle("F3:M6")->applyFromArray($borderthin);
    $sheet->getStyle("F4:M6")->applyFromArray($borderthin);
    $sheet->getStyle("F5:M6")->applyFromArray($borderthin);
    $sheet->getStyle("F6:M6")->applyFromArray($borderthin);

    $sheet->getStyle('A1')->applyFromArray($letrablanca);
    $sheet->getStyle('F1')->applyFromArray($letrablanca);
    $sheet->getStyle('J1')->applyFromArray($letrablanca);

    $sheet->getStyle('F3')->applyFromArray($letrablanca);
    $sheet->getStyle('J3')->applyFromArray($letrablanca);

    $sheet->getStyle('F5')->applyFromArray($letrablanca);
    $sheet->getStyle('J5')->applyFromArray($letrablanca);


    $sheet->getStyle('F1:M6')->getAlignment()->setHorizontal('center');

    $sheet->getStyle('F1')->getFill()
                            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setRGB('12, 14, 166');

    $sheet->getStyle('A1')->applyFromArray($fondoazul);
    $sheet->getStyle('C1')->applyFromArray($fondoazul2);
    $sheet->getStyle('C1')->applyFromArray($letrablanca);

    $sheet->getStyle('A13')->applyFromArray($fondoazul2);
    $sheet->getStyle('A13')->applyFromArray($letrablanca);
    $sheet->getStyle('A13')->getAlignment()->setHorizontal('center');

    $sheet->getStyle('F3')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('12, 14, 166');

    $sheet->getStyle('F5')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('12, 14, 166');

    $sheet->getStyle('J1')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('12, 14, 166');

    $sheet->getStyle('J3')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('12, 14, 166');

    $sheet->getStyle('J5')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('12, 14, 166');

    $sheet->setCellValue('F1', 'Nombre del evaluado');
    $sheet->setCellValue('F2', $nomeval.' '.$apellidoeval);
    $sheet->setCellValue('F3', 'Nombre de quien evalua');
    $sheet->setCellValue('F4', $row2['nombre']. ' ' .$row2['apellidos']);
    $sheet->setCellValue('F5', 'Fecha');
    $sheet->setCellValue('F6', $row2['creacion']);


    $sheet->getStyle('J1:M1')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('J1', 'Puesto del evaluado');
    $sheet->getStyle('J2:M2')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('J2', $puesto);

    $sheet->getStyle('J3:M3')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('J3', 'Puesto de quien evalúa');

    $sheet->getStyle('J4:M4')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('J4',$row2['puesto'].'/'.$row2['rol']);

    $sheet->getStyle('J5:M6')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('J5', $row2['rol']);


    $sheet->mergeCells('A1:B1');
    $sheet->mergeCells('C1:D1');
    $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');
    $sheet->setCellValue('A1', 'DECALOGO LIDERAZGO ICAVE');
    $sheet->setCellValue('C1', 'CALIFICACIÓN');

    $contescala=14;
    $contescalasupp=1;
    $sheet->mergeCells('A13:H13');
    $sheet->setCellValue('A13', 'Escala de clasificación');

    foreach($escala as $e){
        $sheet->setCellValue('A'.$contescala, $contescalasupp);
        //$sheet->mergeCells('B'.strval($contescala).':D'.strval($contescala));
        $sheet->setCellValue('B'.$contescala, $e['etiqueta']);
        $sheet->mergeCells('C'.strval($contescala).':H'.strval($contescala));
        $sheet->setCellValue('C'.$contescala, $e['descripcion']);

        $sheet->getStyle('A'.$contescala)->applyFromArray($fondoazul2);
        $sheet->getStyle('A'.$contescala)->applyFromArray($letrablanca);
        $sheet->getStyle('A'.$contescala)->applyFromArray($borderthin);
        $sheet->getStyle('B'.$contescala)->applyFromArray($borderthin);
        $sheet->getStyle('C'.$contescala)->applyFromArray($borderthin);

        $contescala++;
        $contescalasupp++;
    }

    $documento->getSheetByName($row2['rol'])->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $documento->getSheetByName($row2['rol'])->getColumnDimension('A')->setWidth(10);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getStyle('A1:D11')->getAlignment()->setHorizontal('center');

    while($row4 = mysqli_fetch_array($resultado3)){

        $coordinadaA=$coordinadaA . strval($cont);
        $coordinadaB=$coordinadaB . strval($cont);
        $coordinadaC=$coordinadaC . strval($cont);
        $coordinadaD=$coordinadaD . strval($cont);

        $sheet->getStyle($coordinadaA)->applyFromArray($fondoazul);
        $sheet->getStyle($coordinadaA)->applyFromArray($borderthin);
        $sheet->getStyle($coordinadaA)->applyFromArray($letrablanca);
        $sheet->getStyle($coordinadaB)->applyFromArray($borderthin);
        $sheet->getStyle($coordinadaC)->applyFromArray($borderthin);
        $sheet->getStyle($coordinadaD)->applyFromArray($borderthin);


        $sheet->setCellValue($coordinadaA, strval($cont-1));
        $sheet->setCellValue($coordinadaB, $row4['aseveracion']);
        $sheet->getStyle($coordinadaB)->getAlignment()->setHorizontal('left');
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

// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="file.xlsx"');
$objWriter = PHPExcel_IOFactory::createWriter($documento, 'Excel5');
// Write file to the browser
$objWriter->save('php://output');

?>