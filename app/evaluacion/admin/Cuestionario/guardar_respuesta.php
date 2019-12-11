<?php
include '../../../../config/db.php';
$respuestas = $_POST['respuestas'];
$competencia = $_POST['competencia'];
$idpregunta = $_POST['idPregunta'];
$idCuestionario = $_POST['idCuestionario'];
if (!empty($respuestas)){

        foreach ($respuestas as $id_respuesta){
            $orden = $_POST["orden_$id_respuesta"];
            $puntos = $_POST["puntaje_$id_respuesta"];
            if(!empty($orden) && is_numeric($puntos)){
                $sqlI = "insert into preguntas_respuestas (id_pregunta, id_respuesta, puntos, orden_respuesta)
                        values('$idpregunta','$id_respuesta','$puntos','$orden')";
                $resultado = mysqli_query($conexion, $sqlI);
            }

    }
    if (1==1) {
        $sql = "UPDATE preguntas set id_competencia = '$competencia' where id =  $idpregunta";
        $resultado = mysqli_query($conexion, $sql);

        if ($conexion->query($sql) === TRUE) {
            header("location: editar.php?=id_cuestionario=$idCuestionario");
        } else {
            header("location: editar.php?=id_cuestionario=$idCuestionario");
        }


    } else {
        echo "Error updating record: " . $conexion->error;
    }
}else{
    $sql = "UPDATE preguntas set id_competencia = '$competencia' where id =  $idpregunta";
    $resultado = mysqli_query($conexion, $sql);

    if ($conexion->query($sql) === TRUE) {
        header("location: editar.php?=id_cuestionario=$idCuestionario");
    } else {
        header("location: editar.php?=id_cuestionario=$idCuestionario");
    }
}



?>