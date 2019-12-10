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
                    Añadir escala
                </div>
                <div class="card-body">

                    <div class="table-responsive">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                            <div class="form-group">
                                <h3>Nivel 1:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn1" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in1" step="0.01" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn1" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 2:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn2" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in2" step="0.01" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn2" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 3:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in3" step="0.01" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn3" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 4:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn4" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in4" step="0.01" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn4" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <h3>Nivel 5:</h3>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Etiqueta</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="en5" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <input required type="text" name="dn5" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Inferior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="in5" step="0.01" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mr-0">
                                    <label class="col-sm-2 col-form-label">Superior</label>
                                    <div class="col-sm-10">
                                        <input required type="number" name="sn5" step="0.01" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-5">
                                <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

                        <?php
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

                            $sql_insert = "INSERT INTO escalas(nivel1_etiqueta, nivel1_descripcion, nivel1_inferior, 
                                            nivel1_superior, nivel2_etiqueta, nivel2_descripcion, nivel2_inferior, 
                                            nivel2_superior, nivel3_etiqueta, nivel3_descripcion, nivel3_inferior, 
                                            nivel3_superior, nivel4_etiqueta, nivel4_descripcion, nivel4_inferior, 
                                            nivel4_superior, nivel5_etiqueta, nivel5_descripcion, nivel5_inferior, 
                                            nivel5_superior, actualizacion, creacion_ip, actualizacion_ip) 
                                            VALUES ('$etin1','$desn1','$infn1','$supn1','$etin2','$desn2','$infn2',
                                            '$supn2','$etin3','$desn3','$infn3','$supn3','$etin4','$desn4','$infn4',
                                            '$supn4','$etin5','$desn5','$infn5','$supn5','$actualizacion', '$ipcliente','$ipcliente')";
                            if (mysqli_query($conexion, $sql_insert)) {
                                header("location: index.php");
                            } else {
                                echo("Error description: " . mysqli_error($conexion));
                            }
                        }
                        ?>

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
