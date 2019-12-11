<?php
include '../../../../config/db.php';
$id = ($_GET['id']);


    $sql = "UPDATE preguntas set id_cuestionario = null where id =  $id[$i]";
    $resultado = mysqli_query($conexion, $sql);

    if ($conexion->query($sql) === TRUE) {
        header("location: editar.php");
    } else {
        echo "Error updating record: " . $conexion->error;
    }



?>
