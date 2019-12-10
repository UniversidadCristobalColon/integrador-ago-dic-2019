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
                    <form action="exportEmployees.php" method="post">
                      <input type="submit" value = "Guardar" class="btn btn-primary mb-3">

                    
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
                            $contador = 1;
                            $sql = "SELECT * FROM empleados_temp";
                            $result = $conexion->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $no_empleado = $row['num_empleado'];
                                    $nombre_empleado = $row['nombre'];
                                    $apellido_empleado = $row['apellidos'];
                                    $telefono_empleado = $row['telefono'];
                                    $email_empleado = $row['email'];
                                    $depa_empleado = $row['id_departamento'];
                                    $query2 = "SELECT departamento from departamentos where id = $depa_empleado";
                                    $result2 = $conexion->query($query2);
                                    $row2 = $result2->fetch_assoc();
                                    $depa_empleado = $row2['departamento'];
                                    echo("<tr><td>" . $no_empleado . "</td>
                                  <td>" . $nombre_empleado . "</td>
                                  <td>" . $apellido_empleado . "</td>
                                  <td>" . $telefono_empleado . "</td>
                                  <td>" . $email_empleado . "</td>
                                  <td>" . $depa_empleado . "</td>
                                  <td style='display:none;'>
                                  <input type='hidden' name='id$contador' value=".$row['id']."></td>");

                                    echo("<td><select class='form-control' id='puesto' name='puesto$contador'>");
                                    echo("<option value='11'>No especificado</option>");
                                    $query3 = "SELECT * from puestos";
                                    $result3 = $conexion->query($query3);
                                    while ($row3 = $result3->fetch_assoc()) {
                                        echo('<option value="' . $row3['id'] . '">' . $row3['puesto'] . '</option>');
                                    }
                                    echo("</select></td>");
                                    echo("</tr>");
                                    $contador++;
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                </form>
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
