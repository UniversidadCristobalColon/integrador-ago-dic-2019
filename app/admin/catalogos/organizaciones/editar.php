<?php
ob_start();
require_once '../../../../config/global.php';
require_once '../../../../config/db.php';
define('RUTA_INCLUDE', '../../../../'); //ajustar a necesidad

if(isset($_POST['cambiar'])){
    $cambiar =  $_POST["cambiar"];
    $find=mysqli_query($conexion,"SELECT * FROM organizaciones WHERE id='$cambiar'");
    $row=mysqli_fetch_array($find);
    $estado=$row['estatus'];
  

    if($estado == "Activo"){
         $sqlCambiar = "UPDATE organizaciones SET estatus = 'Inactivo' WHERE id = '$cambiar' ";
    }else{
        $sqlCambiar = "UPDATE organizaciones SET estatus = 'Activo'  WHERE id = '$cambiar' ";
    }

        if ($conexion->query($sqlCambiar) === TRUE) {
            header("location: index.php");
            ob_flush();
        }else{
            echo "Error updating record: " . $conexion->error;
        }
}

if(isset($_POST['editar'])){
    $id =  $_POST['editar'];


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
		$('input[name="organizacion"]').val() == ''
	) {
        errores = true;

		Swal.fire({
        icon: 'error',
        title: 'Error...',
        text: 'Debes introducir un nombre para la organización'
});
    mostrarErrores();
	}
   
    $('#agregar').submit();
    }


</script>

<?php 
$buscar=mysqli_query($conexion,"SELECT * FROM organizaciones WHERE id='$id'");
$fila=mysqli_fetch_array($buscar);
$organizacion=$fila['organizacion'];



?>

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
                        Catálogo: Organizaciones
                    </div>
         
                <div class="card-body">
                <form id="agregar" action="guardarEditar.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Organización</label>
                                <input type="text" name="organizacion" class="form-control" value="<?php echo $organizacion; ?>">
                            </div>
                        </div>
                    </div>

                 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit"  class="btn btn-primary" id="boton" onclick="validaFormulario()">Guardar</button>
                            </div>
                        </div>
                    </div>
    
                    
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?> " >
                         
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
<?php } ?>