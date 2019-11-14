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

            <!-- Page Content -->
            <h1>Nueva Evaluación</h1>
            <hr>
            <div >
                <label>Evaluar a:</label>
                <select name="Evaluado" id="Evaluado" class="form-control mb-3 col-2">
                    <option value="">E1</option>
                    <option value="">E2</option>
                    <option value="">E3</option>
                </select>
                <p>Evaluan a:</p>
                <select name="Evaluadores" id="Evaluadores" class="form-control mb-3 col-2">
                    <option value="">Ev1</option>
                    <option value="">Ev2</option>
                    <option value="">Ev3</option>
                </select>
                <a href="adminEvaluacion.php"><input type="button" class="btn btn-success" value="Continuar"></a>
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
