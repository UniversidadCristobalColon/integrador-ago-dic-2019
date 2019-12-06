<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

$Evaluacion = $_GET["id_evaluacion"];
$Evaluado = $_GET["id_eliminar"];
$Depa = $_GET["id_departamento"];
$Nombre = $_GET["id_nombre"];

$delete = "delete from aplicaciones where id_evaluado=$Evaluado and id_evaluacion=$Evaluacion and estado='A'";

$resultado = mysqli_query($conexion, $delete);
if ($resultado) {
    $id_evaluacion = mysqli_insert_id($conexion);
    header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Nombre&id_evaluacion=$Evaluacion");

} else {
    echo 'No se guardo' . mysqli_error($conexion);
}

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
