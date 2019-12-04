<?php
        include '../../../../config/db.php';
        include '../../../../config/db.php';
        session_start();
        require_once '../../../../config/global.php';
        ob_start();
        define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad


    if (isset($_POST['bguard'])){
        $id = $_POST['id'];
        $find=mysqli_query($conexion,"SELECT * FROM competencias WHERE id='$id'");
        $row=mysqli_fetch_array($find);
        $estado=$row['estado'];
        if($estado == "A"){
            $sqlCambiar = "UPDATE competencias SET estado = 'B' WHERE id = '$id' ";
        }else{
            $sqlCambiar = "UPDATE competencias SET estado = 'A'  WHERE id = '$id' ";
        }
        if ($conexion->query($sqlCambiar) === TRUE) {
            header('location: index.php');
            ob_flush();
        }else {
            echo "Error updating record: " . $conexion->error;
        }
    }else{
    }


    ob_end_flush();
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
            <h1>Cambio de estado</h1>
            <hr>
            <p>Cambiar estado de: </p>
            <label for="com"> <?php
                $id = $_GET['id'];
                $find=mysqli_query($conexion,"SELECT * FROM competencias WHERE id='$id'");
                $row=mysqli_fetch_array($find);
                $competencia = $row['competencia'];
                echo $competencia;
                ?></label>
            <div class="form-group mt-5">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <input type="submit" class="btn btn-primary mb-3" name="bguard" value="Cambiar">
                    <input type="button" class="btn btn-secondary mb-3"
                       OnClick="location.href='index.php'" value="Cancelar">
                </form>
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

