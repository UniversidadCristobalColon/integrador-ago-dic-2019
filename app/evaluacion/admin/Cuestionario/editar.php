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
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalLong">
                            Agregar Pregunta
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Selección de Preguntas</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <table>

                                            <tr>
                                                <td>Pregunta 1</td>

                                                <td>
                                                    <div class="form-check form-check-inline ml-5">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Seleccionar</label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mt-3 ml-3" id="exampleFormControlInput1" placeholder="Posición">
                                                    </div>

                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Pregunta 2</td>

                                                <td>
                                                    <div class="form-check form-check-inline ml-5">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Seleccionar</label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mt-3 ml-3" id="exampleFormControlInput1" placeholder="Posición">
                                                    </div>

                                                </td>

                                            </tr>

                                            <tr>
                                                <td>Pregunta 3</td>

                                                <td>
                                                    <div class="form-check form-check-inline ml-5">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                        <label class="form-check-label" for="inlineCheckbox1">Seleccionar</label>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control mt-3 ml-3" id="exampleFormControlInput1" placeholder="Posición">
                                                    </div>

                                                </td>

                                            </tr>

                                        </table>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
