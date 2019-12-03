<?php
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';


if (isset($_POST['bguard'])) {

    $etin1 = $_POST['en1'];
    $desn1 = $_POST['dn1'];
    $infn1 = $_POST['in1'];
    $supn1 = $_POST['sn1'];

    $etin2 = $_POST['en2'];
    $desn2 = $_POST['dn2'];
    $infn2 = $_POST['in2'];
    $supn2 = $_POST['sn2'];

    $etin3 = $_POST['en3'];
    $desn3 = $_POST['dn3'];
    $infn3 = $_POST['in3'];
    $supn3 = $_POST['sn3'];

    $etin4 = $_POST['en4'];
    $desn4 = $_POST['dn4'];
    $infn4 = $_POST['in4'];
    $supn4 = $_POST['sn4'];

    $etin5 = $_POST['en5'];
    $desn5 = $_POST['dn5'];
    $infn5 = $_POST['in5'];
    $supn5 = $_POST['sn5'];

    $sql_now = "SELECT now()";
    $resultado = mysqli_query($conexion, $sql_now);
    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $actualizacion = $fila["now()"];
    }

    $ipcliente = $_SERVER['REMOTE_ADDR'];

    $id_pt_bg = $_POST['idpost'];

    $sql_upd = "UPDATE escalas
                                        SET nivel1_etiqueta='$etin1', nivel1_descripcion='$desn1', nivel1_inferior='$infn1', nivel1_superior='$supn1',
	                                        nivel2_etiqueta='$etin2', nivel2_descripcion='$desn2', nivel2_inferior='$infn2', nivel2_superior='$supn2',
                                            nivel3_etiqueta='$etin3', nivel3_descripcion='$desn3', nivel3_inferior='$infn3', nivel3_superior='$supn3',
                                            nivel4_etiqueta='$etin4', nivel4_descripcion='$desn4', nivel4_inferior='$infn4', nivel4_superior='$supn4',
                                            nivel5_etiqueta='$etin5', nivel5_descripcion='$desn5', nivel5_inferior='$infn5', nivel5_superior='$supn5',
                                            actualizacion='$actualizacion', actualizacion_ip='$ipcliente'
                                        WHERE id='$id_pt_bg'";
    if (mysqli_query($conexion, $sql_upd)) {
        header("location: index.php");
    } else {
        echo("Error description: " . mysqli_error($conexion));
    }
}


if (isset($_POST['b-edit'])) {

    $idpost = $_POST['b-edit'];

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
                    Editar escalas

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
                                               required>
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn1" class="form-control"
                                               placeholder="ej. rara vez muestra el comportamiento esperado"
                                               value="<?php echo $desn1 ?>">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in1" step="0.01" class="form-control"
                                               value="<?php echo $infn1 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn1" step="0.01" class="form-control"
                                               value="<?php echo $supn1 ?>"
                                               placeholder="ej. 0.00">
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
                                               placeholder="ej. mínimo aceptable">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn2" class="form-control"
                                               value="<?php echo $desn2 ?>"
                                               placeholder="ej. comportamiento inconsistente">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in2" step="0.01" class="form-control"
                                               value="<?php echo $infn2 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn2" step="0.01" class="form-control"
                                               value="<?php echo $supn2 ?>"
                                               placeholder="ej. 0.00">
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
                                               placeholder="ej. satisfactorio">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn3" class="form-control"
                                               value="<?php echo $desn3 ?>"
                                               placeholder="ej. comportamiento esperado">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in3" step="0.01" class="form-control"
                                               value="<?php echo $infn3 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn3" step="0.01" class="form-control"
                                               value="<?php echo $supn3 ?>"
                                               placeholder="ej. 0.00">
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
                                               placeholder="ej. notable">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn4" class="form-control"
                                               value="<?php echo $desn4 ?>"
                                               placeholder="ej. comportamiento superior a lo esperado">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in4" step="0.01" class="form-control"
                                               value="<?php echo $infn4 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn4" step="0.01" class="form-control"
                                               value="<?php echo $supn4 ?>"
                                               placeholder="ej. 0.00">
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
                                               placeholder="ej. excelente">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn5" class="form-control"
                                               value="<?php echo $desn5 ?>"
                                               placeholder="ej. comportamiento que trasciende su área...">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in5" step="0.01" class="form-control"
                                               value="<?php echo $infn5 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn5" step="0.01" class="form-control"
                                               value="<?php echo $supn5 ?>"
                                               placeholder="ej. 0.00">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mt-5">
                                <label>¿Deseas guardar los cambios?</label><br>
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
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