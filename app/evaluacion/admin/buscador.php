<?php
require_once '../../../config/global.php';
define('RUTA_INCLUDE', '../../../'); //ajustar a necesidad
include '../../../config/db.php';
$id_eval='1';
$id_periodo='1';

$sql = "select * from empleados";
$resultado = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));

$sql = "select * from periodos";
$resultadoperiodo = mysqli_query($conexion, $sql) or exit(mysqli_error($conexion));
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
                    Busqueda de evaluación
                </div>
                <div class="card-body">
                    <form method="POST">
                        <select name='id_evaluado' class="chosen-select">
                            <option>Seleccione un empleado</option>
                            <?php
                            while($row = mysqli_fetch_array($resultado)){
                                echo"
                                        <option value='$row[id]'>$row[nombre]</option>
                                    ";
                            }
                            ?>
                        </select>

                        <select name='id_periodo' class="chosen-select">
                            <?php
                            while($row = mysqli_fetch_array($resultadoperiodo)){
                                echo"
                                    <option value='$row[id]'>$row[periodo]</option>
                                    ";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary" formaction="busqueda.php">Empezar busqueda</button>
                    </form>

                    <div class="table-responsive">




                        <br/><br/>

                        <!-- Dropdown2 -->
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




<!--<script type="text/javascript" src="../../../vendor/chosen/chosen.jquery.js"></script>-->
<?php getBottomIncudes( RUTA_INCLUDE ) ?>
<link rel="stylesheet" href="../../../vendor/chosen/chosen.css" type="text/css" />
 <script src="../../../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="../../../vendor/chosen/chosen.jquery.js" type="text/javascript"></script>
 <script src="../../../vendor/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
 <script src="../../../vendor/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".chosen").chosen();
    });
</script>


</body>

</html>


