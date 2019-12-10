<?php
require("../../../../config/db.php");
//ids
$idevaluacion = $_GET['idevaluacion'];
$idevaluado = $_GET['idevaluado'];
$sql="Select Tper.periodo,Temp.nombre,Temp.apellidos from promedios_por_evaluado ppe
    left join periodos Tper on 
    Tper.id=ppe.id_periodo
    left join empleados Temp on
    Temp.id=ppe.id_evaluado
    where ppe.id_evaluacion=$idevaluacion and ppe.id_evaluado=$idevaluado
    group by Tper.periodo,Temp.nombre,Temp.apellidos;";
$res = $conexion->query($sql);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$nombre=utf8_encode($row['nombre']);
$periodo=$row['periodo'];
$apellidos=utf8_encode($row['apellidos']);
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../../../../vendor/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// Introducimos HTML de prueba :0

$html = file_get_contents_curl("http://localhost/Integrador2/integrador-ago-dic-2019/app/admin/catalogos/decalogos/reporte.php?idevaluacion=$idevaluacion&idevaluado=$idevaluado");


// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF('c', 'A4');

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper(array(0,0,104,250));

// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));

// Renderizamos el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream(utf8_decode($nombre)."_".utf8_decode($apellidos)."_".$periodo.".pdf");


function file_get_contents_curl($url)
{
    $crl = curl_init();
    $timeout = 5;
    curl_setopt($crl, CURLOPT_URL, $url);
    curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
    $ret = curl_exec($crl);
    curl_close($crl);
    return $ret;
}
