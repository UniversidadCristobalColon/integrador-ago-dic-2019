<?php
    require_once '../../../../config/global.php';
    include '../../../../config/db.php';

    $Evaluacion = $_POST["id_evaluacion"];
    $Evaluado = $_POST["evaluado"];
    $EvaluadoS = $_POST["evaluadorS"];
    $EvaluadoP = $_POST["evaluadorP1"];
    $EvaluadoP1 = $_POST["evaluadorP2"];
    $EvaluadoC = $_POST["evaluadorC"];
    $Depa = $_POST["id_departamento"];
    $Nombre = $_POST["id_nombre"];
    $Autoevaluacion = $_POST["auto"];
    $hashS = md5(time().$Evaluacion.$Evaluado.$EvaluadoS);
    $hashP1 = md5(time().$Evaluacion.$Evaluado.$EvaluadoP);
    $hashP2 = md5(time().$Evaluacion.$Evaluado.$EvaluadoP1);
    $hashC = md5(time().$Evaluacion.$Evaluado.$EvaluadoC);
    $hashA = md5(time().$Evaluacion.$Evaluado.$Evaluado);

/*
If the organization don't exist, the data from the form is sended to the
database and the account is created
*/
$organizacion = $_POST['organizacion'];

    if(!empty($Evaluado)){
        if(!empty($EvaluadoS)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            id_rol_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoS',
                            1,
                            NOW(),
                            'A',
                            '$hashS',
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
                         id_rol_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoP',
                                            2,
                            NOW(),
                            'A',
                            '$hashP1',
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
                         id_rol_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoP1',
                                            3,
                            NOW(),
                            'A',
                            '$hashP2',
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
                         id_rol_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$EvaluadoC',
                            4,
                            NOW(),
                            'A',
                            '$hashC',
                            1)";

            $resultado = mysqli_query($conexion, $insert);
            if ($resultado) {
                $id_evaluacion = mysqli_insert_id($conexion);
            } else {
                echo 'No se guardo ' . mysqli_error($conexion);
                echo $insert;
                exit;
            }
        } if(!empty($Autoevaluacion)){
            $insert = "insert into aplicaciones(
                            id_evaluacion,
                            id_evaluado,
                            id_evaluador,
                            id_rol_evaluador,
                            creacion,
                            estado,
                            hash,
                            pagina) values (
                            '$Evaluacion',
                            '$Evaluado',
                            '$Evaluado',
                            5,
                            NOW(),
                            'A',
                            '$hashA',
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
    header("location: adminEvaluacion.php?id_departamento=$Depa&id_nombre=$Nombre&id_evaluacion=$Evaluacion");
?>
