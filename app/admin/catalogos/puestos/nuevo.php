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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <title><?php echo PAGE_TITLE ?></title>


    <?php getTopIncludes(RUTA_INCLUDE ) ?>
</head>

<script>
    $(document).ready(function(){


        $("#errores").dialog({
            width: 580,
            height:225,
            autoOpen:false,
            modal:true
        });
    });
    function mostrarErrores(){
        $("#errores").dialog("open");
    }

    function validaFormulario(params) {
        event.preventDefault();
        var errores = false;

        if (
            $('input[name="puesto"]').val() == ''
        ) {
            errores = true;

            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Favor de llenar todos los campos'
            });
            mostrarErrores();
        }

        if (
            $('select[name="estado"]').val() == 'Selecciona un estado'
        ) {
            errores = true;

            Swal.fire({
                icon: 'error',
                title: 'Error...',
                text: 'Debes llenar los campos requeridos'
            });
            mostrarErrores();
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

            <!-- Page Content -->
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Catálogo: puestos
                </div>

                <div class="card-body">
                    <form id="agregar" action="guardar.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Puesto</label>
                                    <input type="text" name="puesto" class="form-control">
                                </div>
                            </div>

                        <div class="card-body">
                            <form id="agregar" action="guardar.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nivel de puesto</label>
                                            <select name="idpuesto" class="form-control">
                                            <?php
                                            foreach ($conexion->query('SELECT id, nivel_puesto from niveles_puesto') as $row){
                                            ?>
                                             <option value="<?php echo $row['id'];?>"><?php echo $row['nivel_puesto'];?></option>
                                            <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select id="estado" name="estado" class="form-control">
                                        <option>Selecciona un estado</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="boton" onclick="validaFormulario()">Guardar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div id="errores" title="Error" class="ui-helper-hidden" style="color: red">
                    <div id="texto-errores">
                    </div>
                </div>

            </div>

        </div>
        <!-- /.container-fluid -->


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
<?php getFooter() ?>
</body>
</html>

