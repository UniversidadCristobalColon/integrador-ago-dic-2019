<?php
include '../../../../config/db.php';
$id = ($_POST['id']);
$nombre = ($_POST['Cuestionario']);
$idCuestionario = $_POST['idCuestionario'];


$sql = "UPDATE cuestionarios set cuestionario = '$nombre' where id =  $id";


if ($conexion->query($sql) === TRUE) {
    header("location: editar.php?=id_cuestionario=$idCuestionario");
} else {
    echo "Error updating record: " . $conexion->error;
}





?>