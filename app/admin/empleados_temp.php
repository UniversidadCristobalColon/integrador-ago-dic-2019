<?php
require_once '../../config/global.php';
include '../../config/db.php';

define('RUTA_INCLUDE', '../../'); //ajustar a necesidad

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
                    Data Table Example
                </div>
                <div class="card-body">
                    
                    <button class="btn btn-primary mb-3">Nuevo</button>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Número de empleado</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Departamento</th>
                                <th>Puesto</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql = 'select * from empleados_temp';
                                $union = 'select * from departamentos  d inner join empleados_temp e where d.id=e.id_departamento';
                                $result = mysqli_query($conexion,$sql);
                                $resultado = mysqli_query($conexion,$union);
                                $result2 = mysqli_query($conexion, "SELECT * FROM puestos ");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "
                                        <tr>
                                            <td>$row[num_empleado]</td>
                                            <td>$row[nombre]</td>
                                            <td>$row[apellidos]</td>
                                            <td>$row[telefono]</td>
                                            <td>$row[email]</td> 
                                    ";
                                    while ($row2 = mysqli_fetch_array($resultado)) {
                                        echo "<td>$row2[departamento]</td>";
                                        break;
                                    }
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
