<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';

$sql = "SELECT host, port, username, password, email_name FROM email_conf";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $host = $row['host'];
        $port = $row['port'];
        $username = $row['username'];
        $password = $row['password'];
        $mailName = $row['email_name'];
    }
}


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

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-mail-bulk"></i>
                    Parametros SMTP
                </div>
                <div class="card-body">
                    <form>
  <div class="form-group">
    <label for="mailConfigHost">Host</label>
    <input type="form-text" class="form-control" id="mailConfigHost" value ="<?php echo $host;?>" placeholder="Host" readonly>
  </div>
  <div class="form-group">
    <label for="mailConfigPort">Port</label>
    <input type="form-text" class="form-control" id="mailConfigPort" value ="<?php echo $port;?>" placeholder="Port" readonly>
  </div>  
  <div class="form-group">
    <label for="mailConfigUser">User</label>
    <input type="form-text" class="form-control" id="mailConfigUser" value ="<?php echo $username;?>" placeholder="User" readonly>
  </div>  
  <div class="form-group">
    <label for="mailConfigPass">Pass</label>
    <input type="password" class="form-control" id="mailConfigPass" value ="<?php echo $password;?>" placeholder="Pass">
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>

                   
                    </div>
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
