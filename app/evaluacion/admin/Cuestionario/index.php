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

    <script>
        function deshabilitar(id){
            location.href="deshabilitar.php?id="+id;
        }
        function editar(id){
            location.href="editar.php?id="+id;
        }
    </script>

    <?php getTopIncludes(RUTA_INCLUDE )?>
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
                    Catalogo: Cuestionarios
                </div>
                <div class="card-body">
                    <a href="init.php" class="btn btn-primary mb-3">Nuevo</a>


                    <div class="table-responsive">
                        <?php
                        $sql = "SELECT * FROM cuestionarios";
                        $resultado = $conexion -> query($sql);
                        if($resultado)    {
                        ?>

                        <table class="table table-bordered" id="dataTable">
                            <thead>
                            <tr>
                                <th>Cuestionario</th>
                                <th>Estado</th>
                                <th>Creacion</th>
                                <th>Actualizacion</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            }
                            while($row = $resultado -> fetch_assoc()) { //esto es para recorrer toda la tabla de mysql
                                ?>
                                <tr>
                                    <?php $id = $row['id'] ?>
                                    <?php if($row['estado']=='A'){
                                        $estado="Activo";
                                    }else if($row['estado']=='B'){
                                        $estado="Inactivo";
                                    } ?>
                                    <td><?php echo $row['cuestionario'] ?></td>
                                    <td><?php echo $estado ?></td>
                                    <td><?php echo $row['creacion'] ?></td>
                                    <td><?php echo $row['actualizacion'] ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-light" title="Editar registro" href="editar.php?id=<?php  echo $row["id"]; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <button title="Cambiar estado"  type="button" onclick="eliminar(<?php echo $id ?>)" class="btn btn-xs btn-light" ">
                                        <i class='fas fa-exchange-alt'></i>
                                        </button>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Última actualización

                    <?php

                    foreach ($conexion->query('SELECT actualizacion from cuestionarios order by actualizacion desc limit 1') as $fecha){
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