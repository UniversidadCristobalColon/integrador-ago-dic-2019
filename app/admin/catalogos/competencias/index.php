<?php

include '../../../../config/db.php';
session_start();
require_once '../../../../config/global.php';
ob_start();

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
<?php 
    getModalLogout('../../../');
?>
<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">
          
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Catálogo: Competencias
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3" OnClick="location.href='nuevo.php'" value="Nuevo">Nuevo</button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Competencia</th>
                                <th>Creación</th>
                                <th>Última actualización</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = 'select * from competencias';
                                    $result = mysqli_query($conexion,$sql) or die('Consulta fallida: ' . mysqli_error());

                                    while ($row = mysqli_fetch_array($result)){
                                        if($row['estado']=='A'){
                                                $estado = 'Activo';
                                        }else{
                                            $estado = 'Inactivo';
                                        }
                                        echo "<tr>
                                        <td>$row[competencia]</td>
                                        <td>$row[creacion]</td>
                                        <td>$row[actualizacion]</td>
                                        <td>$estado</td>
                                        <td><button class='btn btn-light' onclick='actualizar($row[id]);'><i class='fas fa-pencil-alt'></i></button>
                                        <button class='btn btn-light' onclick='eliminar($row[id]);'><i class='fas fa-exchange-alt'></i></button></td>
                                        </tr>";
                                    }
                                ob_end_flush();
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <script type="text/javascript">
                        function eliminar(id){
                            location.href="eliminar.php?id="+id;
                        }
                        function actualizar(id){
                            location.href="agregar_editar.php?id="+id;
                        }
                    </script>
                </div>
                <div class="card-footer small text-muted">Última actualización
                    <?php
                    foreach ($conexion->query('SELECT actualizacion from escalas order by actualizacion desc limit 1') as $fecha) {
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
