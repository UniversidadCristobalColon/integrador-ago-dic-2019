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
                    Catálogo: Guardar Periodo
                </div>

                <hr>
                <?php
                $checarPeriodo = "SELECT * FROM periodos where periodo = '$_POST[periodo]'";

                $result = $conexion->query($checarPeriodo);

                $count = mysqli_num_rows($result);

                if ($count == 1){
                    echo "<div class='alert alert-warning mt-4' role='alert'>
                    <p>El periodo ya existe</p>
                    <p><a href='agregarPeriodo.php'>Intenta de nuevo</a></p>
                    </div>";
                }else{
                    $periodos = $_POST['periodo'];

                    $query = "INSERT INTO periodos (periodo, creacion, actualizacion) VALUES ('$periodos', NOW(), NOW())";
                    if (mysqli_query($conexion, $query)) {
                        echo "<div class='alert alert-success mt-4' role='alert'><h3>Has añadido un nuevo Periodo.</h3>
    <a class='btn btn-outline-primary' href='index.php' role='button'>Ver Periodos</a></div>";
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

    <?php getModalLogout();  getBottomIncudes( RUTA_INCLUDE ); ?>

</body>
</html>