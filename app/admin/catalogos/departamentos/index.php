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
                    Catálogo: Departamentos
                </div>
                <div class="card-body">
                <button class="btn btn-primary mb-3" onclick="location.href ='nuevo.php'">Agregar</button>

                    <div class="table-responsive">
                    <form id="tableform" action="editar.php" method="post">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                            <thead>
                            <tr>
                                <th>Departamento</th>
                                <th>Organización</th>
                                <th>Última actualización</th>
                                <th>Estatus</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                           
                            <?php foreach ($conexion->query('SELECT * from departamentos') as $row){ ?> 
                            
                            <tr>
                                <td><?php echo $row['departamento'] ?></td>
                                <td><?php echo $row['organizaciones_id']  ?></td>
                                <td><?php echo $row['ultima_actualizacion'] ?></td>
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
                <div class="card-footer small text-muted"> Última actualización <?php 
                
                foreach ($conexion->query('SELECT actualizacion from organizaciones order by actualizacion desc limit 1') as $fecha){
                 echo $fecha['actualizacion'];
                }
                ?>
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
