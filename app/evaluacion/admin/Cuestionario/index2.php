<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';

    $select = "select * from cuestionarios";
    $resultado = mysqli_query($conexion, $select);

    if($resultado){
        echo 'Si hay conexion';
    }else{
        echo 'No hay conexion' ;
    }


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
                    Catálogo: Cuestionarios
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3">Nuevo</button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Cuestionarios</th>
                                <th>Creación</th>
                                <th>Última actualización</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $numero=0;
                            while($row = mysqli_fetch_row($resultado))
                            {
                                echo "<tr> <td>" . $row["cuestionario"] . "</td>";
                                echo "<td>" . $row["creacion"] . "</td>";
                                echo "<td>" . $row["actualizacion"] . "</td></tr>";
                                $numero++;
                            }
                            ?>
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
    <i class="fas fa-angle-up"></i>
</a>

<?php getModalLogout() ?>

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>
