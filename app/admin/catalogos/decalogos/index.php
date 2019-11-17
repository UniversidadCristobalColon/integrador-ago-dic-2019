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
                    Catálogo: Decálogos
                </div>
                <div class="card-body">

                    <div class="row ml-auto mb-3">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Nuevo
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">

                                <div class="modal-content">
                                    <form name="form-nuevo" method="post" action="nuevo.php">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Nuevo decálogo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="addon-wrapping">Decálogo</span>
                                                </div>
                                                <input type="text" name="nuevodeca" class="form-control" placeholder="Escribe aquí el nombre del nuevo decálogo" aria-label="Username" aria-describedby="addon-wrapping">
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <input type="submit" class="btn btn-primary" value="Guardar"/>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Decálogo</th>
                                <th>Creación</th>
                                <th>Actualización</th>
                                <th>id_escala</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php
                            $sql = "SELECT decalogo, creacion, actualizacion, id_escala FROM decalogos";
                            $resultado = mysqli_query($conexion,$sql);
                            if($resultado){
                                while($fila=mysqli_fetch_assoc($resultado)){
                                    echo "<tr>";
                                    echo "<td>$fila[decalogo]</td>";
                                    echo "<td>$fila[creacion]</td>";
                                    echo "<td>$fila[actualizacion]</td>";
                                    echo "<td>$fila[id_escala]</td>";
                                    echo "<td class='text-center'>";
                                    echo "<a href='blank'>";
                                    echo "<i class='fas fa-edit'></i>";
                                    echo "</a>";
                                    echo "<a href='blank'>";
                                    echo "<i class='fa fa-trash'></i>";
                                    echo "</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }else {
                                echo "ERROR";
                            }
                            ?>


                            <!-- <tr>
                                <td>A</td>
                                <td>2019/11/01</td>
                                <td>2019/11/02</td>
                                <td>D</td>
                                <td class="text-center">
                                        <a href="blank">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="blank">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                </td>
                            </tr> -->

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
