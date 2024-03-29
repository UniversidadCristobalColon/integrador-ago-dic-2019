<?php 

$email = @$_GET['email'];
$token = @$_GET['token'];

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Evaluación 360</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php 
    $errores[3] = 'Error contraseñas no coinciden.';
    
    if(isset($_GET['error'])) {
        if(isset($errores[$_GET['error']])) {
            echo '<div class="alert alert-danger">'.$errores[$_GET['error']].'</div>';
        }
    }
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Nueva contraseña</div>
        <div class="card-body">
            <form method="post" action="password.php">
                <input type="email" value="<?php echo $email ?>" name="usuario" hidden>
                <input type="text" value="<?php echo $token ?>" name="token" hidden>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña"
                               required="required" name="pass">
                        <label for="inputPassword">Contraseña</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword1" class="form-control" placeholder="Contraseña"
                               required="required" name="pass1">
                        <label for="inputPassword1">Confirmar Constraseña</label>
                    </div>
                </div>
                <input type="submit" value="Cambiar Contraseña" class="btn btn-primary btn-block">
            </form>
            <div class="text-center">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
