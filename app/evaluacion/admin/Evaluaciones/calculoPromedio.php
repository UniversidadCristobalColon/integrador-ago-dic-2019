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
    Tevaluaciones.id_periodo, Taplicaciones.id_evaluado,
    Taplicaciones.id_evaluador, AVG(Tresultados.puntos) as puntaje FROM
    resultados Tresultados 
    LEFT JOIN aplicaciones Taplicaciones
    ON Taplicaciones.id = Tresultados.id_aplicacion
    LEFT JOIN evaluaciones Tevaluaciones
    ON Tevaluaciones.id = Taplicaciones.id_evaluacion 
    WHERE Taplicaciones.id_evaluador = $idevaluador
    group by Tevaluaciones.id_cuestionario,Tevaluaciones.id,
    Tevaluaciones.id_periodo, Taplicaciones.id_evaluado,
    Taplicaciones.id_evaluador;";
    //recuperacion de datos de las tablas por cada evaluador.
    $resultadosupersql = $conexion->query($supersql);
    $rowresultadosupersql = mysqli_fetch_array($resultadosupersql, MYSQLI_ASSOC);
    $idcuestionario = $rowresultadosupersql['id_cuestionario'];
    $idperiodo = $rowresultadosupersql['id_periodo'];
    $idevaluado = $rowresultadosupersql['id_evaluado'];
    $puntaje = $rowresultadosupersql['puntaje'];
    //insert por cada evaluador
    $insert = "INSERT INTO promedios_por_evaluado(id_evaluacion,id_cuestionario,id_periodo,id_evaluado,id_evaluador,puntos,creacion) 
                VALUES($idevaluacion,$idcuestionario,$idperiodo,$idevaluado,$idevaluador,$puntaje,NOW());";
    $resultinsert = $conexion->query($insert);
    if ($resultinsert === TRUE) {
    } else {
        ?>
        <p>No se pudo enviar la solicitud. Error: <?php echo $resultinsert->error; ?></p>
        <?php
    }
}
//Header a modificar
//header("Location: inicio.php");
?>