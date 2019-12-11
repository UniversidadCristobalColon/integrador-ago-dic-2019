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


            <!-- Page Content -->
            <h1>Importar empleados</h1>
            <hr>
            <?php
            $i = 1;
            while(isset($_POST['puesto'.$i]) && isset($_POST['id'.$i])){
                $id_puesto = $_POST['puesto'.$i];
                $id_employee = $_POST['id'.$i];
                $query = "UPDATE empleados_temp set id_puesto_temp = $id_puesto where id = $id_employee";
                $conexion->query($query);
                $i++;
            }
            $sql = "SELECT * FROM empleados_temp";

            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $no_empleado = $row['num_empleado'];
                    $nombre_empleado = $row['nombre'];
                    $apellido_empleado = $row['apellidos'];
                    $email_empleado = $row['email'];
                    $depa_empleado = $row['id_departamento'];
                    $puesto_empleado = $row['id_puesto_temp'];
                    $sql2 = "SELECT * FROM empleados where num_empleado = '$no_empleado'";
                    $result2 = $conexion->query($sql2);
                    if (mysqli_num_rows($result2)>0){

                    }else{
                        $query = "INSERT INTO empleados(num_empleado,nombre,apellidos,email,id_departamento,id_puesto)
    values('$no_empleado', '$nombre_empleado','$apellido_empleado', '$email_empleado', $depa_empleado, $puesto_empleado)";
                        $conexion->query($query);
                    }
                }
                $query = "truncate empleados_temp";
                $conexion->query($query);
                if (mysqli_query($conexion, $query)) {
                    echo "<div class='alert alert-success mt-4' role='alert'><h3>Empleados importados correctamente</h3>
    <a class='btn btn-outline-primary' href='import.php' role='button'>Regresar</a> </div>";
                } else {
                    echo "Error: " .$query. "<br>" .mysqli_error($conexion);
                }
            }

            ?>
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