<?php
require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';

$id_eval='9';
$id_periodo='2';



$sql = "select * from promedios_por_evaluado where id_evaluado='$id_eval' and id_periodo ='$id_periodo'";
$resultado = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
global $suma;
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
                    Catálogo: Competencias
                </div>
                <div class="card-body">
                    <form method="POST">
                        <button type="submit" class="btn btn-primary" formaction="generarexcel.php">Generar archivo Excel</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pregunta</th>
                                <th>Calificación</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_array($resultado)){
                                        $sql ="select * from preguntas where id='$row[id_preguntas]'";
                                        $resultado2 = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
                                        while($row2 = mysqli_fetch_array($resultado2)){
                                            echo "
                                                <tr>
                                                    <td>$row[id]</td>
                                                    <td>$row2[pregunta]</td>
                                                    <td>$row[puntos]</td>
                                                </tr>
                                            ";
                                        };
                                        $suma+=$row['puntos'];
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td>Promedio</td>
                                    <td><?php echo $suma;?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>

