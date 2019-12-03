<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Evaluacion = /*$_POST["Departamento"]*/ 2;
    $Evaluado = /*convertirFecha($_POST["Inicio"])*/ 2;
    $EvaluadoS = /*convertirFecha($_POST["Inicio"])*/ 9;
    $EvaluadoP = /*convertirFecha($_POST["Inicio"])*/ 10;
    $EvaluadoP1 = /*convertirFecha($_POST["Inicio"])*/ 11;
    $EvaluadoC = /*convertirFecha($_POST["Inicio"])*/ 12;
    $Depa = /*$_GET['id_departamento']*/ 3;
    $Nombre = /*$_GET['id_nombre']*/ "Pruebas";

    if(!empty($Evaluado)){
        if(!empty($EvaluadoS)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoS',
                            NOW(),
                            'A',
                            'AA',
                            1)";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
            } else {
                echo 'No se guardo ' . mysqli_error($conexion);
                echo $insert;
                exit;
            }
        }
        if(!empty($EvaluadoP)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoP',
                            NOW(),
                            'A',
                            'BB',
                            1)";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
            } else {
                echo 'No se guardo ' . mysqli_error($conexion);
                echo $insert;
                exit;
            }
        }
        if(!empty($EvaluadoP1)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoP1',
                            NOW(),
                            'A',
                            'CC',
                            1)";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
            } else {
                echo 'No se guardo ' . mysqli_error($conexion);
                echo $insert;
                exit;
            }
        }
        if(!empty($EvaluadoC)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoC',
                            NOW(),
                            'A',
                            'DD',
                            1)";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
            } else {
                echo 'No se guardo ' . mysqli_error($conexion);
                echo $insert;
                exit;
            }
        }
    }
    header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Descripcion&id_evaluacion=$id_evaluacion");
?>
