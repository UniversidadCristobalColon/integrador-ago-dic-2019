<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

$Evaluacion = $_GET["id_evaluacion"];
$Evaluado   = $_GET["id_enviar"];

$update = "UPDATE aplicaciones set email_enviado = 'S'  where id_evaluacion = '$Evaluacion' and id_evaluado = $Evaluado";
$resultado = mysqli_query($conexion, $update);
if ($resultado) {
    header("location: adminEvaluacion.php?id_evaluacion=$Evaluacion");
} else {
    echo 'No se guardo' . mysqli_error($conexion);
}

?>
