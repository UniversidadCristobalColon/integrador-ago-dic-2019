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
                    <i class="fas fa-bell"></i>
                    &nbsp;
                    Notificaciones
                </div>
                <div class="card-body">
                    <?php echo $html_notificaciones ?>
                </div>
                <div class="card-footer small">
                <nav aria-label="...">
                    <ul class="pagination my-0 justify-content-center flex-wrap">
                        
                        <!-- Si la página es la primera mostrar Anterior como disabled -->
                        <?php if( $pagina_actual == 1 ): ?>
                            <li class="page-item disabled">
                                <a class="page-link">Anterior</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?php echo $pagina_actual - 1 ?>">Anterior</a>
                            </li>
                        <?php endif; ?>

                        <?php
                            for ( $i = $pagina_actual-2; $i <= $pagina_actual+2; $i++ ) {
                                // Si es la página 1 no mostrar paginación menor a 1
                                if ( $i < 1 ) {
                                    continue;
                                }
                                // Si la página es la final, no mostrar más paginación
                                if ( $i == $numero_paginas-2 ) {
                                    break;
                                }
                                // Si $i es igual a la $pagina_actual agregar clase active, sino mostrar el <li> normal
                                if ( $i == $pagina_actual ) {
                                    echo '
                                    <li class="page-item active">
                                        <a class="page-link">
                                            '.$i.'
                                        </a>
                                    </li>';
                                } else {
                                    echo '
                                    <li class="page-item">
                                        <a class="page-link" href="?pagina='.$i.'">
                                            '.$i.'
                                        </a>
                                    </li>';
                                }
                            }
                        ?>

                        <!-- Si la página es la final mostrar Siguiente como disabled -->
                        <?php if( $pagina_actual == $numero_paginas ): ?>
                            <li class="page-item disabled">
                                <a class="page-link">Siguiente</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="?pagina=<?php echo $pagina_actual + 1 ?>" >Siguiente</a>
                            </li>
                        <?php endif; ?>   
                    </ul>
                </nav>
                </div>
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
