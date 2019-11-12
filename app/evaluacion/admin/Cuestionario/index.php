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
                    Cuestionario
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Tipo de Respuesta</th>
                                <th>Competencia</th>
                                <th>Agregar</th>

                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>Pregunta 1</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 2</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 3</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 4</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 5</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 6</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 7</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 8</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 9</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 10</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 11</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            <tr>
                                <td>Pregunta 12</td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Escala</option>
                                        <option value="2">Si o No</option>
                                        <option value="3">Abierta</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Trabajo en equipo</option>
                                        <option value="2">Organización</option>
                                        <option value="3">Habilidad para tomar decisiones</option>
                                    </select>

                                </td>
                                <td>
                                    <input class="form-check-input ml-5" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                </td>

                            </tr>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary mb-3">Guardar Cuestionario</button>
                        <button type="button" class="btn btn-primary mb-3">Cargar Preguntas</button>
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
