<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
if(isset($_GET['id'])){
    $sql= "select id, competencia from competencias where id=$_GET[id]";
    $resultado=mysqli_query($conexion, $sql);
    if (isset($resultado)) {
        $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    }
    $competencia= $row['competencia'];

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
                    Añadir competencia
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <form method="post" action="guardar.php">
                            <div class="form-group">
                                <label for="competencia">Competencia</label>
                                <input type="text" class="form-control" name="nom_Com"
                                    <?php if(isset($_GET['id'])) echo "value='$competencia'";?>
                                >
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary mb-3" value="Guardar">
                                <input type="button" class="btn btn-secondary mb-3" OnClick="location.href='index.php'" value="Cancelar">
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

<?php getBottomIncudes( RUTA_INCLUDE ) ?>
</body>

</html>
