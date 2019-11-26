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
		$('input[name="organizacion"]').val() == ''
	) {
		errores = true;
		$('#texto-errores').text(
			"Debes introducir un nombre para la organización"
		);
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
            <div class="card-header">
                    <i class="fas fa-table"></i>
                    Agregar una nueva organización
                </div>
            <hr>
            <form id="agregar" action="guardar.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Organización:</label>
                            <input type="text" name="organizacion" class="form-control" placeholder="Introduce el nombre de la organización">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="boton" onclick="validaFormulario()">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>

            <div id="errores" title="Error" class="ui-helper-hidden" style="color: red">
				<div id="texto-errores">
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

