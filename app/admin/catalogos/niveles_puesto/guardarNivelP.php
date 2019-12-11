<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
// ob_start();
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
            <div class="card-header">
                <i class="fas fa-table"></i>
                Catálogo: niveles de puesto
            </div>
            <hr>
            <?php
            // Query to check if the period already exist
            @$checarNivel = "SELECT * FROM niveles_puesto WHERE nivel_puesto = '$_POST[nivel_puesto]' ";
            // Variable $result hold the connection data and the query
            $result = $conexion-> query($checarNivel);
            // Variable $count hold the result of the query
            $count = mysqli_num_rows($result);
            // If count == 1 that means the period is already on the database
            if ($count == 1) {
                echo "<div class='alert alert-warning mt-4' role='alert'>
                <h3>El nivel de puesto ya existe.</h3>
                <a class='btn btn-outline-danger' href='nuevo.php' role='button'>Intentalo de nuevo</a>
            </div>";
            } else {
                /*
                If the period don't exist, the data from the form is sended to the
                database and the account is created
                */
                @$nivel = $_POST['nivel_puesto'];
                $estado = $_POST['estado'];

// Query to send Name, Email and Password hash to the database
                $query = "INSERT INTO niveles_puesto (nivel_puesto, creacion, actualizacion, estado) VALUES ('$nivel', NOW(), NOW(), '$estado')";
                if (mysqli_query($conexion, $query)) {
                    /* header('location:index.php');
                      ob_flush();
                      */
                    echo "<div class='alert alert-success mt-4' role='alert'><h3>Has añadido un nuevo nivel de puesto.</h3>
    <a class='btn btn-outline-primary' href='index.php' role='button'>Ver periodos</a> <a class='btn btn-outline-primary' href='nuevo.php' role='button'>Agregar otro nivel</a></div>";
                } else {
                    echo "Error: " .$query. "<br>" .mysqli_error($conexion);
                }
            }
            mysqli_close($conexion);

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

