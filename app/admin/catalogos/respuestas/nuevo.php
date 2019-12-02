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
                    Catálogo: Agregar Respuesta
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form>
                            <div class="form-group">
                                <label for="resp">Respuesta</label>
                                <input type="resp" class="form-control" id="resp1">
                            </div>
                            <div class="form-group">
                                <label for="tipo">Puntos</label>
                                <select class="form-control" id="tipopreg">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orden">Orden</label>
                                <select class="form-control" id="orden">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example">Example textarea</label>
                                <textarea class="form-control" id="example" rows="3"></textarea>
                            </div>
                            <div>
                                <input type="button" class="btn btn-primary mb-3" OnClick="location.href='index.php'" value="Guardar"></input>
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