<?php
require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';

$id_evaluado=$_POST['id_evaluado'];
$id_periodo=$_POST['id_periodo'];;
$suma=0;
$cont=0;

$sql = "select distinct pe.id_evaluador,e.nombre,e.apellidos,r.rol from promedios_por_evaluado pe join empleados e
on e.id = pe.id_evaluador
join roles r on pe.id_rol_evaluador = r.id
where id_evaluado='$id_evaluado' and id_periodo ='$id_periodo'";
$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

if (mysqli_num_rows($resultado2)==0) {
    header("Location: busquedaerronea.php");
}

$sql = "select * from empleados";
$resselempleado = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$sql = "select * from periodos";
$resselperiodo = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$sql = "select * from escalas ";
$resesacalas = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$cont2=0;

//$sql = "";

    /*$escala[0]["etiqueta"] = 'malo'
    $escala[0]["inferior"] = 0
    $escala[0]["superior"] = 1

    $escala[1]["etiqueta"] = 'medio'
    $escala[1]["inferior"] = 1
    $escala[1]["superior"] = 2

    $escala[2]["etiqueta"] = 'alto'
    $escala[2]["inferior"] = 2
    $escala[2]["superior"] = 3*/
    $escala = array();
    $puntos = 1;
    $calificacion = calcularNivelEscala($puntos);
    function calcularNivelEscala($puntos){
        global $db, $escala;
        $etiqueta = '';
        foreach($escala as $e){
            if($puntos >= $e['inferior'] && $puntos <= $e['superior']){
                $etiqueta = $e['etiqueta'];
                break;
            }
        }
    return $etiqueta;
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
</head>

<body id="page-top">



<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- DataTables Example -->

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Resultados de busqueda
                </div>
                <div class="card-body">

                    <form method="POST">
                        <select name='id_evaluado' class="chosen-select">
                            <option>Seleccione un empleado</option>
                            <?php
                            while($row = mysqli_fetch_array($resselempleado)){
                                echo"
                                        <option value='$row[id]'>$row[nombre]</option>
                                    ";
                            }
                            ?>
                        </select>

                        <select name='id_periodo' class="chosen-select">
                            <option>Seleccione un periodo</option>
                            <?php
                            while($row = mysqli_fetch_array($resselperiodo)){
                                echo"
                                    <option value='$row[id]'>$row[periodo]</option>
                                    ";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary" formaction="busqueda.php">Buscar</button>
                    </form>

                    <form method="POST" >
                        <button type="submit" class="btn btn-primary" formaction="generarexcel.php">Generar Excel</button>
                    </form>


                    <?php
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
                                    where pe.id_evaluador = $row2[id_evaluador]
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



                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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




<!--<script type="text/javascript" src="../../../vendor/chosen/chosen.jquery.js"></script>-->
<?php getBottomIncudes( RUTA_INCLUDE ) ?>
<link rel="stylesheet" href="../../../vendor/chosen/chosen.css" type="text/css" />
<script src="../../../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../../../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="../../../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="../../../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".chosen").chosen();
    });
</script>


</body>

</html>


