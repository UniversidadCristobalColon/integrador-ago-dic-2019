<?php
require_once '../../config/global.php';
include '../../config/db.php';

define('RUTA_INCLUDE', '../../'); //ajustar a necesidad
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
            <h1>Importar Empleados</h1>
            <hr>
                <form method="post" class="border-0" enctype="multipart/form-data" action="subir_archivo.php">
                    <div class="row col-4">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFileLang" name="customFileLang" lang="es">
                            <label class="custom-file-label" for="customFileLang" id="label">Seleccionar archivo</label>
                        </div>
                        <select name="departamento" id="departamento" class="browser-default custom-select mt-3 mb-3">
                            <option value="0">Elija un departamento</option>
                            <?php
                                $result = mysqli_query($conexion, "SELECT * FROM departamentos ");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<option value="' . $row['id'] .'">' . $row['departamento'] .'</option>';
                                }
                            ?>
                        </select>
                        <input type="submit" class="btn btn-primary">
                    </div>
                    <script>
                        document.getElementById('customFileLang').onchange = function () {
                            document.getElementById('label').innerHTML = document.getElementById('customFileLang').files[0].name;
                        }
                    </script>
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
