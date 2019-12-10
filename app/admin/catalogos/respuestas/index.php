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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="borrar.js" type="text/javascript"></script>
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
                    Catálogo: Respuestas
                </div>
                <div class="card-body">
                    <input type="button" class="btn btn-primary mb-3" OnClick="location.href='nuevo.php'" value="Nueva"></input>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                            <tr>
                                <th>No.</th>
                                <th>Respuesta</th>
                                <th>Creación</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "select id,respuesta, creacion from respuestas order by id";
                            $stmt = $conexion->prepare($sql);
                            $stmt->execute();
                            $stmt->bind_result($id,$respuesta,$creacion);
                            $fila = 1;
                            $stmt->store_result();
                            while ($stmt->fetch()){
                            echo "<tr>";
                            echo "<td>$fila</td>";
                            echo "<td>$respuesta</td>";
                            echo "<td>$creacion</td>";
                            //$stmt->close();
                            ?>
                            <td>
                                <div class="row justify-content-center">
                                    <button type='button' class="btn btn-xs btn-light change" onclick="javascript:eliminar(<?=$id;?>);" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>
                                    <?php
                                    echo "</tr>";
                                    $fila++;
                                    }
                                    ?>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Última actualización

                    <?php

                    foreach ($conexion->query('select creacion from respuestas order by creacion desc limit 1') as $fecha){
                        echo $fecha['creacion'];
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!--Delete Modal -->
        <div id="delete" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Respuesta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            ¿Está seguro de que desea eliminar esta respuesta?
                            <input type="hidden" id="idrespuesta" value="0"/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" value="Eliminar" id="btn-eliminar">Si, eliminar</button>

                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>


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