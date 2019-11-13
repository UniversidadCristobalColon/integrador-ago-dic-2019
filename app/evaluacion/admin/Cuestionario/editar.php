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
                    Editor de Cuestionario
                </div>
                <div class="card-body">
                    <!-- Menu para definir mi cuestionario -->
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nuevo Cuestionario">
                        </div>
                        <!-- en este boton debe ir mi modal -->
                        <button type="button" class="btn btn-primary mb-3">Agregar Preguntas</button>
                        <!-- ****************************** -->
                        <button type="button" class="btn btn-primary mb-3">Borrar Cuestionario</button>
                    </form>
                    <!-- **********************************************-->
                    <!-- Tabla donde muestro mis preguntas -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Pregunta</th>

                            </tr>
                            </thead>                            
                            <tbody>
                            <tr>
                                <td>Pregunta 1</td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- ******************************************************** -->

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

<!-- Div para mi ventana MODAL -->



<!-- ****************************** -->
</body>

</html>
