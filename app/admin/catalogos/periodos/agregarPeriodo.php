<?php
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
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

<script>

    $(document).ready(funtion(){
        $("#error").dialog({
            width: 580,
            height: 225,
            autoOpen: false,
            modal: true
        });
    });

    function mostrarError(){
        $("#error").dialog("open");
    }

    function validarFormulario(params) {
        event.preventDefault();
        var error = false;

        if(
            $('input[name="periodo"]').val() == ''
        ){
            error = true;
            $('#texto-error').text(
                "Introduce el nombre del Periodo"
            );
            mostrarError();
        }
        $('#agregar').submit();
    }

</script>



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
                    Catálogo: Agregar Periodo
                </div>

    <hr>
                <form id="agregar" action="guardarPeriodo.php" method="post">
                    <div class="row">
                        <div class = "col-md-4">
                            <div class="form-group">
                                <label>Periodo</label>
                                <input type="text" name="periodo" class="form-control" placeholder="Introduzca el Periodo">
                            </div>
                        </div>
                    </div>

                          <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="boton" onclick="validarFormulario()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="error" title="Error" class="-ui-helper-hidden" style="colorr: red">
                    <div id="texto-error">
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