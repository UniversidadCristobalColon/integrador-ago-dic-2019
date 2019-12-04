<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Evaluacion = /*$_POST["Departamento"]*/ 1;
    $Evaluado = /*convertirFecha($_POST["Inicio"])*/ 23;
    $EvaluadoS = /*convertirFecha($_POST["Inicio"])*/ 26;
    $EvaluadoP = /*convertirFecha($_POST["Inicio"])*/ 27;
    $EvaluadoP1 = /*convertirFecha($_POST["Inicio"])*/ 28;
    $EvaluadoC = /*convertirFecha($_POST["Inicio"])*/ 30;
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
    header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Nombre&id_evaluacion=$id_evaluacion");
?>
