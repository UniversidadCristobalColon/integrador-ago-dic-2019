<?php
require_once '../../../config/db.php';
require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
$id_periodo = !empty($_GET['id_periodo']) ? $_GET['id_periodo'] : '';
$id_evaluado = !empty($_GET['id_evaluado']) ? $_GET['id_evaluado'] : '';
$id_departamento = !empty($_GET['id_departamento']) ? $_GET['id_departamento'] : '';
$periodos = array();
$departamentos = array();
$empleados = array();
$periodo = '';

$sql = "select * 
        from periodos 
        where estado = 'Activo' order by id desc";


$res = mysqli_query($conexion, $sql);
if($res){
    while($f = mysqli_fetch_assoc($res)){
        $periodos[] = $f;
        $periodo = !empty($id_periodo) && $id_periodo == $f["id"] ? $f["periodo"] : '';
    }
}
$sql = "select * from departamentos where estatus = 'Activo' order by departamento";
$res = mysqli_query($conexion, $sql);
if($res){
    while($f = mysqli_fetch_assoc($res)){
        $departamentos[] = $f;
    }
}

$evaluado       = "";
$departamento   = "";

$id_evaluacion = 1;
$evaluadores = array();
if(!empty($id_periodo) && !empty($id_evaluado)) {
    $sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol, pe.id_evaluacion, pe.id_rol_evaluador 
            from promedios_por_evaluado pe join empleados e
            on e.id = pe.id_evaluador
            join roles r on pe.id_rol_evaluador = r.id
            where id_evaluado=$id_evaluado and id_periodo = $id_periodo
            order by id_evaluacion desc, pe.id_rol_evaluador asc";
    $resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
    while($f = mysqli_fetch_assoc($resultado2)){
        $evaluadores[] = $f;
    }

    $sql = "SELECT CONCAT(a.nombre, ' ', a.apellidos) as nombre, b.departamento
            FROM empleados a
            LEFT JOIN departamentos b
            ON a.id_departamento = b.id
            WHERE a.id = $id_evaluado";
    $res = mysqli_query($conexion, $sql);
    if ($res) {
        if(mysqli_num_rows($res)) {
            $f = mysqli_fetch_assoc($res);
            $evaluado = $f['nombre'];
            $departamento = $f["departamento"];
        }
    }


}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo PAGE_TITLE ?></title>

    <?php getTopIncludes(RUTA_INCLUDE ) ?>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar', 'corechart']});
        //google.charts.setOnLoadCallback(drawChart);




        function drawChart(id_grafico, str_datos) {
            var datos = [];
            if(str_datos !== '') {
                datos = $.parseJSON(str_datos);

                /*var data = google.visualization.arrayToDataTable([
                    ['Decálogo', 'Jefe', 'Par 1', 'Par 2', 'Cliente', 'Autoevaluación'],
                    ['2014', 1000, 400, 200, 400, 200],
                    ['2015', 1170, 460, 250, 400, 200],
                    ['2016', 660, 1120, 300, 400, 200],
                    ['2017', 1030, 540, 350, 400, 200]
                ]);*/

                var data = google.visualization.arrayToDataTable(datos);

                var options = {
                    chart: {
                        title: null
                    },
                    bars: 'horizontal',
                    hAxis: {
                        minValue: 0
                    },
                    width:950,
                    height:600
                };

                var chart = new google.charts.Bar(document.getElementById(id_grafico));
                chart.draw(data, google.charts.Bar.convertOptions(options));
                $('#c_'+id_grafico).collapse();
            }
        }
        $('document').ready(function(){
            $('#id_departamento, #id_periodo').on('change', function(){
                buscarEmpleados();
            });
            setTimeout(function(){
                buscarEmpleados();
            },100);
        })
        function buscarEmpleados(){
            var id_departamento = $('#id_departamento').val();
            var id_periodo = $('#id_periodo').val();
            if(id_departamento !== '' && id_periodo !== ''){
                $.ajax({
                    url: "empleados.php",
                    data: {'id_departamento':id_departamento, 'id_periodo':id_periodo},
                    type: "GET",
                    async: true,
                    dataType: "json",
                    success: function (data, textStatus, jqXHR) {
                        if(data.length > 0){
                            llenarListaEmpleados(data);
                        }else{
                            limpiarListaEmpleados();
                            msg('No hay empleados en el periodo de evaluación y/o departamento seleccionado');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Ha sucedido un error:\n" + errorThrown);
                    }
                });
            }
        }
        function limpiarListaEmpleados(){
            $('#id_evaluado').empty().append(
                $('<option>').val('').text('Seleccione una opción')
            );
        }
        function llenarListaEmpleados(empleados){
            var lista = $('#id_evaluado').empty().append(
                $('<option>').val('').text('Seleccione una opción')
            );
            $.each(empleados, function(k,v){
                var option = $('<option>').val(v.id).text(v.nombre);
                if(v.id === '<?php echo $id_evaluado; ?>'){
                    option.prop('selected', true);
                }
                lista.append(option);
            })
        }
        function val(){
            return $('#id_periodo').val() !== '' && $('#id_departamento').val() !== '' && $('#id_evaluado').val() !== '';
        }
        function msg(txt){
            if(txt==='') return false;
            $('#msg').text(txt).slideDown();
            setTimeout(function(){
                $('#msg').slideUp();
            }, 3500);
        }
    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">
            <div class="alert alert-danger" style="display: none" id="msg"></div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Decálogo
                </div>

                <div class="card-body">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="get" onsubmit="return val()">
                        <div class="row align-items-end">
                            <div class="col">
                                <label>Periodo</label>
                                <select class="form-control" name="id_periodo" id="id_periodo">
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    if(!empty($periodos)) {
                                        foreach ($periodos as $p) {
                                            $selected = !empty($id_periodo) && $id_periodo == $p['id'] ? "selected='selected'" : '';
                                            echo "<option value='$p[id]' $selected>$p[periodo]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label>Departamento</label>
                                <select class="form-control" name="id_departamento" id="id_departamento">
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    if(!empty($departamentos)) {
                                        foreach ($departamentos as $d) {
                                            $selected = !empty($id_departamento) && $id_departamento == $d['id'] ? "selected='selected'" : '';
                                            echo "<option value='$d[id]' $selected>$d[departamento]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label>Empleado</label>
                                <select class="form-control" name="id_evaluado" id="id_evaluado">
                                    <option value="">Seleccione una opción</option>
                                </select>
                            </div>
                            <div class="col"><br>
                                <button type="submit" class="btn btn-primary">Consultar</button>
                            </div>
                        </div>
                    </form>


                    <h5 class="mt-3"><?php echo "<hr>{$periodo}<br>{$evaluado}<br><small class='text-muted'>$departamento</small>" ?></h5>



                    <?php

                        if(!empty($evaluadores)) {
                            $suma=0;
                            $cont=0;

                            $escala = array();
                            $index = 1;

                            $sql = "SELECT c.*
                                    from decalogos a, evaluaciones b, escalas c
                                    where a.id = b.id_cuestionario
                                    and a.id_escala = c.id
                                    and b.id = $id_evaluacion";

                            $resesacalas = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

                            if(mysqli_num_rows($resesacalas)) {
                                $row = mysqli_fetch_array($resesacalas);
                                $keys = array_keys($row);
                                foreach($keys as $key){
                                    if (substr($key, -8) == 'etiqueta' && !empty($row[$key])){
                                        $aux = explode('_', $key);
                                        $indice = substr($aux[0], -1);

                                        if(!empty($row["nivel{$indice}_etiqueta"]) && !empty($row["nivel{$indice}_superior"])) {
                                            $escala[$index - 1]['etiqueta'] = $row["nivel{$indice}_etiqueta"];
                                            $escala[$index - 1]['inferior'] = $row["nivel{$indice}_inferior"];
                                            $escala[$index - 1]['superior'] = $row["nivel{$indice}_superior"];
                                            $index++;
                                        }
                                    }
                                }
                            }

                            $id_evaluacion_aux = 0;
                            foreach($evaluadores as $row2){
                                $id_evaluacion = $row2["id_evaluacion"];
                                $tituloeval ='';
                                if($id_evaluacion_aux != $id_evaluacion){
                                    $sql = "select  descripcion from evaluaciones where id = $row2[id_evaluacion]";
                                    $reeval = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

                                    $sql_aseveraciones = "select a.id, a.aseveracion 
                                                        from decalogos_aseveraciones a, evaluaciones b, preguntas c
                                                        where b.id = $id_evaluacion
                                                        and b.id_cuestionario = c.id_cuestionario
                                                        and c.id_decalogo_aseveracion = a.id
                                                        GROUP by a.id, a.aseveracion
                                                        order by a.id";

                                    $res_aseveraciones = mysqli_query($conexion, $sql_aseveraciones);
                                    $aseveraciones = array();
                                    while($asev = mysqli_fetch_assoc($res_aseveraciones)){
                                        array_push($aseveraciones, $asev);
                                    }

                                    $grafico = array();
                                    $encabezado = array('Decálogo');
                                    foreach($aseveraciones as $a){
                                        $id_aseveracion = $a["id"];
                                        $aseveracion = $a["aseveracion"];

                                        $linea = array($aseveracion);

                                        $sql_puntos = "select da.aseveracion,pe.puntos, r.rol 
                                                from promedios_por_evaluado pe join preguntas p 
                                                on p.id = pe.id_pregunta
                                                join decalogos_aseveraciones da 
                                                on da.id = p.id_decalogo_aseveracion
                                                join roles r
                                                on pe.id_rol_evaluador = r.id
                                                where pe.id_evaluado = $id_evaluado
                                                and pe.id_evaluacion = $id_evaluacion
                                                and da.id = $id_aseveracion
                                                order by pe.id_rol_evaluador asc";

                                        $res_puntos = mysqli_query($conexion, $sql_puntos);

                                        while($f_puntos = mysqli_fetch_assoc($res_puntos)){
                                            if(in_array($f_puntos["rol"], $encabezado) === false){
                                                array_push($encabezado, $f_puntos["rol"]);
                                            }
                                            array_push($linea, (float)$f_puntos['puntos']);
                                        }

                                        array_push($grafico, $linea);
                                    }

                                    array_unshift($grafico, $encabezado);

                                    $json_grafico = json_encode($grafico);

                                    echo "<script>
                                            $(document).ready(function(){
                                               drawChart('grafico_{$id_evaluacion}', '$json_grafico'); 
                                            });
                                            
                                        </script>";

                                    ?>
                                    <hr>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <h4><?php
                                                    while($row = mysqli_fetch_array($reeval)){
                                                        echo $row['descripcion'];
                                                    }
                                                ?></h4>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a class="btn btn-primary" data-toggle="collapse" href="#c_grafico_<?php echo $id_evaluacion ?>" role="button" aria-expanded="true" aria-controls="c_grafico_<?php echo $id_evaluacion ?>">
                                                Ver gráfico
                                            </a>

                                            <a href="generarexcel2.php?id_evaluado=<?php echo $id_evaluado ?>&id_periodo=<?php echo $id_periodo?>&id_evaluacion=<?php echo $id_evaluacion?>"class="btn btn-primary" target="_blank">
                                                Exportar a Excel
                                            </a>


                                            <a href="../../admin/catalogos/decalogos/crearPdf.php?idevaluado=<?php echo $id_evaluado ?>&idevaluacion=<?php echo $id_evaluacion ?>" class="btn btn-primary" target="_blank">
                                                Exportar a PDF
                                            </a>
                                        </div>
                                    </div>

                                    <div id="c_grafico_<?php echo $id_evaluacion ?>" class="collapse show">
                                        <div id="grafico_<?php echo $id_evaluacion ?>" style="width: 950px; height: 600px;" class="mx-auto"></div>
                                    </div>

                                    <?php
                                    $id_evaluacion_aux = $id_evaluacion;
                                }

                                /*Se obtienen las preguntas de acuerdo al evaluador, periodo y evaluado*/
                                $sql = "select da.aseveracion,pe.puntos 
                                        from promedios_por_evaluado pe join preguntas p 
                                        on p.id = pe.id_pregunta
                                        join decalogos_aseveraciones da 
                                        on da.id = p.id_decalogo_aseveracion
                                        where pe.id_evaluador = $row2[id_evaluador] 
                                        and pe.id_evaluado = '$id_evaluado' 
                                        and pe.id_evaluacion = $id_evaluacion;                                        
                                        ";



                                $resultado3 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
                                echo "
                                    <h5>$row2[nombre] $row2[apellidos] / $row2[rol]</h5>
                                    <table class='table mb-5'>
                                    
                                        <thead>
                                        
                                        <tr>
                                            <th style='width: 70%'>Decálogo</th>
                                            <th style='width: 15%'>Calificación</th>
                                            <th style='width: 15%'>Escala</th>
                                        </tr>
                                        </thead> <tbody>
                                ";
                                while($row4 = mysqli_fetch_array($resultado3)){
                                    $suma +=$row4['puntos'];
                                    $cont++;
                                    echo "
                                             <tr>
                                                   <td>$row4[aseveracion]</td>
                                                   <td>$row4[puntos]</td>";
                                    foreach($escala as $e){
                                        if($row4['puntos'] >= $e['inferior'] && $row4['puntos'] <= $e['superior']){
                                            echo "<td>$e[etiqueta]</td>";
                                            break;
                                        }
                                    }
                                    echo"                                                        
                                                        </tr>
                                                     ";


                                }
                                $promedio=$suma/$cont;
                                echo "</tbody>
                                        <tfoot class='bg-light'>
                                            <tr>
                                                <td><b>Promedio</b></td>
                                                <td colspan='2'>$promedio</td>
                                           </tr>
                                        </tfoot>
                                        </table>
                                ";
                                $suma =0;
                                $cont=0;
                            };
                        }else{
                        if(!empty($id_periodo) && !empty($id_departamento) && !empty($id_evaluado)) {
                            echo "<div class='alert alert-warning'>No hay registros para la persona en el periodo seleccionado</div>";
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <?php getFooter() ?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>