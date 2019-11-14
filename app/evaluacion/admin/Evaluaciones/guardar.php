<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Evaluar = $_POST["Evaluar"];
    $Evaluan = $_POST["Evaluan"];
    $Cuestionario = $_POST["Cuestionario"];
    $ip =  $_SERVER['REMOTE_ADDR'];

    $insert = "insert into evaluaciones(
                        id:cuestionario,
                        id_nivel_puesto_evaluador,
                        creacion,
                        creacion_ip) values (
                        '$Cuestionario',
                        '$Evaluar',
                        NOW(),
                        '$ip',
                        )";

    $resultado = mysqli_query($conexion, $insert);
    if ($resultado) {
        /*$id_aspirante = mysqli_insert_id($conexion);
        foreach ($carrera as $id_carrera) {
            $insert = "insert into intereces (id_aspirante, id_carrera) values ($id_aspirante, $id_carrera)";
            $resultado = mysqli_query($conexion, $insert);
        }*/

        header('location: adminEvaluacion.php');

    } else {
        echo 'No se guardo' . mysqli_error($conexion);
    }

    define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
