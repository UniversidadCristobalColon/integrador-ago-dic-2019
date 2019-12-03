<?php
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';

if (isset($_POST['bguard'])) {
    if ($_POST['bguard'] == 'Cambiar') {
        $id_bor = $_POST['idbor'];

        if ($_POST['statdec'] == 'A') {
            $sql_elim = "UPDATE decalogos SET status='B' WHERE id='$id_bor';";
        } elseif ($_POST['statdec'] == 'B') {
            $sql_elim = "UPDATE decalogos SET status='A' WHERE id='$id_bor';";
        }
        $resultado = mysqli_query($conexion, $sql_elim);
        if ($resultado) {
            header("location: index.php");
        } else {
            echo "Error";
        }

    } elseif ($_POST['bguard'] == 'Guardar') {
        $id_edit = $_POST['idedit'];
        $new_deca = $_POST['e_deca'];
        $new_esc = $_POST['select_e'];

        $sql_now = "SELECT now()";
        $resultado = mysqli_query($conexion, $sql_now);
        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            $datet = $fila['now()'];
        } else {
            echo "Error";
        }

        $sql_upd = "UPDATE decalogos
                SET decalogo='$new_deca', actualizacion='$datet', id_escala='$new_esc'
                WHERE id='$id_edit';";
        $resultado = mysqli_query($conexion, $sql_upd);
        if ($resultado) {
            mysqli_close($conexion);
            header("location: index.php");
        } else {
            mysqli_close($conexion);
            echo "Error";
        }
    }
} else {
    if (isset($_POST['b-elim'])) {
        $id_elem = $_POST['b-elim'];
    } elseif (isset($_POST['b-edit'])) {
        $id_elem = $_POST['b-edit'];
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
        $stat_deca = $fila['status'];
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
                    <?php if (isset($_POST['b-elim'])): ?>
                        <i class="fas fa-exchange-alt"></i>
                        Cambiar estado

                    <?php elseif (isset($_POST['b-edit'])): ?>
                        <i class="fas fa-edit"></i>
                        Editar decálogo
                    <?php endif; ?>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <!--<form method="post" action="test.php">-->

                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <label>Decálogo:</label>
                                    <input type="hidden" value="<?php echo $id_elem ?>"
                                           name="idbor"><!--/*id del elemento a borrar*/-->
                                    <input class="form-control" type="text" value="<?php echo $nom_deca ?>"
                                           readonly>
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <label>Decálogo a editar:</label>
                                    <input type="hidden" value="<?php echo $id_elem ?>"
                                           name="idedit"><!--/*id del elemento a editar*/-->
                                    <input class="form-control" type="text" placeholder="<?php echo $nom_deca ?>"
                                           value="<?php echo $nom_deca ?>" name="e_deca">
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <label>Estado actual:</label>
                                    <input type="hidden" value="<?php echo $stat_deca ?>"
                                           name="statdec"><!--/*estado actual del decálogo*/-->
                                    <input class="form-control" type="text" value="<?php echo $stat_deca ?>"
                                           readonly>
                                <?php elseif (isset($_POST['b-edit'])): ?>
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
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <label>¿Estás seguro que deseas cambiar el estado del registro seleccionado?</label>
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <label>¿Deseas guardar los cambios?</label>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Cambiar">
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <?php endif; ?>
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