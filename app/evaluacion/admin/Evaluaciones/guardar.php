<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Depa = $_POST["Departamento"];
    $Inicio = convertirFecha($_POST["Inicio"]);
    $Fin = convertirFecha($_POST["Fin"]);
    $Cuestionario = $_POST["Cuestionario"];
    $Descripcion = $_POST["Descripcion"];
    $Periodo = $_POST["Periodo"];
    $ip =  $_SERVER['REMOTE_ADDR'];

    function convertirFecha($fecha){
        $outs = explode('/',$fecha);
        return "$outs[2]-$outs[0]-$outs[1]";
    }

    $insert = "insert into evaluaciones(
                        id_cuestionario,
                        id_nivel_puesto_evaluador,
                        id_periodo,
                        inicio,
                        fin,
                        limite,
                        descripcion,
                        creacion,
                        creacion_ip) values (
                        '$Cuestionario',
                        '$Depa',
                        '$Periodo',
                        '$Inicio',
                        '$Fin',
                        NULL,
                        '$Descripcion',
                        NOW(),
                        '$ip'
                        )";

    $resultado = mysqli_query($conexion, $insert);
    if ($resultado) {
        /*$id_aspirante = mysqli_insert_id($conexion);
        foreach ($carrera as $id_carrera) {
            $insert = "insert into intereces (id_aspirante, id_carrera) values ($id_aspirante, $id_carrera)";
            $resultado = mysqli_query($conexion, $insert);
        }*/
        header('location: adminEvaluacion.php?id_departamento='.$Depa.'&id_nombre='.$Descripcion);

    } else {
        echo 'No se guardo' . mysqli_error($conexion);
    }

    define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
?>
