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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="editar.js" type="text/javascript"></script>
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
                    Catálogo: Preguntas
                </div>
                <div class="card-body">
                    <input type="button" class="btn btn-primary mb-3" OnClick="location.href='nuevo.php'" value="Nueva"></input>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Preguntas</th>
                                <th>Decálogo</th>
                                <th>Tipo</th>
                                <th>Aseveración</th>
                                <th>Actualización</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "select id, pregunta, id_decalogo_aseveracion,id_decalogo, tipo, actualizacion from preguntas order by id";
                            $stmt = $conexion->prepare($sql);
                            $stmt->execute();
                            $stmt->bind_result($id,$pregunta,$aseveracion,$decalogo,$tipo,$actualizacion);
                            $fila = 1;
                            $stmt->store_result();
                            while ($stmt->fetch()){
                            echo "<tr>";
                            echo "<td>$fila</td>";
                            echo "<td>$pregunta</td>";
                            //$stmt->close();
                            if(strlen(trim($decalogo))==0) echo"<td>No disponible</td>";
                            else {
                                $sql2 = "select decalogo from decalogos where id = $decalogo";
                                //"select decalogo from decalogos where id =?"
                                $stmt2 = $conexion->prepare($sql2);
                                //echo $conexion->error;
                                //$stmt2->bind_param("i",$decalogo);
                                $stmt2->execute();
                                $stmt2->bind_result($decal);
                                $stmt2->fetch();
                                //$conexion->close();
                                echo "<td>$decal</td>";
                                $stmt2->close();
                            }
                            if($tipo=='M'){
                                $tipoC ="Opción Múltiple";
                            }else {
                                $tipoC ="Abierta";
                            }
                            echo"<td>$tipoC</td>";
                            if(strlen(trim($aseveracion))==0) echo"<td>No disponible</td>";
                            else {
                                $aseveracion = (integer)$aseveracion;
                                $sql1 = "select aseveracion from decalogos_aseveraciones where id=?";
                                $stmt1 = $conexion->prepare($sql1);
                                $stmt1->bind_param("i", $aseveracion);
                                $stmt1->execute();
                                $stmt1->bind_result($aseve);
                                $stmt1->fetch();
                               // $conexion->close();
                                echo "<td>$aseve</td>";
                                $stmt1->close();

                            }
                            echo"<td>$actualizacion</td>";
                            ?>
                            <td>
                                <div class="row justify-content-center">
                                    <button type='button' class="btn btn-xs btn-light edit" onclick="javascript:editar(<?=$id;?>,'<?=$pregunta;?>');" data-target="#editar" data-toggle="modal">

                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    &nbsp;

                                    <button type='button' class="btn btn-xs btn-light change" onclick="javascript:eliminar(<?=$id;?>);" data-toggle="modal" data-target="#delete"><i class="fa fa-trash"></i></button>

                                <?php
                                echo "</tr>";
                                $fila++;
                                }

                                ?>
                                </div>
                            </td>
                            </tbody>
                        </table>

                </div>
                    <div class="card-footer small text-muted">Última actualización

                        <?php

                        foreach ($conexion->query('select actualizacion from preguntas order by actualizacion desc limit 1') as $fecha){
                            echo $fecha['actualizacion'];
                        }
                        ?>
                    </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <!--Edit Item Modal -->
        <div id="editar" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">

        </div>
        <!--Delete Modal -->
        <div id="delete" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Eliminar Pregunta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                            ¿Está seguro de que desea eliminar esta pregunta?
                            <input type="hidden" id="idpregunta" value="0"/>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" value="Eliminar" id="btn-eliminar">Si, eliminar</button>

                        </div>
                    </div>

            </form>
        </div>
    </div>


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