<?php
include '../../../../config/db.php';
$id = ($_GET['id']);
$idCuestionario = $_POST['idCuestionario'];


$sql = "UPDATE preguntas set id_cuestionario = null where id =  $id";
$resultado = mysqli_query($conexion, $sql);
$sql2 = "delete from preguntas_respuestas where id_pregunta = $id";
$resultado2 = mysqli_query($conexion, $sql2);

if ($conexion->query($sql) === TRUE) {
    header("location: editar.php");
} else {
    echo "Error updating record: " . $conexion->error;
}


if ($conexion->query($sql2) === TRUE) {
    header("location: editar.php");
} else {
    echo "Error updating record: " . $conexion->error;
}


?>