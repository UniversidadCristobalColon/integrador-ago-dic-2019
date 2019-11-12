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
                    <!-- DIV CARD-HEADER -->
                    <div class="card-header">
                        <i class="fas fa-tasks"></i>
                        Evaluación 360
                        <hr>
                        <!-- ROW -->
                        <small>
                            <b class="mr-1">Porcentaje completado:</b>
                            <!-- PROGRESS BAR -->
                            <div class="progress mx-auto" style="display: inline-flex; width: 100%;">
                                    <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                            </div>
                        </small>
                        <!-- ROW -->
                    </div>
                    <!-- DIV CARD-HEADER -->

                    <!-- DIV CARD-BODY -->
                    <div class="card-body">
    
                        <!-- DIV TEXT -->
                        <div class="px-1 text-justify">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eos rem quis incidunt voluptate fugiat molestias! Dolorem tenetur ducimus, vitae porro hic voluptatibus cupiditate libero quam facilis quisquam ea corporis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi eos rem quis incidunt voluptate fugiat molestias! Dolorem tenetur ducimus, vitae porro hic voluptatibus cupiditate libero quam facilis quisquam ea corporis.</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aliquid, dolorum quod natus fugiat nostrum amet earum a velit ratione ab iure temporibus quibusdam hic mollitia excepturi. Magnam, distinctio vero.</p>

                            <p>
                                <b>Evaluando a: </b>Roberto López López
                            </p>
                            <p>
                                <b>Fecha de cierre: </b>27/Noviembre/2019 16:00 hrs.
                            </p>
                        </div>
                        <!-- DIV TEXT -->                        
                    </div>
                    <!-- DIV CARD-BODY -->
                    
                    <!-- DIV CARD-FOOTER -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href="cuestionario.php" class="btn btn-secondary btn-block">
                                    Reanudar evaluación
                                </a>
                            </div>
                            <div class="col">
                                <a href="cuestionario.php" class="btn btn-primary btn-block">
                                    Comenzar evaluación
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- DIV CARD-FOOTER -->
                </div>
                <!-- DIV CARD-BODY -->
            </div>
            <!-- DIV CARD -->
            

        </div>
        <!-- /.container-fluid -->
        
        <?php //getFooter() ?>
        
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
