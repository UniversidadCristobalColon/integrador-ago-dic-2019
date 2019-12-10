<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
define('RUTA_INCLUDE', '../../../../');
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
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Catálogo: Organizaciones
                </div>
            <hr>
            <?php
$organizacion = $_POST['organizacion'];
$id = $_POST['id'];

 $checarOrganizacion = "SELECT * FROM organizaciones WHERE organizacion = '$_POST[organizacion]' ";
 // Variable $result hold the connection data and the query
 $result = $conexion-> query($checarOrganizacion);
 // Variable $count hold the result of the query
 $count = mysqli_num_rows($result);
 // If count == 1 that means the organization is already on the database
 if ($count == 1) {
 echo "<form action='editar.php' method='post'>
        <div class='alert alert-warning mt-4' role='alert'>
                 <h3>Este nombre de organización ya está registrado</h3>
                 <button class='btn btn-outline-danger' type='submit' name='editar' value='$id'>Intentalo de nuevo</button>
             </div>
             </form>";
 } else {	               


/*
If the organization don't exist, the data from the form is sended to the
database and the account is created
*/


// Query to send Name, Email and Password hash to the database
$query= "UPDATE organizaciones SET organizacion='$organizacion', actualizacion=NOW() WHERE id='$id'";
if (mysqli_query($conexion, $query)) {
  /* header('location:index.php');
    ob_flush();
    */
    echo "<div class='alert alert-success mt-4' role='alert'><h3>El registro se editó exitosamente.</h3>
    <a class='btn btn-outline-primary' href='index.php' role='button'>Ver organizaciones</a> </div>";		
    } else {
        echo "Error: " .$query. "<br>" .mysqli_error($conexion);
    }	
}
mysqli_close($conexion);

            ?>

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

