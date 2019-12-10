<?php
ob_start();
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';

if (isset($_POST['b-edit'])) {

    $id_elem = $_POST['b-edit'];

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

}

$sql_id_nom = "SELECT decalogo FROM decalogos WHERE id = '$id_elem';";
$id_nom = mysqli_query($conexion, $sql_id_nom);
if ($id_nom) {
    $fila = mysqli_fetch_assoc($id_nom);
    $nom_deca = $fila['decalogo'];
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
                    <i class="fas fa-edit"></i>
                    Editar decálogo
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                            <div class="form-group">
                                <label>Decálogo a editar</label>
                                <input type="hidden" value="<?php echo $id_elem ?>"
                                       name="idedit"><!--/*id del elemento a editar*/-->
                                <input class="form-control" type="text" placeholder="<?php echo $nom_deca ?>"
                                       value="<?php echo $nom_deca ?>" name="e_deca">
                                <?php
                                if (isset($_POST['bguard'])) {
                                    if (isset($_POST['e_deca'])) {
                                        if ($_POST['e_deca'] != "") {
                                            $new_deca = $_POST['e_deca'];
                                        } else {
                                            echo "<p style='color: red'>**Por favor no dejes el campo 'Decálogo a editar' vacío.**</p>";
                                        }
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <label>Escala</label>
                                <select class="form-control" id="orden" name="select_e" required>
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

                                        $str_esc = $_POST['select_e'];

                                        $porciones = explode(",", $str_esc);
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
                                        echo "<p style='color: red'>**Por favor seleccione una escala disponible.**</p>";
                                    }
                                }
                                ?>
                            </div>

                            <div class="form-group mt-4">
                                <label>¿Deseas guardar los cambios?</label><br>
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

                        <?php
                        if (isset($_POST['bguard'])) {
                            if (isset($_POST['e_deca']) && $_POST['e_deca']!="" && isset($_POST['select_e'])) {
                                $sql_upd = "UPDATE decalogos
                                            SET decalogo='$new_deca', actualizacion='$datet', id_escala='$s_esc'
                                            WHERE id='$id_elem';";
                                $resultado = mysqli_query($conexion, $sql_upd);
                                if ($resultado) {
                                    mysqli_close($conexion);
                                    header("location: index.php");
                                    ob_end_flush();
                                } else {
                                    mysqli_close($conexion);
                                    echo("Error description: " . mysqli_error($conexion));
                                }
                            } else {
                                echo "<p><i class=\"fas fa-exclamation-triangle\"></i> ADVERTENCIA: Por favor llene los campos solicitados.</p>";
                            }
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
