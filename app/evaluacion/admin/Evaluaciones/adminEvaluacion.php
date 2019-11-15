<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$Evaluado = $_GET['id_evaluado'];
$Evaluador = $_GET['id_evaluador'];
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
            $('#F-inicio').datepicker();
        })
        $(document).ready(function () {
            $('#F-fin').datepicker();
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
            <form action="actualizar.php" method="post">
                <button class="btn btn-success mb-3" type="submit">Guardar</button>

                <button class="btn btn-success mb-3">Envio</button>

                <button class="btn btn-info mb-3">Cálculo de promedio</button>

                <div class="form-group">
                    <div class="input-group mb-3 mt-3 col-3">
                        <div class="row">
                            <div class="col">
                                <label>Inicia:</label>
                                <div class="input-group date" id="F-inicio">
                                    <input type="text" class="form-control mb-3"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                            <div class="col">
                                <label>Termina:</label>
                                <div class="input-group date" id="F-fin">
                                    <input type="text" class="form-control mb-3"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3 col-3">
                        <p>Personal a evaluar</p>

                        <!-- modal -->

                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">
                            Agregar
                        </button>
                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lista de personal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-check">
                                        <?php
                                        $sql = "select * from empleados";
                                        $resultado = mysqli_query($conexion,$sql);
                                        if($resultado){
                                            while($fila = mysqli_fetch_assoc($resultado)){
                                                echo "<div class='form-check'>
                                            <input class='form-check-input' type='checkbox' value='$fila[id]' id='$fila[id]' name='empleado[]'>
                                            <label class='form-check-label' for='$fila[id]'>
                                            $fila[nombre] $fila[apellidos]
                                            </label>
                                            </div>";
                                            }
                                        }
                                        ?>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3 col-3">
                        <p>Personal evaluador</p>

                        <!-- modal -->
                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#exampleModal">
                            Agregar
                        </button>
                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lista de personal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Personal 1">
                                        <label class="form-check-label" for="Personal 1">
                                            Persona 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Personal 2">
                                        <label class="form-check-label" for="Personal 2">
                                            Persona 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="Personal 3">
                                        <label class="form-check-label" for="Personal 3">
                                            Persona 3
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guerdar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal -->

                    <p>Progreso:</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 18%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">18%</div>
                    </div>
                    <br>
            </form>

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
