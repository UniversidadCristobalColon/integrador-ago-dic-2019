<?php
require("../../../../config/db.php");
?>

<?php
//necesario el id de evaluaciones con GET
$idevaluacion = $_GET['id'];
//Select con la lista de evaluadores que no esten en promedios por evaluacion
$sqlevaluador = "select id_evaluador from aplicaciones 
where id_evaluador not in (select id_evaluador from promedios_por_evaluado);";
$resultadoevaluador = $conexion->query($sqlevaluador);

//INSERT de la tabla con todos sus campos si no estan en promedios por evaluacion
while ($rowevaluador = $resultadoevaluador->fetch_assoc()) {

    $idevaluador = $rowevaluador['id_evaluador'];
    // select de los id por cada evaluador en el ciclo while
    $supersql = "SELECT Tevaluaciones.id, Tevaluaciones.id_cuestionario, 
    Tevaluaciones.id_periodo, Taplicaciones.id_evaluado, Taplicaciones.id,
    Taplicaciones.id_evaluador, AVG(Tresultados.puntos) as puntaje FROM
    resultados Tresultados 
    LEFT JOIN aplicaciones Taplicaciones
    ON Taplicaciones.id = Tresultados.id_aplicacion
    LEFT JOIN evaluaciones Tevaluaciones
    ON Tevaluaciones.id = Taplicaciones.id_evaluacion 
    WHERE Taplicaciones.id_evaluador = $idevaluador
    group by Tevaluaciones.id_cuestionario,Tevaluaciones.id,
    Tevaluaciones.id_periodo, Taplicaciones.id_evaluado,Taplicaciones.id,
    Taplicaciones.id_evaluador;";
    //recuperacion de datos de las tablas por cada evaluador.
    $resultadosupersql = $conexion->query($supersql);
    $rowresultadosupersql = mysqli_fetch_array($resultadosupersql, MYSQLI_ASSOC);
    $idcuestionario = $rowresultadosupersql['id_cuestionario'];
    $idperiodo = $rowresultadosupersql['id_periodo'];
    $idevaluado = $rowresultadosupersql['id_evaluado'];
    $puntaje = $rowresultadosupersql['puntaje'];
    $idaplicacion = $rowresultadosupersql['id'];


    $sqlnivelevaluado = "select Tpuesto.id_nivel_puesto from
aplicaciones app
left join empleados Templeados on
Templeados.id=app.id_evaluado
left join puestos Tpuesto on
Tpuesto.id=Templeados.id_puesto
where app.id_evaluado=$idevaluado group by Tpuesto.id_nivel_puesto;";
    $resultadonivelevaluado = $conexion->query($sqlnivelevaluado);
    $rownivelevaluado = mysqli_fetch_array($resultadonivelevaluado, MYSQLI_ASSOC);
    $idnivelevaluado = $rownivelevaluado['id_nivel_puesto'];

    $sqlnivelevaluador = "select Tpuesto.id_nivel_puesto from
aplicaciones app
left join empleados Templeados on
Templeados.id=app.id_evaluado
left join puestos Tpuesto on
Tpuesto.id=Templeados.id_puesto
where app.id_evaluador=$idevaluador group by Tpuesto.id_nivel_puesto;";
    $resultadonivelevaluador = $conexion->query($sqlnivelevaluador);
    $rownivelevaluador = mysqli_fetch_array($resultadonivelevaluador, MYSQLI_ASSOC);
    $idnivelevaluador = $rownivelevaluador['id_nivel_puesto'];

    //insert por cada evaluador

    $insert = $conexion->prepare("INSERT INTO promedios_por_evaluado(id_evaluacion,id_cuestionario,id_periodo,id_evaluado,id_evaluado_nivel,id_evaluador,id_evaluador_nivel,id_aplicacion, puntos,creacion) 
                VALUES (?, ? ,? ,? ,? ,? ,? ,? ,? , NOW())");
    $insert->bind_param("iiiiiiiii", $idevaluacion, $idcuestionario, $idperiodo, $idevaluado, $idnivelevaluado, $idevaluador, $idnivelevaluador, $idaplicacion, $puntaje);
    $insert->execute();
    $insert->close();
    $conexion->close();


}
//Header a modificar
//header("Location: inicio.php");
?>