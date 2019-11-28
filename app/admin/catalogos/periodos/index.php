<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
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
                    Catálogo: Periodos
                </div>

                <div class="card-body">
                    <form method="POST" action="agregarPeriodo.php">
                        <button class="btn btn-primary mb-3" title="Agrega un nuevo registro" type="submit">Nuevo</button>
                    </form>


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">Periodo</th>
                                <th class="text-center">Creación</th>
                                <th class="text-center">Actualización</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <!--
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </tfoot>
                            -->
                            <tbody>

                            <?php foreach ($conexion->query('SELECT * from periodos') as $row){  ?>
                                <tr>
                                    <td align="center"><?php echo $row ['periodo']?></td>
                                    <td align="center"><?php echo $row['creacion'] ?></td>
                                    <td align="center"><?php echo $row['actualizacion'] ?></td>
                                    <td class="text-center"><a href="editarPeriodo.php" style="color: black;"><i class="fas fa-edit" title="Modificar registro" title="submit"></i></a>&ensp;
                                        <a href="eliminarPeriodo.php" style="color: black;"><i class="fas fa-trash" title="Eliminar registro" type="submit"></i></a></td>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                            </tbody>
                        </table>
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

<?php getModalLogout();  getBottomIncudes( RUTA_INCLUDE ); ?>

</body>
</html>