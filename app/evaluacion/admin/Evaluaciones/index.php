<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
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
                    Catalogo: Evaluaciones
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3">Nuevo</button>
                    <div class="table-responsive">
                        <?php
                        $sql = "SELECT cues.cuestionario, per.periodo, eval.estado, eval.actualizacion 
                                FROM `evaluaciones` eval 
                                left join cuestionarios cues 
                                    ON cues.id = eval.id_cuestionario 
                                left join periodos per 
                                    ON per.id = eval.id_periodo ";
                        $resultado = $conexion -> query($sql);
                        if($resultado)    {
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Cuestionario</th>
                                <th>Periodo</th>
                                <th>Evaluado</th>
                                <th>Evaluador</th>
                                <th>Status</th>
                                <th>Última actualización</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>

                            </tfoot>
                            <tbody>
                            <?php
                            }
                            while($row = $resultado -> fetch_assoc()) { //con esto es para recorrer toda la tabla de mysql
                                ?>
                                <tr>
                                    <td><?php echo utf8_encode($row['cuestionario']) ?></td>
                                    <td><?php echo utf8_encode($row['periodo']) ?></td>
                                    <td><?php echo utf8_encode($row['evaluado']) ?></td>
                                    <td><?php echo utf8_encode($row['evaluador']) ?></td>
                                    <td><?php echo utf8_encode($row['estado']) ?></td>
                                    <td><?php echo utf8_encode($row['actualizacion']) ?></td>
                                    <td><a href=""><i class="fas fa-edit"></i></a> <a href=""><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
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