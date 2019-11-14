<?php
require_once '../../../../config/global.php';
require '../../../../config/db.php';
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
                    Catálogo: Preguntas
                </div>
                <div class="card-body">
                    <input type="button" class="btn btn-primary mb-3" OnClick="location.href='nuevo.php'" value="Nuevo"></input>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Preguntas</th>
                                <th>Orden</th>
                                <th>Tipo</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "select id, pregunta, orden, tipo, actualizacion from preguntas order by id";
                            $stmt = $conexion->prepare($sql);
                            $stmt->execute();
                            $stmt->bind_result($id,$pregunta,$orden,$tipo,$actualizacion);
                            $fila = 1;
                            while ($stmt->fetch()){
                            echo "<tr>";
                            echo "<td>$fila</td>";
                            echo "<td>$pregunta</td>";
                            echo"<td>$orden</td>";
                            if($tipo=='M'){
                                $tipoC ="Opción Múltiple";
                            }else {
                                $tipoC ="Abierta";
                            }
                            echo"<td>$tipoC</td>";
                            echo"<td>$actualizacion</td>";
                            ?>
                            <td><a href="editar.php"><i class="fas fa-edit"></i></a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModalLong">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <?php
                                echo "</tr>";
                                $fila++;
                                }

                                ?>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Pregunta</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Está seguro de que desea eliminar esta pregunta?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-danger">Si, eliminar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            </tr>

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