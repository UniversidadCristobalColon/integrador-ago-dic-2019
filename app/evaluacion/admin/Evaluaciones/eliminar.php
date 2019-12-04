<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

$Evaluacion = /*$_POST["Departamento"]*/ 1;
$Evaluado = /*convertirFecha($_POST["Inicio"]*)*/ 2;
$Depa = /*$_GET['id_departamento']*/ 3;
$Nombre = /*$_GET['id_nombre']*/ "Pruebas";

$delete = "delete from aplicaciones where id_evaluado=$Evaluado and id_evaluacion=$Evaluacion and estado='A'";

$resultado = mysqli_query($conexion, $delete);
if ($resultado) {
    $id_evaluacion = mysqli_insert_id($conexion);
    header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Nombre&id_evaluacion=$id_evaluacion");

} else {
    echo 'No se guardo' . mysqli_error($conexion);
}

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
