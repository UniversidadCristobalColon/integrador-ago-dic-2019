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
       
        
    
    <title><?php echo PAGE_TITLE ?></title>

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
                    Catálogo: Organizaciones
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3" onclick="location.href ='nuevo.php'">Nueva</button>

                    <div class="table-responsive">
                    <form id="tableform" action="editar.php" method="post">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Organización</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                           
                            <?php foreach ($conexion->query('SELECT * from organizaciones') as $row){ ?> 
                            
                            <tr>
                                <td><?php echo $row['organizacion'] ?></td>
                                <td><?php echo $row['creacion'] ?></td>
                                <td><?php echo $row['actualizacion'] ?></td>
                                <td><?php echo $row['estatus'] ?></td>
                                <td class="text-center">
                                                        
                                                        <button type="submit" title="Editar registro"  name="editar" value="<?php  echo $row["id"]; ?>" id="<?php  echo $row["id"]; ?>"  class="btn btn-xs btn-light edit">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button> 
                                <?php

                                
                                
                                ?>
                                                        <button type="submit" title="Cambiar estatus" name="cambiar" value="<?php echo $row['id'] ?>" id="<?php  echo $row["id"]; ?>" class="btn btn-xs btn-light change" >
                                                            <i class="fas fa-exchange-alt"></i>
                                                        </button>
                                                    
                                </td>
                            </tr>
<?php
}
?>
                            </tbody>

                        </table>
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted">Última actualización
                
                 <?php 
                
                foreach ($conexion->query('SELECT actualizacion from organizaciones order by actualizacion desc limit 1') as $fecha){
                 echo $fecha['actualizacion'];
                }
                ?>
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

<script>


/*
function borrar(){
    $(document).ready(function(){
        console.log("kdsabk")
        var tabla = $('#dataTable').DataTable();
        $('#dataTable tbody').on( 'click', '.delete', function (e){
        e.preventDefault();
        var id = $(this).attr('id');

    Swal.fire({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
                    url:"eliminar.php",
                    method:'POST',
                    data:{id:id}
                   
			     })
                
                        

			     .done(function(response){
			     	Swal.fire('Deleted!', response.message, response.status);

                     tabla
                        .row( $(this).parents('tr') )
                        .remove()
                        .draw(); 
                    
                        console.log(id);
			     })
                 
			     .fail(function(){
			     	Swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: true			  
		});	 
        

});
});
}*/

</script>

<?php getFooter() ?>

</body>

</html>