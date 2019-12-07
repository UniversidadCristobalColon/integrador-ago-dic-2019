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
                    <!-- DIV CARD-HEADER -->
                    <div class="card-header">
                        <img src="../../../img/logo_ICAVE.png" alt="logo_ICAVE" height="40px">
                        <hr>
                        <i class="fas fa-tasks"></i>
                        Evaluación 360
                        <hr>
                        <!-- ROW -->
                        <small>
                            <b class="mr-1">Porcentaje completado:</b>
                            <!-- PROGRESS BAR -->
                            <div class="progress mx-auto" style="display: inline-flex; width: 100%;">
                                    <div class="progress-bar" role="progressbar" style="width: 
                                    <?php 
                                        if ( $porcentaje_completado == '0%' ) {
                                            echo '2.5%';
                                        } else {
                                            echo $porcentaje_completado;
                                        }
                                    ?>;">
                                        <?php echo $porcentaje_completado ?>
                                    </div>
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
                                    <b>Evaluando a: </b>
                                    <?php echo $nombre_evaluado ?>
                                </p>
                                <p>
                                    <b>Puesto: </b>
                                    <?php echo $puesto_evaluado ?>
                                </p>
                                <p>
                                    <b>Fecha de cierre: </b>
                                    <?php echo $evaluacion_fin ?>
                                </p>
                        </div>
                        <!-- DIV TEXT -->                        
                    </div>
                    <!-- DIV CARD-BODY -->
                    
                    <!-- DIV CARD-FOOTER -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <?php if( $texto_boton == 'Evaluación terminada' ): ?>
                                    <button class="btn btn-danger btn-block" disabled>
                                        <?php echo $texto_boton ?>
                                    </button>
                                <?php else: ?>
                                    <form action="cuestionario.php" method="get">
                                        <button class="btn btn-success btn-block" type="submit" name="id" value="<?php echo $hash_evaluacion?>">
                                            <?php echo $texto_boton ?>
                                        </button>
                                    </form>
                                <?php endif; ?>
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

