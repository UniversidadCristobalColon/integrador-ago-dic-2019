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

    <script>
        function eliminar(id){
            var respuesta=confirm('¿Está seguro de que desea eliminar este cuestionario?');
            if(respuesta===true){
                    window.location='deshabilitar.php?id='+id;
            }
        }

    </script>

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

                            <tbody>
                            <?php
                            }
                            while($row = $resultado -> fetch_assoc()) { //esto es para recorrer toda la tabla de mysql
                                ?>
                                <tr>
                                    <?php $id = $row['id'] ?>
                                    <td><?php echo $row['cuestionario'] ?></td>
                                    <td><?php echo $row['creacion'] ?></td>
                                    <td><?php echo $row['actualizacion'] ?></td>
                                    <td>
                                        <a href="index.php"><i class="fas fa-edit"></i></a>
                                        <a href="#" onclick="eliminar(<?php echo $id ?>)"><i class="fa fa-trash" > </i></a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>


                        <!-- Modal -->
                        <div class="modal fade" id="desc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Cuestionario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                         <?php echo $id ?>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">
                                            Sí, eliminar</button>
                                    </div>

                                </div>
                            </div>
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
    <i class="fas fa-angle-up"></i>
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>