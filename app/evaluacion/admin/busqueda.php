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
$sql = "select * from periodos where estado = 'Activo' order by id desc";
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
$competencias   = array();
$evaluado       = "";
$departamento   = "";
if(!empty($id_periodo) && !empty($id_evaluado)) {
    $sql = "select c.id, c.competencia, AVG(a.puntos) as promedio 
            from promedios_por_evaluado a, preguntas b, competencias c
            where a.id_periodo = $id_periodo
            and a.id_evaluado = $id_evaluado
            and a.id_pregunta = b.id
            and b.id_competencia = c.id
            group by c.id, c.competencia
            order by promedio desc";
    $res = mysqli_query($conexion, $sql);
    if ($res) {
        while ($f = mysqli_fetch_assoc($res)) {
            $competencias[] = $f;
        }
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
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {packages: ['corechart', 'bar']});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {
            <?php
            if(!empty($competencias)){ ///// si no hay datos no inicializar el grafico
            $datos = array(array('Competencia', 'Promedio'));
            foreach ($competencias as $c) {
                $datos[] = array($c["competencia"], (float)number_format($c["promedio"], 2));
            }
            ?>
            var data = google.visualization.arrayToDataTable(<?php echo json_encode($datos) ?>);
            var options = {
                title: 'Competencias',
                hAxis: {
                    title: 'Competencia'
                },
                vAxis: {
                    title: 'Promedio'
                },
                legend: {position: 'none'},
                width: '100%',
                height: 400
            };
            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            <?php
            }
            ?>
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
                    Competencias
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

                    <div container></div>
                    <div class="row">
                        <div class="col">
                            <h5 class="mt-3"><?php echo "<hr>{$periodo}<br>{$evaluado}<br><small class='text-muted'>$departamento</small>" ?></h5>
                        </div>
                    <?php
                        echo "
                            <div class='col'>
                                <form method='POST' action='generarexcel.php'>
                                    <input type='hidden' name='id_evaluado' value='$id_evaluado'>
                                    <input type='hidden' name='id_periodo' value='$id_periodo'>
                                    <input type='submit' class= 'btn btn-primary' value='Generar Excel'>
                                </form>
                                
                                <form method='POST' action='../../admin/catalogos/decalogos/crearPdf.php'>
                                    <input type='hidden' name='idevaluado' value='78'>
                                    <input type='hidden' name='idevaluacion' value='10'>
                                    <input type='submit' class= 'btn btn-primary' value='Generar PDF'>
                                </form>
                            </div>  
                    </div>    
                    ";
                        if(!empty($competencias)) {


                            $suma=0;
                            $cont=0;

                            $sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol from promedios_por_evaluado pe join empleados e
                                on e.id = pe.id_evaluador
                                join roles r on pe.id_rol_evaluador = r.id
                                where id_evaluado='$id_evaluado' and id_periodo ='$id_periodo'";
                            $resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));


                            $sql = "select * from escalas where id='1' ";
                            $resesacalas = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

                            $cont2=0;

                            $escala = array();
                            $puntos = 1;


                            $escala[5] = array();
                            while($row = mysqli_fetch_array($resesacalas)){
                                $escala[0]['etiqueta']=$row['nivel1_etiqueta'];
                                $escala[0]['inferior']=$row['nivel1_inferior'];
                                $escala[0]['superior']=$row['nivel1_superior'];


                                $escala[1]['etiqueta']=$row['nivel2_etiqueta'];
                                $escala[1]['inferior']=$row['nivel2_inferior'];
                                $escala[1]['superior']=$row['nivel2_superior'];


                                $escala[2]['etiqueta']=$row['nivel3_etiqueta'];
                                $escala[2]['inferior']=$row['nivel3_inferior'];
                                $escala[2]['superior']=$row['nivel3_superior'];

                                $escala[3]['etiqueta']=$row['nivel3_etiqueta'];
                                $escala[3]['inferior']=$row['nivel3_inferior'];
                                $escala[3]['superior']=$row['nivel3_superior'];

                                $escala[4]['etiqueta']=$row['nivel4_etiqueta'];
                                $escala[4]['inferior']=$row['nivel4_inferior'];
                                $escala[4]['superior']=$row['nivel4_superior'];

                                $escala[5]['etiqueta']=$row['nivel5_etiqueta'];
                                $escala[5]['inferior']=$row['nivel5_inferior'];
                                $escala[5]['superior']=$row['nivel5_superior'];
                            }
                            while($row2 = mysqli_fetch_array($resultado2)){
                                /*Se obtienen las preguntas de acuerdo al evaluador, periodo y evaluado*/
                                $sql = "select da.aseveracion,pe.puntos from promedios_por_evaluado pe join preguntas p 
                                        on p.id = pe.id_pregunta
                                        join decalogos_aseveraciones da 
                                        on da.id = p.id_decalogo_aseveracion
                                        where pe.id_evaluador = $row2[id_evaluador] and pe.id_evaluado ='$id_evaluado' and pe.id_periodo ='$id_periodo';
                                        ";
                                $resultado3 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
                                echo "
                                    <h3>$row2[nombre] $row2[apellidos] / $row2[rol]</h3>
                                    
                                    
                                    <table class='table table - bordered' id='dataTable' width='100 % ' cellspacing='0'>
                                    
                                        <thead>
                                        
                                        <tr>
                                            <th>Pregunta</th>
                                            <th colspan='2'>Calificación</th>
                                        </tr>
                                        </thead> <tbody>
                                ";
                                while($row4 = mysqli_fetch_array($resultado3)){
                                    $suma +=$row4['puntos'];
                                    $cont++;
                                    echo "
                                       
                                        <tr>
                                             <tr>
                                                   <td>$row4[aseveracion]</td>
                                                   <td>$row4[puntos]</td>";
                                    foreach($escala as $e){
                                        if($row4['puntos'] >= $e['inferior'] && $row4['puntos'] <= $e['superior']){
                                            echo "
                                                                <td>$e[etiqueta]</td>
                                                            ";
                                            break;
                                        }
                                    }
                                    echo"
                                                        </tr> 
                                                        </tr>
                                                     ";


                                }
                                $promedio=$suma/$cont;
                                echo "</tbody>
                                        <tfoot>
                                            <tr style='background-color:#d6e5fa'>
                                                <td>Promedio</td>
                                                <td>$promedio</td>
                                           </tr>
                                        </tfoot>
                                        </table>
                                ";
                                $suma =0;
                                $cont=0;
                            };
                            ?>
                                </tbody>
                            </table>
                            <?php
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