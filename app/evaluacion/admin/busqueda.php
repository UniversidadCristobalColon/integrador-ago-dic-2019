<?php
require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';

$id_evaluado=$_POST['id_evaluado'];
$id_periodo=$_POST['id_periodo'];;
$suma=0;
$cont=0;

$sql = "select distinct pe.id_evaluador,e.nombre from promedios_por_evaluado pe join empleados e
on e.id = pe.id_evaluador
where id_evaluado='$id_evaluado' and id_periodo ='$id_periodo'";
$resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

if (mysqli_num_rows($resultado2)==0) {
    header("Location: busquedaerronea.php");
}

$sql = "select * from empleados";
$resselempleado = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$sql = "select * from periodos";
$resselperiodo = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));



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
                            <?php
                            while($row = mysqli_fetch_array($resselperiodo)){
                                echo"
                                    <option value='$row[id]'>$row[periodo]</option>
                                    ";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary" formaction="busqueda.php">Empezar busqueda</button>
                    </form>


                    <?php
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
                                
                                <table class='table table - bordered' id='dataTable' width='100 % ' cellspacing='0'>
                                <h3>Respuestas de: $row2[nombre]</h3>
                                    <thead>
                                    
                                    <tr>
                                        <th>Pregunta</th>
                                        <th>Calificación</th>
                                    </tr>
                                    </thead>
                            ";
                                while($row4 = mysqli_fetch_array($resultado3)){
                                    $suma +=$row4['puntos'];
                                    $cont++;
                                    echo "
                                    <tbody>
                                    <tr>
                                         <tr>
                                               <td>$row4[aseveracion]</td>
                                               <td>$row4[puntos]</td>
                                          </tr>
                                    </tr>
                                    </tbody>
                                ";
                                }
                                $promedio=$suma/$cont;
                            echo "
                                    <tfoot>
                                        <tr style='background-color:#d6e5fa'>
                                            <td>Promedio</td>
                                            <td>$promedio</td>
                                       </tr>
                                    </tfoot>
                            ";
                            $suma =0;
                            $cont=0;
                        };
                        ?>


                    </table>
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


