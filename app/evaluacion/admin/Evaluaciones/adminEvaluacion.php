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
    <script src="../../../../vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../../../../vendor/datepicker/css/bootstrap-datepicker.standalone.min.css">

    <script>
        $(document).ready(function () {
            $('F-inicio').datepicker();
        })
    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Page Content -->
            <h1>Administración de Evaluaciones</h1>
            <hr>

            <label>Cuestionario:</label>
            <select name="Cuestionario" id="Cuestionario">
                <option value="1">C1</option>
                <option value="2">C2</option>
                <option value="3">C3</option>
            </select>
            <br>

            <label>Puesto:</label>
            <select name="Puesto" id="Puesto">
                <option value="1">P1</option>
                <option value="2">P2</option>
                <option value="3">P3</option>
            </select>
            <br>

            <label>Periodo:</label>
            <select name="Periodo" id="Periodo">
                <option value="1">T1</option>
                <option value="2">T2</option>
                <option value="3">T3</option>
            </select>
            <br>

            <label>Inicia:</label>
            <div class="input-group date" id="F-inicio">
                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
            <label>Termina:</label>
            <input id="datepicker" width="276" value="02/04/2018"/>
            <br>

            <label>Personal a evaluar:</label>
            <select name="Evaluar" id="Evaluar">
                <option value="1">E1</option>
                <option value="2">E2</option>
                <option value="3">E3</option>
            </select>
            <br>

            <label>Personal evaluador:</label>
            <select name="Evaluador" id="Evaluador">
                <option value="1">Ev1</option>
                <option value="2">Ev2</option>
                <option value="3">Ev3</option>
            </select>
            <br>

            <label>Nivel de avance:</label>
            <label>50%</label>
            <br>

            <button class="btn btn-success">Envio / Reenvio</button>
            <br><br>

            <button class="btn btn-primary">Cálculo de promedio</button>
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
