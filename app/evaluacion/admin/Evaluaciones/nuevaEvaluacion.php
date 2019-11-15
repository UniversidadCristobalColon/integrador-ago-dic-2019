<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';

define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad
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

            <!-- Page Content -->
            <form action="guardar.php" method="post">
                <h1>Nueva Evaluación</h1>
                <hr>
                <div class="form-group">
                    <label for="Descripcion">Descripcion:</label>
                    <input class="form-control mb-3" type="text" id="Descripcion" name="Descripcion">

                    <label for="Evaluar">Evaluar a:</label>  <!-- Evaluado -->
                    <select class="form-control mb-3" id="Evaluar" name="Evaluar">
                        <option></option>
                        <?php
                        $sql = "select * from niveles_puesto";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[nivel_puesto]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Evaluan">Evaluadores:</label> <!-- Evaluadores -->
                    <select class="form-control mb-3" id="Evaluan" name="Evaluan">
                        <option></option>
                        <?php
                        $sql = "select * from niveles_puesto";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[nivel_puesto]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Cuestionario">Cuestionario:</label>
                    <select class="form-control mb-3" id="Cuestionario" name="Cuestionario">
                        <option></option>
                        <?php
                        $sql = "select * from cuestionarios";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[cuestionario]</option>";
                            }
                        }
                        ?>
                    </select>

                    <label for="Periodo">Periodo:</label>
                    <select class="form-control mb-3" id="Periodo" name="Periodo">
                        <option></option>
                        <?php
                        $sql = "select * from periodos";
                        $resultado = mysqli_query($conexion,$sql);
                        if($resultado){
                            while($fila = mysqli_fetch_assoc($resultado)){
                                echo "<option value = '$fila[id]'>$fila[periodo]</option>";
                            }
                        }
                        ?>
                    </select>

                    <button type="submit" class="btn btn-success btn-block">Continuar</button>
                </div>
            </form>


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
