<?php
include '../../../../config/db.php';
$id = ($_POST['id']);
$nombre = ($_POST['Cuestionario']);


$sql = "UPDATE cuestionarios set cuestionario = '$nombre' where id =  $id";


if ($conexion->query($sql) === TRUE) {
    header("location: editar.php");
} else {
    echo "Error updating record: " . $conexion->error;
}





?>