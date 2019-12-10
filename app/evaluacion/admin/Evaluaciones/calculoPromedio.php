<?php
require("../../../../config/db.php");
?>
<?php
//necesario el id de evaluaciones con GET
$idevaluacion = $_GET['id'];
///delete del evaluacion
$delete = $conexion->prepare("DELETE FROM promedios_por_evaluado where id_evaluacion=?");
$delete->bind_param("i", $idevaluacion);
$delete->execute();
$delete->close();
$supersql = "SELECT Tresul.id_aplicacion,Tapp.id_evaluacion,Tapp.id_evaluado
,Tapp.id_evaluador, Tapp.id_rol_evaluador,
Teval.id_Cuestionario, Teval.id_periodo,Tresul.id_pregunta,
Tresul.id_respuesta, Tresul.puntos
        FROM evaluaciones Teval LEFT JOIN aplicaciones Tapp ON
        Tapp.id_evaluacion=Teval.id
        LEFT JOIN resultados Tresul ON
        Tresul.id_aplicacion=Tapp.id
         WHERE id_evaluacion=$idevaluacion and Tapp.estado='C'";
$resultadosupersql = $conexion->query($supersql);

//INSERT de la tabla con todos sus campos si no estan en promedios por evaluacion
while ($rowresultadosupersql = $resultadosupersql->fetch_assoc()) {
    $idevaluador = $rowresultadosupersql['id_evaluador'];
    $idevaluado = $rowresultadosupersql['id_evaluado'];
    $idaplicacion = $rowresultadosupersql['id_aplicacion'];
    $idevaluacion = $rowresultadosupersql['id_evaluacion'];
    $idcuestionario = $rowresultadosupersql['id_Cuestionario'];
    $idperiodo = $rowresultadosupersql['id_periodo'];
    $idrolevaluador = $rowresultadosupersql['id_rol_evaluador'];
    $idpregunta = $rowresultadosupersql['id_pregunta'];
    $idrespuesta = $rowresultadosupersql['id_respuesta'];
    $puntos = $rowresultadosupersql['puntos'];

        $sqlnivelevaluado = "select Tpuesto.id_nivel_puesto 
        from empleados Templeados
        left join puestos Tpuesto on 
        Templeados.id_puesto=Tpuesto.id 
        where Templeados.id=$idevaluado 
        group by Tpuesto.id_nivel_puesto";
        $resultadonivelevaluado = $conexion->query($sqlnivelevaluado);
        $rownivelevaluado = mysqli_fetch_array($resultadonivelevaluado, MYSQLI_ASSOC);
        $idnivelevaluado = $rownivelevaluado['id_nivel_puesto'];


        $sqlnivelevaluador = "select Tpuesto.id_nivel_puesto 
        from empleados Templeados
        left join puestos Tpuesto on 
        Templeados.id_puesto=Tpuesto.id 
        where Templeados.id=$idevaluador 
        group by Tpuesto.id_nivel_puesto";
        $resultadonivelevaluador = $conexion->query($sqlnivelevaluador);
        $rownivelevaluador = mysqli_fetch_array($resultadonivelevaluador, MYSQLI_ASSOC);
        $idnivelevaluador = $rownivelevaluador['id_nivel_puesto'];

        $insert = $conexion->prepare("INSERT INTO promedios_por_evaluado(id_evaluacion,id_cuestionario,id_periodo,id_evaluado,id_evaluado_nivel,id_evaluador,id_evaluador_nivel,id_rol_evaluador,id_aplicacion,id_pregunta,id_respuesta, puntos,creacion) 
                VALUES (?, ? ,? ,? ,? ,? ,? ,? ,? ,? ,? , ?, NOW())");
        $insert->bind_param("iiiiiiiiiiii", $idevaluacion, $idcuestionario, $idperiodo, $idevaluado, $idnivelevaluado, $idevaluador, $idnivelevaluador,$idrolevaluador, $idaplicacion, $idpregunta, $idrespuesta, $puntos);
        $insert->execute();
        $insert->close();
}
$conexion->close();
//Header a modificar
header("Location: adminEvaluacion.php?id_evaluacion=$idevaluacion&resultados=1");
?>