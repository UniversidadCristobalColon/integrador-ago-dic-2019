<?php
include '../../../../config/db.php';
$id = ($_POST['preguntas']);
$idCuestionario = $_POST['idCuestionario'];
if (empty($id)){


    header("location: editar.php");
}else{
    for($i = 0; $i < sizeof($id); $i ++){
        $sql = "UPDATE preguntas set id_cuestionario = $idCuestionario where id =  $id[$i]";
        $resultado = mysqli_query($conexion, $sql);

        if ($conexion->query($sql) === TRUE) {
            header("location: editar.php?=id_cuestionario=$idCuestionario");
        } else {
            echo "Error updating record: " . $conexion->error;
        }

    }
}
?>