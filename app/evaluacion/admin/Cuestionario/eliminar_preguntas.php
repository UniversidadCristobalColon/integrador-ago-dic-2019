<?php
include '../../../../config/db.php';
$id = ($_GET['id']);
$idCuestionario = $_GET['idcues'];


$sql = "UPDATE preguntas set id_cuestionario = null where id =  $id";
$resultado = mysqli_query($conexion, $sql);
$sql2 = "delete from preguntas_respuestas where id_pregunta = $id";
$resultado2 = mysqli_query($conexion, $sql2);

if ($conexion->query($sql) === TRUE) {
    header("location: editar.php?=id=$idCuestionario");
} else {
    header("location: editar.php?=id=$idCuestionario");
}


if ($conexion->query($sql2) === TRUE) {
    header("location: editar.php?=id=$idCuestionario");
} else {
    header("location: editar.php?=id=$idCuestionario");
}


?>