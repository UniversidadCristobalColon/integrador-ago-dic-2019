<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

$id = $_GET["id"];
$select=mysqli_query($conexion,"SELECT * FROM cuestionarios WHERE id='$id'");
$row = mysqli_fetch_array($select);
$ip =  $_SERVER['REMOTE_ADDR'];
echo $estado=$row['estado'];

if($estado == "A"){
    $sqlCambiar = "UPDATE cuestionarios SET estado = 'B', actualizacion = NOW(), actualizacion_ip = '$ip' WHERE id = '$id' ";
}else{
    $sqlCambiar = "UPDATE cuestionarios SET estado = 'A', actualizacion = NOW(), actualizacion_ip = '$ip'   WHERE id = '$id' ";
}
if ($conexion->query($sqlCambiar) === TRUE) {
    header('location: index.php');
    ob_flush();
}else {
    echo "Error updating record: " . $conexion->error;
}

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
