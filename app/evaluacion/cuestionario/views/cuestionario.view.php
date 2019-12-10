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
    <div id="wrapper">
        <div id="content-wrapper">
            <div class="container-fluid">
            <!-- VISTA HTML GET -->
            <?php if( $vista_html == true ): ?>
                <div class="container">
                    <!-- MOSTRAR O NO EL CUESTIONARIO -->
                    <?php
                        if ( $errores != '' ) {
                            echo '<div class="alert alert-danger" role="alert">
                                    '.$errores.'
                                </div>';
                            die();
                        }
                    ?>
                    <!-- MOSTRAR O NO EL CUESTIONARIO -->

                    <!-- DIV CARD -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <img src="../../../img/logo_ICAVE.png" alt="logo_ICAVE" height="40px">
                            <hr>
                            <i class="fas fa-tasks"></i>
                                <?php echo $nombre_cuestionario ?>
                            <hr>
                            <!-- ROW -->
                            <div class="row">
                                <div class="col-6">
                                    <small>
                                        <b class="mr-1">Evaluando a:</b>
                                        <?php
                                            echo $nombre_evaluado
                                        ?>
                                    </small>
                                    <br>
                                    <small>
                                        <b class="mr-1">Puesto:</b>
                                        <?php
                                            echo $puesto_evaluado
                                        ?>
                                    </small>
                                    <br>
                                    <small>
                                        <b class="mr-1">Fecha de cierre:</b>
                                        <?php
                                            echo $evaluacion_fin
                                        ?>
                                    </small>
                                </div>
                                <div class="col-6">
                                    <small>
                                        <b class="mr-1">Porcentaje completado:</b>
                                        <!-- PROGRESS BAR -->
                                        <div class="progress mx-auto" style="display: inline-flex; width: 100%;">
                                            <div class="progress-bar" role="progressbar" style="width: 
                                            <?php 
                                                if ( $porcentaje_completado == '0%' ) {
                                                    echo '5%';
                                                } else {
                                                    echo $porcentaje_completado;
                                                }
                                            ?>;">
                                                <?php echo $porcentaje_completado ?>
                                            </div>
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
                                <form  class="was-validated" action="<?php echo htmlspecialchars( htmlentities( $_SERVER['PHP_SELF'] ) ) ?>" method="POST">
                                    <?php echo $echo_pregunta ?>
                            </div>
                            <!-- CONTAINER -->
                        </div>
                        <!-- DIV CARD-BODY -->
                        
                        <!-- CARD FOOTER -->
                        <div class="card-footer small">
                            <!-- PAGINATION -->
                            <ul class="pagination justify-content-center mb-0">
                                <!-- PAGINACIÓN -->
                                <?php 
                                    for ($i=1; $i <= $total_paginas; $i++) { 
                                        if ( $i == $pagina_actual ) {
                                            echo "
                                             <li class='page-item active'>
                                                 <a class='page-link'>
                                                     $i
                                                 </a>
                                             </li>
                                            "; 
                                        } else {
                                            echo "
                                             <li class='page-item'>
                                                 <a class='page-link'>
                                                     $i
                                                 </a>
                                             </li>
                                            "; 
                                        }
                                    }
                                ?>
                                <!-- PAGINACIÓN -->
                            </ul>
                        </div>
                        <!-- CARD FOOTER -->
                    </div>
                    <!-- DIV CARD -->

                    <!-- BTN ENVIAR CUESTIONARIO -->
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary btn-block mb-3" type="submit" name="id_aplicacion" value="<?php echo $id_aplicacion ?>">
                                <?php
                                    if ( $pagina_actual == $total_paginas ) {
                                        echo 'Terminar evaluación';
                                    } else {
                                        echo 'Siguiente';
                                    }
                                ?>
                            </button>
                        </div>
                    </div>
                    <!-- BTN ENVIAR CUESTIONARIO -->

                    </form>
                    <!-- FORM -->
                </div>
            <?php endif; ?>
            <!-- VISTA HTML GET -->





            <!-- VISTA HTML POST -->
            <?php if( $vista_html == false ): ?>
                <div class="container">
                     <!-- DIV CARD -->
                     <div class="card mb-3">
                        <div class="card-header">
                            <img src="../../../img/logo_ICAVE.png" alt="logo_ICAVE" height="40px">
                        </div>

                        <!-- DIV CARD-BODY -->
                        <div class="card-body text-center">
                        <!-- MOSTRAR O NO VISTA POST -->
                        <?php
                            if ( $errores != '' ) {
                                echo '<div class="alert alert-danger" role="alert">
                                        '.$errores.'
                                    </div>';
                                echo '<a class="btn btn-secondary btn-block" href="?id='.$hash_evaluacion.'">
                                        Regresar    
                                    </a>';
                                die();
                            }
                        ?>
                            <!-- MOSTRAR O NO VISTA POST -->
                            <h2>¡Gracias por responder!</h2>
                            <h4>Su evaluación ha sido enviada con éxito</h4>
                        </div>
                        <!-- DIV CARD-BODY -->
                        
                    </div>
                    <!-- DIV CARD -->
                </div>
            <?php endif; ?>
                
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

    <?php getBottomIncudes( RUTA_INCLUDE ) ?>
    
    <script src="js/main.js"></script>
</body>

</html>
