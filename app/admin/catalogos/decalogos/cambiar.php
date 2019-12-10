<?php
ob_start();
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';

if (isset($_POST['b-camb'])) {

    $id_elem = $_POST['b-camb'];

} elseif (isset($_POST['bguard'])) {

    $id_elem = $_POST['idedit'];

    $sql_now = "SELECT now()";
    $resultado = mysqli_query($conexion, $sql_now);
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $datet = $fila['now()'];
    } else {
        echo("Error description: " . mysqli_error($conexion));
    }

    if ($_POST['bguard'] == 'Cambiar') {
        $id_bor = $_POST['idbor'];

        if ($_POST['statdec'] == 'Activo') {
            $sql_elim = "UPDATE decalogos SET status='B' WHERE id='$id_bor';";
        } elseif ($_POST['statdec'] == 'Inactivo') {
            $sql_elim = "UPDATE decalogos SET status='A' WHERE id='$id_bor';";
        }
        $resultado = mysqli_query($conexion, $sql_elim);
        if ($resultado) {
            header("location: index.php");
        } else {
            echo("Error description: " . mysqli_error($conexion));
        }

    }

}

$sql_id_nom = "SELECT decalogo FROM decalogos WHERE id = '$id_elem';";
$id_nom = mysqli_query($conexion, $sql_id_nom);
if ($id_nom) {
    $fila = mysqli_fetch_assoc($id_nom);
    $nom_deca = $fila['decalogo'];
}

$sql_stat = "SELECT status FROM decalogos WHERE id='$id_elem'";
$sqlres = mysqli_query($conexion, $sql_stat);
if ($sqlres) {
    $fila = mysqli_fetch_assoc($sqlres);

    if ($fila['status'] == 'A') {
        $stat_deca = 'Activo';
    } elseif ($fila['status'] == 'B') {
        $stat_deca = 'Inactivo';
    }
}

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
                        <i class="fas fa-exchange-alt"></i>
                        Cambiar estado
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!--<form method="post" action="test.php">-->

                            <div class="form-group">
                                    <label>Decálogo:</label>
                                    <input type="hidden" value="<?php echo $id_elem ?>"
                                           name="idbor"><!--/*id del elemento a borrar*/-->
                                    <input class="form-control" type="text" value="<?php echo $nom_deca ?>"
                                           readonly>
                            </div>


                            <div class="form-group">
                                    <label>Estado actual:</label>
                                    <input type="hidden" value="<?php echo $stat_deca ?>"
                                           name="statdec"><!--/*estado actual del decálogo*/-->
                                    <input class="form-control" type="text" value="<?php echo $stat_deca ?>"
                                           readonly>
                            </div>

                            <div class="form-group mt-4">
                                    <label>¿Estás seguro que deseas cambiar el estado del registro seleccionado?</label>
                                    <br>
                                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Cambiar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

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
