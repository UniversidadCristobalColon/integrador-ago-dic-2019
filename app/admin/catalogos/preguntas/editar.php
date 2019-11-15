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
                    Editar pregunta
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <form>
                            <div class="form-group">
                                <label for="orden">Decálogo</label>
                                <select class="form-control" id="orden">
                                    <option></option>
                                    <option>Liderazgo 2019</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orden">Aseveración</label>
                                <select class="form-control" id="orden">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pregunta">Pregunta</label>
                                <input type="pregunta" class="form-control" id="pregunta1">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de pregunta</label>
                                <select class="form-control" id="tipopreg">
                                    <option>Opción Múltiple</option>
                                    <option>Abierta</option>
                                </select>
                            </div>
                            <div>
                                <input type="button" class="btn btn-primary mb-3" OnClick="location.href='index.php'" value="Actualizar"></input>
                                <input type="button" class="btn btn-secondary mb-3" OnClick="location.href='index.php'" value="Cancelar"></input>
                            </div>
                        </form>
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