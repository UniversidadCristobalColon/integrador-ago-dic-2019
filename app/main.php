<?php
require_once '../config/db.php';
require_once '../config/global.php';

define('RUTA_INCLUDE', '../'); //ajustar a necesidad
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
    <style>
    .alert {
        margin-bottom: 0;
    }
    </style>
</head>

<body id="page-top">
<?php
    if(empty($_SESSION)) {
        session_start();
    }
    if(isset($_GET['alert'])) {
        echo '<div class="alert alert-success">Se ha enviado un correo a '.$_SESSION['usuario'].'.</div>';
    }
?>
<?php getNavbar() ?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <h4>Bienvenido <?php echo $_SESSION['nombre'] ?> <?php echo $_SESSION['apellidos'] ?> (<?php echo $_SESSION['usuario'] ?>)</h4>

            <div class="row mt-5">
                <div class="col text-center">
                    <img src="../img/logo_360.png" class="img-fluid"/>
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
