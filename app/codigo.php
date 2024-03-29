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
    <link href="../css/estilos.css" rel="stylesheet">

</head>

<body class="index-login">
<?php 
    if(!empty($_GET['error'])) {
        $error = $_GET["error"];
        $texto = '';
        switch ($error){
            case '1':
                $texto = 'La evaluación ha concluido';
                break;
            case '2':
                $texto = 'Código de evaluación no encontrado';
                break;
            case '3':
                $texto = 'Código incorrecto';
                break;
        }
        echo '<div class="alert alert-danger">'.$texto.'.</div>';
    }
?>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Evaluación 360</div>
        <div class="card-body">
            <div class="text-center mb-4">
                <h4>Acceder a una evaluación</h4>
            </div>
            <form method="post" action="procesar_codigo.php" onsubmit="document.getElementById('submit').disabled = true;">
                <div class="form-group">
                    <label for="inputCodigo">Código de evaluación</label>
                    <input type="text" id="inputCodigo" class="form-control" maxlength="7" placeholder="#######" required="required" autofocus="autofocus" name="codigo">
                    <small>¿Dudas? contacte al personal encargado de la evaluación</small>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Continuar" id="submit">
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="index.php">Página de inicio</a>
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
