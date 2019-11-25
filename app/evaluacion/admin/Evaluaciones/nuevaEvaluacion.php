<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

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
        /*$(function () {
            $("#F-inicio").datepicker({
                closeText: 'Cerrar',
                prevText: '<Ant',
                nextText: 'Sig>',
                currentText: 'Hoy',
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
            });
        });*/

        /*$(document).ready(function () {
            $('#F-inicio').datepicker();
            dateFormat = 'yy-m-d';
                inline = true;
                onselect = function (dateText, inst) {
                    var date = new Date(dateText);
                    alert(date.getDate() + date.getMonth() + date.getFullYear());
            }
        });*/

        $(document).ready(function () {
            $('#F-inicio').datepicker();
        });

        $(document).ready(function () {
            $('#F-fin').datepicker();
        });
    </script>
</head>

<body id="page-top">

<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Page Content -->
            <form action="guardar.php" method="post">
                <h1>Nueva Evaluación</h1>
                <hr>
                <div class="form-group">
                    <label for="Descripcion">Nombre de la evaluación:</label>
                    <input class="form-control mb-3" type="text" id="Descripcion" name="Descripcion">

                    <label for="Evaluar">Departamento:</label>  <!-- Evaluado -->
                    <select class="form-control mb-3" id="Departamento" name="Departamento">
                        <option selected disabled>Seleccione una opción</option>
                        <?php
                        $sql = "select * from departamentos";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[departamento]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Cuestionario">Cuestionario:</label>
                    <select class="form-control mb-3" id="Cuestionario" name="Cuestionario">
                        <option selected disabled>Seleccione una opción</option>
                        <?php
                        $sql = "select * from cuestionarios";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[cuestionario]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Periodo">Periodo:</label>
                    <select class="form-control mb-3" id="Periodo" name="Periodo">
                        <option selected disabled>Seleccione una opción</option>
                        <?php
                        $sql = "select * from periodos";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[periodo]</option>";
                            }
                        }
                        ?>
                    </select>


                    <div class="input-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label>Inicia:</label>
                                <div class="input-group date" id="F-inicio">
                                    <input type="text" class="form-control mb-3" name="Inicio" id="Inicio" readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label>Termina:</label>
                                <div class="input-group date" id="F-fin">
                                    <input type="text" class="form-control mb-3" name="Fin" id="Fin" readonly><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Continuar</button>
                </div>

            </form>


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
