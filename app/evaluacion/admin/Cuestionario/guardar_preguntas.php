<?php
include '../../../../config/db.php';
include '../../../../Cuestionario/editar.php';

$id = ($_POST['preguntas']);
if (empty($id)){

    header("location: editar.php");
}else{
    for($i = 0; $i < sizeof($id); $i ++){
        $sql = "UPDATE preguntas set id_cuestionario = 1 where id =  $id[$i]";
        $resultado = mysqli_query($conexion, $sql);

        if ($conexion->query($sql) === TRUE) {
            header("location: editar.php");
        } else {
            echo "Error updating record: " . $conexion->error;
        }

    }
}
?>
