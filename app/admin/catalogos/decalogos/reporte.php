<?php
include('../../../../config/db.php');
$idevaluacion = $_GET['id'];
$sql1 = "Select * from promedios_por_evaluado where id_evaluacion=$idevaluacion;";
$res1 = $conexion->query($sql1);
while ($row1 = $res1->fetch_assoc()) {
$idcuestionario = $row1['id_cuestionario'];
$idperiodo = $row1['id_periodo'];
$idevaluado = $row1['id_evaluado'];
$idevaluador = $row1['id_evaluador'];
$puntajetotal = $row1['puntos'];
$idaplicacion = $row1['id_aplicacion'];
$sql2 = "SELECT Tdecalogo.decalogo, Tperiodo.periodo, Templeados.nombre,
Templeados.apellidos,Tpuesto.puesto
from promedios_por_evaluado ppe
left join preguntas Tpreguntas on
Tpreguntas.id_cuestionario=ppe.id_cuestionario
left join decalogos_aseveraciones Tdecalogoaseveracion on
Tdecalogoaseveracion.id=Tpreguntas.id_decalogo_aseveracion
left join decalogos Tdecalogo on
Tdecalogo.id = Tdecalogoaseveracion.id_decalogo
left join evaluaciones Tevaluacion on
Tevaluacion.id=ppe.id_evaluacion
left join periodos Tperiodo on
Tperiodo.id=Tevaluacion.id_periodo
left join empleados Templeados on
Templeados.id=ppe.id_evaluado
left join puestos Tpuesto on
Tpuesto.id=Templeados.id_puesto
left join niveles_puesto Tnivelpuesto on
Tnivelpuesto.id=Tpuesto.id_nivel_puesto 
where ppe.id_evaluacion=$idevaluacion and ppe.id_evaluado=$idevaluado
group by Tdecalogo.decalogo, Tperiodo.periodo, Templeados.nombre,
Templeados.apellidos,Tpuesto.puesto,Tnivelpuesto.nivel_puesto";
$res2 = $conexion->query($sql2);
$row2 = mysqli_fetch_array($res2, MYSQLI_ASSOC);
$decalogo = utf8_encode($row2['decalogo']);
$periodo = $row2['periodo'];
$nombreevaluado = utf8_encode($row2['nombre']);
$apellidosevaluado = utf8_encode($row2['apellidos']);
$puestoevaluado = utf8_encode($row2['puesto']);
//$nivelpuesto=utf8_encode($row2['nivel_puesto']);
$sql3 = "select Templeados.nombre,Templeados.apellidos,
Tpuestos.puesto, Tnivelpuesto.nivel_puesto 
from promedios_por_evaluado ppe
left join empleados Templeados on
Templeados.id=ppe.id_evaluador
left join puestos Tpuestos on
Tpuestos.id=Templeados.id_puesto
left join niveles_puesto Tnivelpuesto on
Tnivelpuesto.id=Tpuestos.id_nivel_puesto
where ppe.id_evaluador = $idevaluador and ppe.id_evaluacion=$idevaluacion
group by Templeados.nombre,Templeados.apellidos,
Tpuestos.puesto, Tnivelpuesto.nivel_puesto;";
$res3 = $conexion->query($sql3);
$row3 = mysqli_fetch_array($res3, MYSQLI_ASSOC);
$nombreevaluador = utf8_encode($row3['nombre']);
$apellidosevaluador = utf8_encode($row3['apellidos']);
$puestoevaluador = utf8_encode($row3['puesto']);
$nivelpuestoevaluador = utf8_encode($row3['nivel_puesto']);
?>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="estiloreporte.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

</head>
<body>
<div class="part1">
    <img src="../../../../img/logo_ICAVE.png" class="img-1">
    <i class="enc-1"><?php echo utf8_encode($decalogo) ?></i>
</div>

<div>
    <table class="tabla1">
        <tr>
            <th class="th1">Nombre del evaluado</th>
            <th class="th1">Puesto del evaluado</th>
        </tr>
        <tr>
            <td class="td1"><?php echo utf8_encode($nombreevaluado . " " . $apellidosevaluado) ?></td>
            <td class="td1"><?php echo utf8_encode($puestoevaluado) ?></td>
        </tr>
    </table>
    <table class="tabla2">
        <tr>
            <th class="th1">Nombre de quien eval<?php echo utf8_encode("ú") ?>a</th>
            <th class="th1">Puesto de quien eval<?php echo utf8_encode("ú") ?>a</th>
        </tr>
        <tr>
            <td class="td1"><?php echo utf8_encode($nombreevaluador . " " . $apellidosevaluador) ?></td>
            <td class="td1"><?php echo utf8_encode($puestoevaluador) ?></td>
        </tr>
    </table>
    <table class="tabla2">
        <tr>
            <th class="th1">Fecha</th>
            <th class="th1" rowspan="2"><u class="u1"><?php echo utf8_encode($nivelpuestoevaluador) ?></u></th>
        </tr>
        <tr>
            <td class="td1"><?php echo $periodo ?></td>
        </tr>
    </table>
</div>

<?php
$sql4 = "select Tdecalogoaseveracion.aseveracion, 
Tpreguntasrespuestas.puntos 
from promedios_por_evaluado ppe
left join preguntas Tpreguntas on
Tpreguntas.id_cuestionario=ppe.id_cuestionario
left join aplicaciones app on
ppe.id_evaluador=app.id_evaluador 
left join resultados res on
res.id_aplicacion=app.id
left join preguntas_respuestas Tpreguntasrespuestas on
Tpreguntasrespuestas.id_pregunta=Tpreguntas.id
left join decalogos_aseveraciones Tdecalogoaseveracion on
Tdecalogoaseveracion.id=Tpreguntas.id_decalogo_aseveracion
where ppe.id_cuestionario = $idcuestionario and ppe.id_evaluacion=$idevaluacion 
and ppe.id_evaluador=$idevaluador and res.id_aplicacion=$idaplicacion
group by Tdecalogoaseveracion.aseveracion, 
Tpreguntasrespuestas.puntos";
$res4 = $conexion->query($sql4);
if ($res4) {
    ?>
    <div>
        <table class="tabla3">
            <tr>
                <th class="th2" colspan="2">decalogo <?php $decalogo ?></th>
                <th class="th3">Calificacion</th>
            </tr>
            <?php
            $contar = 1;
            while ($row4 = $res4->fetch_assoc()) {

                ?>

                <tr>
                    <td class="td2"><?php echo $contar ?></td>
                    <td class="td3"><?php echo utf8_encode($row4['aseveracion']) ?></td>
                    <td class="td4"><?php echo $row4['puntos'] ?></td>
                </tr>
                <?php
                $contar++;
            } ?>
        </table>

    </div>
    <?php
} ?>
<div>
    <table class="tabla4">
        <tr>
            <th colspan="3" class="th1">Escala de calificacion</th>
        </tr>
        <tr>
            <td class="td5">1</td>
            <td class="td6">Marginal</td>
            <td class="td7">(rara vez muestra el comportamiento esperado)</td>
        </tr>
        <tr>
            <td class="td5">2</td>
            <td class="td6">Minimo Aceptable</td>
            <td class="td7">(Comportamiento inconsciente)</td>
        </tr>
        <tr>
            <td class="td5">3</td>
            <td class="td6">Satisfactorio</td>
            <td class="td7">(Comportamiento esperado)</td>
        </tr>
        <tr>
            <td class="td5">4</td>
            <td class="td6">Notable</td>
            <td class="td7">(Comportamiento superior a lo esperado)</td>
        </tr>
        <tr>
            <td class="td5">5</td>
            <td class="td6">Excelente</td>
            <td class="td7">(Comportamiento que trasciende su area de influencia)</td>
        </tr>
    </table>
</div>

<div>
    <i class="pie1"><?php echo $periodo ?></i>
    <i><u class="pie2">Uso interno</u></i>
    <i class="pie3">Subgerencia de Recursos<i>
</div>

</body>
<?php
} ?>
</html>
