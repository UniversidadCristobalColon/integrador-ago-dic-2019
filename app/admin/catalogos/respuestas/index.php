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
                    Catálogo: Respuestas
                </div>
                <div class="card-body">
                    <input type="button" class="btn btn-primary mb-3" OnClick="location.href='nuevo.php'" value="Nuevo"></input>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Respuestas</th>
                                <th>Puntos</th>
                                <th>Orden</th>
                                <th>Creación</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>

                            <tr>
                                <td>Respuesta 1</td>
                                <td>4</td>
                                <td>1</td>
                                <td>11-11-19 22:32</td>
                                <td><a href="editar.php">Editar</a> <a href="nuevo.php">Eliminar</a></td>
                            </tr>
                            <tfoot>
                            </tfoot>
                            <tbody>
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