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

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!--<form method="post" action="test.php">-->

                            <div class="form-group">
                                <label>Decálogo</label>
                                <input type="text" class="form-control" name="nuevodeca" required>
                                <?php
                                if (isset($_POST['bguard'])) {
                                    if (isset($_POST['nuevodeca']) && $_POST['nuevodeca'] != "") {
                                        $n_deca = $_POST['nuevodeca'];
                                    } else {
                                        echo "<p style='color: red'>**Por favor llene este campo**</p>";
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Escala</label>
                                <select class="form-control" id="orden" name="select_e">
                                    <option disabled selected>Elige una escala para el decálogo</option>
                                    <?php
                                    $sql_id = "SELECT id, nivel1_etiqueta, nivel2_etiqueta, nivel3_etiqueta, nivel4_etiqueta, nivel5_etiqueta FROM escalas";
                                    $resultado = mysqli_query($conexion, $sql_id);
                                    if ($resultado) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            $fid = fila['id'];
                                            $arr_escala[] = $fid;
                                            echo "<option>$fila[nivel1_etiqueta],$fila[nivel2_etiqueta],$fila[nivel3_etiqueta],$fila[nivel4_etiqueta],$fila[nivel5_etiqueta]</option>";
                                        }
                                    } else {
                                        echo("Error description: " . mysqli_error($conexion));
                                    }
                                    ?>
                                </select>
                                <?php
                                if (isset($_POST['bguard'])) {
                                    if (isset($_POST['select_e'])) {
                                        $s_esc = $_POST['select_e'];
                                        $porciones = explode(",", $s_esc);
                                        $pn1 = $porciones[0];
                                        $pn2 = $porciones[1];
                                        $pn3 = $porciones[2];
                                        $pn4 = $porciones[3];
                                        $pn5 = $porciones[4];
                                        $sql_id = "SELECT id FROM escalas WHERE nivel1_etiqueta='$pn1' AND nivel2_etiqueta='$pn2' AND nivel3_etiqueta='$pn3' AND nivel4_etiqueta='$pn4' AND nivel5_etiqueta='$pn5'";
                                        $resultado = mysqli_query($conexion, $sql_id);
                                        if ($resultado) {
                                            $fila = mysqli_fetch_assoc($resultado);
                                            $s_esc = $fila['id'];
                                        } else {
                                            echo("Error description: " . mysqli_error($conexion));
                                        }
                                    } else {
                                        echo "<p style='color: red'>**Por favor seleccione una escala disponible**</p>";
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label class="mb-0">Aseveraciones</label>
                                <?php if ($resultado): ?>
                                    <?php for ($i = 1; $i <= 10; $i++):
                                        $fila = mysqli_fetch_assoc($resultado); ?>
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><?php echo $i; ?></span>
                                            </div>
                                            <input type="text" name="asv<?php echo $i; ?>"
                                                   class="form-control" required>
                                        </div>
                                    <?php endfor; ?>
                                <?php else:
                                    echo("Error description: " . mysqli_error($conexion));
                                endif; ?>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

                        <?php
                        if (isset($_POST['bguard'])) {

                            if (isset($_POST['nuevodeca']) && isset($_POST['select_e'])) {
                                $sql2 = "SELECT now()";
                                $resultado = mysqli_query($conexion, $sql2);
                                if ($resultado) {
                                    $fila = mysqli_fetch_assoc($resultado);
                                    $act = $fila["now()"];
                                }

                                $sql = "INSERT INTO decalogos (decalogo, actualizacion, id_escala) VALUES ('$n_deca','$act','$s_esc')";

                                if (mysqli_query($conexion, $sql)) {
                                    $id_elem = mysqli_insert_id($conexion);
                                    echo $id_elem;

                                    if (isset($_POST['asv1']) && isset($_POST['asv2']) && isset($_POST['asv3']) && isset($_POST['asv4'])
                                        && isset($_POST['asv5']) && isset($_POST['asv6']) && isset($_POST['asv7']) && isset($_POST['asv8'])
                                        && isset($_POST['asv9']) && isset($_POST['asv10'])) {
                                        for ($i = 1; $i <= 10; $i++) {
                                            $asv = $_POST['asv' . $i];
                                            $sql_ins = "INSERT INTO decalogos_aseveraciones (aseveracion, actualizacion, id_decalogo)
                                                        VALUES ('$asv', '$act', '$id_elem')";
                                            $resultado = mysqli_query($conexion, $sql_ins);
                                            if ($resultado) {
                                                header("location: index.php");
                                            } else {
                                                echo("Error description: " . mysqli_error($conexion));
                                            }
                                        }
                                    } else {
                                        echo "<p style='color: red'>**Por favor llene todas las aseveraciones**</p>";
                                    }

                                } else {
                                    echo("Error description: " . mysqli_error($conexion));
                                }
                            } else {
                                echo "<p><i class=\"fas fa-exclamation-triangle\"></i> ADVERTENCIA: Por favor llene los campos solicitados.</p>";
                            }

                            ob_end_flush();
                        }
                        ?>

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