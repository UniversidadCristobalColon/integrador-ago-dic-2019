<?php
require("../../../../config/db.php");
//ids
$idevaluacion = $_GET['idevaluacion'];
$idevaluado = $_GET['idevaluado'];
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
$pdf->stream("AAA.pdf");


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
