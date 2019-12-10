<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Depa = $_POST["Departamento"];
    $Inicio = convertirFecha($_POST["Inicio"]);
    $Fin = convertirFecha($_POST["Fin"]);
    $Limite = convertirFecha($_POST["Limite"]);
    $Cuestionario = $_POST["Cuestionario"];
    $Descripcion = $_POST["Descripcion"];
    $Periodo = $_POST["Periodo"];
    $ip =  $_SERVER['REMOTE_ADDR'];
    $Actualizar = $_POST["actualizar"];
    $Evalucion = $_POST["id_evaluacion"];
    $Iniciadas = 0;

    function convertirFecha($fecha){
        $outs = explode('/',$fecha);
        return "$outs[2]-$outs[0]-$outs[1]";
    }

    if($Actualizar==1) {
        $total = 0;
        $Iniciadas = 0;
        $Correctas = 0;

        $sqlc = "select estado from aplicaciones where id_evaluacion = $Evaluacion";
        $resc = mysqli_query($conexion,$sql);
        if($resc){
            while($filac = mysqli_fetch_assoc($resc)){
                $estado = $filac['estado'];

                if($estado == 'B' || $estado == 'C'){
                    $Iniciadas++;
                }
            }
        }
    }
var_dump($Iniciadas);
    exit();
    if($Actualizar == 1) {
        if($Iniciadas>0) {
            $updateli = "UPDATE evaluaciones set limite = '$Limite', actualizacion = NOW(), actulizacion_ip = '$ip' where id = '$Evalucion'";

            $resultadoli = mysqli_query($conexion, $updateli);
            if ($resultadoli) {
                header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Descripcion&id_evaluacion=$Evalucion");

            } else {
                echo 'No se guardo' . mysqli_error($conexion);
            }
        } else {
            $update = "UPDATE evaluaciones set id_cuestionario = '$Cuestionario', id_departamento = '$Depa', id_periodo = '$Periodo', inicio = '$Inicio',
                    fin = '$Fin', limite = '$Limite', descripcion = '$Descripcion', actualizacion = NOW(), actulizacion_ip = '$ip' where id = '$Evalucion'";

            $resultado = mysqli_query($conexion, $update);
            if ($resultado) {
                header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Descripcion&id_evaluacion=$Evalucion");

            } else {
                echo 'No se guardo' . mysqli_error($conexion);
            }
        }
    } else {
            $insert = "insert into evaluaciones(
                            id_cuestionario,
                            id_departamento,
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
                            '$Limite',
                            '$Descripcion',
                            NOW(),
                            '$ip'
                            )";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
                header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Descripcion&id_evaluacion=$id_evaluacion");

            } else {
                echo 'No se guardo' . mysqli_error($conexion);
            }

            define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
    }


?>
