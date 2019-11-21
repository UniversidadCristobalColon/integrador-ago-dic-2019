<?php

session_start();
if(isset($_SESSION['usuario'])) {
    header("location: ./admin/catalogos/competencias/index.php");
} elseif(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
    session_destroy();
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

    <title>Evaluación 360</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php 
    if(isset($_GET['error'])) {
        echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
    }
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Bienvenido</div>
        <div class="card-body">
            <form method="post" action="login.php">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                               required="required" autofocus="autofocus" name="email">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                               required="required" name="pass">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <input type="submit" value="Ingresar" class="btn btn-primary btn-block">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="recuperar.php">¿Olvidó su contraseña?</a>
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
