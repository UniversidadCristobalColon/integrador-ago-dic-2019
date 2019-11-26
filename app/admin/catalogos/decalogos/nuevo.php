<?php
ob_start();
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';
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
                    <i class="fas fa-plus-square"></i>
                    Añadir decálogo
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <!--<form method="post" action="test.php">-->

                            <div class="form-group">
                                <label>Decálogo</label>
                                <input type="text" class="form-control" name="nuevodeca"
                                       placeholder="Escribe aquí el nombre del nuevo decálogo">
                            </div>

                            <div class="form-group">
                                <label>id_escala</label>
                                <select class="form-control" id="orden" name="select_e">
                                    <option disabled selected>Elige una escala para el decálogo</option>
                                    <?php
                                    $sql_id = "SELECT id FROM escalas;";
                                    $resultado = mysqli_query($conexion, $sql_id);
                                    if ($resultado) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo "<option>$fila[id]</option>";
                                        }
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

                        <?php
                        if (isset($_POST['nuevodeca']) && $_POST['nuevodeca'] != '') {
                            if (isset($_POST['select_e'])) {
                                $n_deca = $_POST['nuevodeca'];
                                $s_esc = $_POST['select_e'];
                                //$act = date("Y-m-d H:i:s");
                                $act = "";
                                $sql2 = "SELECT now()";
                                $resultado = mysqli_query($conexion, $sql2);
                                if ($resultado) {
                                    while ($act = mysqli_fetch_assoc($resultado)) {
                                        $act = $act["now()"];
                                        $sql = "INSERT INTO decalogos (decalogo, actualizacion, id_escala) VALUES ('$n_deca','$act','$s_esc');";

                                        if (mysqli_query($conexion, $sql)) {
                                            header("location: index.php");
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                                        }
                                    }
                                }
                            } else {
                                echo "<p style='color: red'>**Por favor seleccione una opción disponible**</p>";
                            }
                        } else {echo "<p style='color: red'>**Por favor llene los campos solicitados**</p>";}
                        ob_end_flush();
                        mysqli_close($conexion);
                        ?>
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
<?php getBottomIncudes(RUTA_INCLUDE) ?>
</body>

</html>