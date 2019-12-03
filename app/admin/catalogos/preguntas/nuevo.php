<?php
require_once '../../../../config/global.php';
require '../../../../config/db.php';
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
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="nuevo.js" type="text/javascript"></script>
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
                    Añadir pregunta
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <form>
                            <div class="form-group">
                                <label for="orden">Decálogo</label>
                                <select class="form-control" id="decalogo" required>
                                    <?php
                                    $sql= "select id,decalogo from decalogos order by id";
                                    $stmt = $conexion->prepare($sql);
                                    $stmt->execute();
                                    $stmt->bind_result($did,$decalogo);
                                    echo "<option value='' disabled></option>";
                                    while($stmt->fetch()){
                                        echo "<option value='$did'>$decalogo</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="orden">Aseveración</label>
                                <select class="form-control" id="aseveracion" required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pregunta">Pregunta</label>
                                <input type="text" class="form-control" id="pregunta" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de pregunta</label>
                                <select class="form-control" id="tipo" required>
                                    <option value="M">Opción Múlltiple</option>
                                    <option value="A">Abierta</option>
                                </select>
                            </div>
                            <input type="hidden" id="ip" value="<?php echo getIP();?>"></input>
                            <div>
                                <input type="button" class="btn btn-primary mb-3" id="nuevo" value="Guardar"></input>
                                <input type="button" class="btn btn-secondary mb-3" OnClick="location.href='index.php'" value="Cancelar"></input>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <?php
        function getIP(){
            if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                //ip from share internet
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                //ip pass from proxy
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        ?>

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