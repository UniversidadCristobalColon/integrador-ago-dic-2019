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
                    Catálogo: Evaluaciones
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3">Nuevo</button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Evaluación</th>
                                <th>Periodo</th>
                                <th>Evaluado</th>
                                <th>Evaluadores</th>
                                <th>Status</th>
                                <th>Última actualización</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><?php echo "Evaluación Gerentes 2019" ?></td>
                                <td><?php echo "2019" ?></td>
                                <td><?php echo "Alejandra Fuentes" ?></td>
                                <td><?php echo "Persona1 <br> Persona 2 <br> Persona3 <br> Persona4" ?></td>
                                <td><?php echo "50%" ?></td>
                                <td><?php echo "07/11/2019 20:33:00" ?></td>
                                <td>Editar Eliminar</td>
                            </tr>
                            <tr>
                                <td><?php echo "Cuestionario para Jefes 2019" ?></td>
                                <td><?php echo "2019" ?></td>
                                <td><?php echo "Militzi Orozco" ?></td>
                                <td><?php echo "Persona1 <br> Persona 2 <br> Persona3 <br> Persona4" ?></td>
                                <td><?php echo "Sin iniciar" ?></td>
                                <td><?php echo "07/11/2019 20:33:00" ?></td>
                                <td>Editar Eliminar</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
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
    <i class="fas fa-angle-up"></i>\\
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>
