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

    <?php getTopIncludes(RUTA_INCLUDE) ?>
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
                    Catálogo: Decálogos
                </div>
                <div class="card-body">

                    <div class="row ml-auto mb-3">

                        <button onclick="location.href='nuevo.php'" type="button" class="btn btn-primary">
                            Nuevo
                        </button>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Decálogo</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th hidden>id_escala</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $sql = "SELECT id, decalogo, creacion, actualizacion, id_escala, status FROM decalogos";
                            $resultado = mysqli_query($conexion, $sql);
                            ?>
                            <?php if ($resultado): ?>
                                <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
                                    <tr>
                                        <td><?php echo $fila['decalogo'] ?></td>
                                        <td><?php echo $fila['creacion'] ?></td>
                                        <td><?php echo $fila['actualizacion'] ?></td>
                                        <td hidden><?php echo $fila['id_escala'] ?></td>
                                        <td>
                                            <?php if ($fila['status'] == 'A') {
                                                echo 'Activo';
                                            } elseif ($fila['status'] == 'B') {
                                                echo 'Inactivo';
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <form name="f-ed" action="editar.php" method="post"
                                                  style="display: inline-block">
                                                <button
                                                        type="submit" title="Editar registro"
                                                        name="b-edit"
                                                        value="<?php echo $fila['id'] ?>"
                                                        class="btn btn-xs btn-light">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                            </form>
                                            <form name="f-cb" action="cambiar.php" method="post"
                                                  style="display: inline-block">
                                                <button
                                                        type="submit" title="Cambiar estado"
                                                        name="b-camb"
                                                        value="<?php echo $fila['id'] ?>"
                                                        class="btn btn-xs btn-light">
                                                    <i class="fas fa-exchange-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else:
                                echo "ERROR";
                            endif; ?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Última actualización
                    <?php
                    foreach ($conexion->query('SELECT actualizacion from decalogos order by actualizacion desc limit 1') as $fecha) {
                        echo $fecha['actualizacion'];
                    }
                    ?>
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
<?php getBottomIncudes(RUTA_INCLUDE) ?>
</body>

</html>
