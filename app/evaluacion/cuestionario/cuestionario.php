<?php

/*
TODO:
    - Mostrar a quien se está evaluando.
    - Contar con una fecha y hora de caducidad.
    - Mostrar en una o más páginas las preguntas a responder (paginación).
    - Mostrar al evaluador el porcentaje o información sobre su avance.
    - Validar que sean respondidas aquellas preguntas que sean obligatorias.
    - Guardar las respuestas que el evaluador ha registrado.
    - Permitir reanudar en otro momento al evaluador.
    - Validar que solo se ha contestada una vez.
    - Permitir desactivarla/cancelarla para prevenir sea respondida.
*/


require_once '../../../config/global.php';

define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
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

<?php //getNavbar() ?>

<div id="wrapper">

    <?php //getSidebar() ?>

    <div id="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <!-- DIV CARD -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>
                        Cuestionario
                        <hr>
                        <!-- ROW -->
                        <div class="row">
                            <div class="col-6">
                                <small><b class="mr-1">Evaluando a:</b>Roberto López López</small>
                                <br>
                                <small><b class="mr-1">Fecha de cierre:</b>27/Noviembre/2019 16:00 hrs.</small>
                            </div>
                            <div class="col-6">
                                <small>
                                    <b class="mr-1">Porcentaje completado:</b>
                                    <!-- PROGRESS BAR -->
                                    <div class="progress mx-auto" style="display: inline-flex; width: 100%;">
                                        <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                    </div>
                                </small>
                            </div>
                        </div> 
                        <!-- ROW -->
                    </div>

                    <!-- DIV CARD-BODY -->
                    <div class="card-body">
                        <!-- CONTAINER -->
                        <div class="container">
                            <!-- FORM -->
                            <form action="">
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <p>1. ¿Lorem ipsum dolor, sit amet consectetur adipisicing elit?</p>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                        <label class="form-check-label" for="exampleRadios1">
                                            Bueno
                                        </label>
                                    </div>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            Regular
                                        </label>
                                    </div>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3">
                                        <label class="form-check-label" for="exampleRadios3">
                                            Malo
                                        </label>
                                    </div>
                                </div> 
                                <!-- PREGUNTA -->
                                <hr>
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <p>2. ¿Lorem ipsum dolor, sit amet consectetur adipisicing elit sit amet consectetur?</p>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios11" value="option1">
                                        <label class="form-check-label" for="exampleRadios11">
                                            Bueno
                                        </label>
                                    </div>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios22" value="option2">
                                        <label class="form-check-label" for="exampleRadios22">
                                            Regular
                                        </label>
                                    </div>
                                    <div class="form-check ml-4 mr-4">
                                        <input class="form-check-input" type="radio" name="exampleRadios2" id="exampleRadios33" value="option3">
                                        <label class="form-check-label" for="exampleRadios33">
                                            Malo
                                        </label>
                                    </div>
                                    <div class="text-danger">
                                        <small>*Debes responder esta pregunta obligatoriamente.</small>
                                    </div>
                                </div> 
                                <!-- PREGUNTA -->
                                <hr>
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <label for="inlineFormCustomSelect">
                                        3. ¿Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem unde at sit temporibus ipsa eius cumque minus magnam harum?
                                    </label>
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Elige una opción...</option>
                                        <option value="1">Una vez</option>
                                        <option value="2">Dos o más veces</option>
                                        <option value="3">Más de tres veces</option>
                                    </select>
                                </div>
                                <!-- PREGUNTA -->
                                <hr>
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <label for="customRange3">
                                        4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, aliquid quod nobis nulla.
                                    </label>
                                    <div class="row">
                                        <div class="col text-left">0</div>
                                        <div class="col text-right">5</div>
                                    </div>
                                    <input type="range" class="custom-range" min="0" max="5" step="1" value="0" id="customRange3" onchange="updateTextInput(this.value)">
                                    <p class="text-center text-primary" id="customRange3Placeholder">0</p>
                                </div>
                                <script>
                                function updateTextInput(val) {
                                    document.getElementById('customRange3Placeholder').innerHTML=val;
                                }
                                </script>
                                <!-- PREGUNTA -->
                                <hr>
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <p>5. Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit doloribus quis quibusdam, quas amet totam, veniam omnis nostrum placeat error.</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            Opción 1
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                        <label class="form-check-label" for="defaultCheck2">
                                            Opción 2
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                        <label class="form-check-label" for="defaultCheck3">
                                            Opción 3
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                        <label class="form-check-label" for="defaultCheck4">
                                            Opción 4
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                        <label class="form-check-label" for="defaultCheck5">
                                            Opción 5
                                        </label>
                                    </div>
                                </div>
                                <!-- PREGUNTA -->
                                <hr>
                                <!-- PREGUNTA -->
                                <div class="form-group pt-3 pb-3">
                                    <label for="formGroupExampleInput">
                                        6. Lorem ipsum, dolor sit amet consectetur adipisicing elit:
                                    </label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Comentarios">
                                </div>
                                <!-- PREGUNTA -->
                            </form>
                            <!-- FORM -->
                        </div>
                        <!-- CONTAINER -->
                    </div>
                    <!-- DIV CARD-BODY -->
                    
                    <!-- CARD FOOTER -->
                    <div class="card-footer small">
                        <!-- PAGINATION -->
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">Siguiente</a>
                            </li>
                        </ul>
                    </div>
                    <!-- CARD FOOTER -->
                </div>
                <!-- DIV CARD -->

                <!-- BTN ENVIAR CUESTIONARIO -->
                <div class="row">
                    <div class="col-md-4">
                        <a href="" class="btn btn-secondary btn-block">
                        Guardar respuestas
                        </a>
                    </div>
                    <div class="col-md-8">
                        <a href="" class="btn btn-primary btn-block">
                        Enviar cuestionario
                        </a>
                    </div>
                </div>
                <!-- BTN ENVIAR CUESTIONARIO -->

            </div>
            
        </div>
        <!-- /.container-fluid -->
        
        <!-- ADD MARGIN FOOTER -->
        <div class="mt-5">
            <?php getFooter() ?>
        </div>
        <!-- ADD MARGIN FOOTER -->
        
        <!-- FOOTER STYLE -->
        <style>
            .sticky-footer {
                width: 100% !important;
            }
        </style>
        <!-- FOOTER STYLE -->
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
