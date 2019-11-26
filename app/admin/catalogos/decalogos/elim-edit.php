<?php
ob_start();
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
require_once RUTA_INCLUDE . 'config/global.php';
require '../../../../config/db.php';

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
                        <i class="fas fa-trash"></i>
                        Eliminar decálogo

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
                                    <label>Decálogo a eliminar:</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $nom_deca ?>"
                                           readonly>
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <label>Decálogo a editar:</label>
                                    <input class="form-control" type="text" placeholder="<?php echo $nom_deca ?>"
                                           value="<?php echo $nom_deca ?>">
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <label>¿Estás seguro que deseas eliminar el registro seleccionado?</label>
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <label>¿Deseas guardar los cambios?</label>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <?php if (isset($_POST['b-elim'])): ?>
                                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Eliminar">
                                <?php elseif (isset($_POST['b-edit'])): ?>
                                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Guardar">
                                <?php endif; ?>
                                <input type="button" class="btn btn-secondary mb-3"
                                       OnClick="location.href='index.php'" value="Cancelar">
                            </div>

                        </form>

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