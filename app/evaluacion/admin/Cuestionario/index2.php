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
                    Catalogo: Cuestionarios
                </div>
                <div class="card-body">
                    <a href="index.php"><button class="btn btn-primary mb-3">Nuevo</button></a>

                    <form action="deshabilitar.php" method="POST">
                    <div class="table-responsive">
                        <?php
                        $sql = "SELECT * FROM cuestionarios ";

                        $resultado = $conexion -> query($sql);
                        if($resultado)    {
                        ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Cuestionario</th>
                                <th>Creacion</th>
                                <th>Actualizacion</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>

                            </tfoot>
                            <tbody>
                            <?php
                            }
                            while($row = $resultado -> fetch_assoc()) { //con esto es para recorrer toda la tabla de mysql
                                ?>
                                <tr>
                                    <?php echo $id = $row['id'] ?>
                                    <td><?php echo $row['cuestionario'] ?></td>
                                    <td><?php echo $row['creacion'] ?></td>
                                    <td><?php echo $row['actualizacion'] ?></td>
                                    <td><a href="index.php"><i class="fas fa-edit"></i></a>

                                        <a href="deshabilitar.php?id=<?php echo $id ?>" ><button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
                                            <i class="fa fa-trash"></i>
                                        </button></a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Cuestionario</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Está seguro de que desea eliminar este cuestionario?
                                                    </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-danger">
                                                                Sí, eliminar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </tr>
                                <?php
                            }
                            ?>

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

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>