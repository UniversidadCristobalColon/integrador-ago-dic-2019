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

    $(document).ready(funtion){
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
            $('input[name="puesto"]').val() == ''
        ){
            error = true;
            $('#texto-error').text(
                "Introduce el nombre del Puesto"
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
                    Catálogo: Editar Puesto
                </div>


                <form id="agregar" action="guardar.php" method="post">
                    <div class="row">
                        <div class = "col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Puesto</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="puesto" placeholder="Introduzca el Puesto">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class = "col-md-4">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nivel de Puesto</label>
                                <input type="text" name="nivel" class="form-control" id="exampleInputPassword1" placeholder="Introduzca ID del nivel de puesto">
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

                <div id="error" title="Error" class="-ui-helper-hidden" style="color: red">
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