<?php
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';


if (isset($_POST['bguard'])) {

    $id_pt_bg = $_POST['idpost'];

    if ($_POST['statesc'] == 'Activo') {
        $sql_elim = "UPDATE escalas SET status='B' WHERE id='$id_pt_bg';";
    } elseif ($_POST['statesc'] == 'Inactivo') {
        $sql_elim = "UPDATE escalas SET status='A' WHERE id='$id_pt_bg';";
    }

    $resultado = mysqli_query($conexion, $sql_elim);
    if ($resultado) {
        header("location: index.php");
    } else {
        echo("Error description: " . mysqli_error($conexion));
    }

}


if (isset($_POST['b-camb'])) {

    $idpost = $_POST['b-camb'];

    $sql_sel = "SELECT nivel1_etiqueta, nivel1_descripcion, nivel1_inferior, nivel1_superior,
                    nivel2_etiqueta, nivel2_descripcion, nivel2_inferior, nivel2_superior,
                    nivel3_etiqueta, nivel3_descripcion, nivel3_inferior, nivel3_superior,
                    nivel4_etiqueta, nivel4_descripcion, nivel4_inferior, nivel4_superior,
                    nivel5_etiqueta, nivel5_descripcion, nivel5_inferior, nivel5_superior 
                    FROM escalas WHERE id='$idpost'";
    $resultado = mysqli_query($conexion, $sql_sel);
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $etin1 = $fila["nivel1_etiqueta"];
        $desn1 = $fila["nivel1_descripcion"];
        $infn1 = $fila["nivel1_inferior"];
        $supn1 = $fila["nivel1_superior"];

        $etin2 = $fila["nivel2_etiqueta"];
        $desn2 = $fila["nivel2_descripcion"];
        $infn2 = $fila["nivel2_inferior"];
        $supn2 = $fila["nivel2_superior"];

        $etin3 = $fila["nivel3_etiqueta"];
        $desn3 = $fila["nivel3_descripcion"];
        $infn3 = $fila["nivel3_inferior"];
        $supn3 = $fila["nivel3_superior"];

        $etin4 = $fila["nivel4_etiqueta"];
        $desn4 = $fila["nivel4_descripcion"];
        $infn4 = $fila["nivel4_inferior"];
        $supn4 = $fila["nivel4_superior"];

        $etin5 = $fila["nivel5_etiqueta"];
        $desn5 = $fila["nivel5_descripcion"];
        $infn5 = $fila["nivel5_inferior"];
        $supn5 = $fila["nivel5_superior"];
    } else {
        echo("Error description: " . mysqli_error($conexion));
    }

    $sql_stat = "SELECT status FROM escalas WHERE id='$idpost'";
    $sqlres = mysqli_query($conexion, $sql_stat);
    if ($sqlres) {
        $fila = mysqli_fetch_assoc($sqlres);
        if ($fila['status'] == 'A') {
            $stat_esc = 'Activo';
        } elseif ($fila['status'] == 'B') {
            $stat_esc = 'Inactivo';
        }
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

                            <input type="hidden" name="idpost" value="<?php echo $idpost ?>">

                            <div class="form-group">
                                <h3>Nivel 1:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="en1" class="form-control" value="<?php echo $etin1 ?>"
                                               placeholder="ej. marginal"
                                               required readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn1" class="form-control"
                                               placeholder="ej. rara vez muestra el comportamiento esperado"
                                               value="<?php echo $desn1 ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in1" step="0.01" class="form-control"
                                               value="<?php echo $infn1 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn1" step="0.01" class="form-control"
                                               value="<?php echo $supn1 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 2:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en2" class="form-control"
                                               value="<?php echo $etin2 ?>"
                                               placeholder="ej. mínimo aceptable" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn2" class="form-control"
                                               value="<?php echo $desn2 ?>"
                                               placeholder="ej. comportamiento inconsistente" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in2" step="0.01" class="form-control"
                                               value="<?php echo $infn2 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn2" step="0.01" class="form-control"
                                               value="<?php echo $supn2 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 3:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en3" class="form-control"
                                               value="<?php echo $etin3 ?>"
                                               placeholder="ej. satisfactorio" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn3" class="form-control"
                                               value="<?php echo $desn3 ?>"
                                               placeholder="ej. comportamiento esperado" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in3" step="0.01" class="form-control"
                                               value="<?php echo $infn3 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn3" step="0.01" class="form-control"
                                               value="<?php echo $supn3 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 4:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en4" class="form-control"
                                               value="<?php echo $etin4 ?>"
                                               placeholder="ej. notable" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn4" class="form-control"
                                               value="<?php echo $desn4 ?>"
                                               placeholder="ej. comportamiento superior a lo esperado" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in4" step="0.01" class="form-control"
                                               value="<?php echo $infn4 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn4" step="0.01" class="form-control"
                                               value="<?php echo $supn4 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 5:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en5" class="form-control"
                                               value="<?php echo $etin5 ?>"
                                               placeholder="ej. excelente" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn5" class="form-control"
                                               value="<?php echo $desn5 ?>"
                                               placeholder="ej. comportamiento que trasciende su área..." readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in5" step="0.01" class="form-control"
                                               value="<?php echo $infn5 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn5" step="0.01" class="form-control"
                                               value="<?php echo $supn5 ?>"
                                               placeholder="ej. 0.00" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5">
                                <label><b>¿Estás seguro que deseas cambiar el estado del registro seleccionado?</b></label><br>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Estado actual</label>
                                    <div class="col-sm-2">
                                        <input type="hidden" value="<?php echo $stat_esc ?>"
                                               name="statesc"><!--/*estado actual de la escala seleccionada*/-->
                                        <input class="form-control" type="text" value="<?php echo $stat_esc ?>"
                                               readonly>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Cambiar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

                    </div>
                </div>

                <div class="card-footer small text-muted">Última actualización
                    <?php
                    foreach ($conexion->query('SELECT actualizacion from escalas order by actualizacion desc limit 1') as $fecha) {
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