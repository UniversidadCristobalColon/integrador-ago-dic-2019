<?php
require_once '../../../../config/global.php';

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
                    Catálogo: Escalas
                </div>
                <div class="card-body">

                    <button class="btn btn-primary mb-3">Nuevo</button>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>nivel1_etiqueta</th>
                                <th>nivel1_descripcion</th>
                                <th>nivel1_inferior</th>
                                <th>nivel1_superior</th>
                                <th>nivel2_etiqueta</th>
                                <th>nivel2_descripcion</th>
                                <th>nivel2_inferior</th>
                                <th>nivel2_superior</th>
                                <th>nivel3_etiqueta</th>
                                <th>nivel3_descripcion</th>
                                <th>nivel3_inferior</th>
                                <th>nivel3_superior</th>
                                <th>nivel4_etiqueta</th>
                                <th>nivel4_descripcion</th>
                                <th>nivel4_inferior</th>
                                <th>nivel4_superior</th>
                                <th>nivel5_etiqueta</th>
                                <th>nivel5_descripcion</th>
                                <th>nivel5_inferior</th>
                                <th>nivel5_superior</th>
                                <th>creación</th>
                                <th>actualización</th>
                                <th>creacion_ip</th>
                                <th>actualizacion_ip</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>

                            </tr>
                            </tfoot>

                            <tbody>
                            <tr>
                                <td>A</td>
                                <td>B</td>
                                <td>C</td>
                                <td>D</td>
                                <td>E</td>
                                <td>F</td>
                                <td>G</td>
                                <td>H</td>
                                <td>I</td>
                                <td>J</td>
                                <td>K</td>
                                <td>L</td>
                                <td>M</td>
                                <td>N</td>
                                <td>Ñ</td>
                                <td>O</td>
                                <td>P</td>
                                <td>Q</td>
                                <td>R</td>
                                <td>S</td>
                                <td>2019/11/01</td>
                                <td>2019/11/02</td>
                                <td>127.0.0.0</td>
                                <td>127.0.0.0</td>
                                <td>Editar Eliminar</td>
                            </tr>
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
