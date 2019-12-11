<?php
require_once '../../../../config/global.php';
include '../../../../config/db.php';
$cues = $_GET['id'];
if (empty($cues)){
    header("location: index.php");
}

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

    <script>
        function guardarPreguntas() {
            $('#form_preguntas').submit()
        }


    </script>

    <script>
        function eliminarPreguntas() {
            $('#form_preguntasEliminar').submit()
        }

        function guardarRespuesta() {
            $('#form_respuesta').submit()
        }

        function abrirModalRespuestas(id_pregunta) {
            $('#idPregunta').val(id_pregunta);
            $('#modalRespuesta').modal('show');

        }

        function dell(id,idcues) {
            var respuesta = confirm("¿Está seguro de que desea eliminar esta pregunta del cuestionario?");
            if (respuesta===true) {
                window.self.location = "eliminar_preguntas.php?id="+id+"&idcues="+idcues;
            }

        }

        function dellResp(id,idcues) {
            var respuesta = confirm("¿Está seguro de que desea eliminar estas respuestas de la pregunta?");
            if (respuesta===true) {
                window.self.location = "eliminar_respuestas.php?id="+id+"&idcues="+idcues;
            }



        }





    </script>
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
                    Editor de Cuestionario
                </div>
                <div class="card-body">
                    <!-- Menu para definir mi cuestionario -->

                    <div class="form-group">
                        <form method="post" action="guardar_cuestionario.php">
                            <input type="hidden" name="idCuestionario" id="idCuestionario" value="<?php echo $cues?>">
                        <label for="exampleInputEmail1">Nombre</label>
                            <input type="hidden" value="<?php echo $cues ?>" name="id">
                        <input name="Cuestionario" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php
                        $sqlc = "select cuestionario, id from cuestionarios where id=$cues";
                        $resultadoc = mysqli_query($conexion, $sqlc);
                        if ($resultadoc){
                            while ($filac = mysqli_fetch_assoc($resultadoc)){
                                echo $filac["cuestionario"];
                            }
                        }?>">

                    </div>



                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModalLong">
                        Agregar Pregunta
                    </button>



                        <button type="input" class="btn btn-primary mb-3" >Guardar Cuestionario</button>

                        <!--<button onclick="" type="button" class="btn btn-primary mb-3 btn-danger">Borrar Cuestionario</button> -->
                    </form>




                    <!-- **********************************************-->
                    <!-- Tabla donde muestro mis preguntas -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Opciones</th>

                            </tr>
                            </thead>
                            <form action="eliminar_preguntas.php" method="post" id="form_preguntasEliminar">
                                <input type="hidden" name="idCuestionario" id="idCuestionario" value="<?php echo $cues?>">
                                <tbody>

                                <tr>
                                    <?php
                                    $idCuest = $cues;
                                    $contador = 0;


                                    $sql2 = "select pregunta, id, orden from preguntas where id_cuestionario = $cues order by orden";
                                    $resultado2 = mysqli_query($conexion, $sql2);




                                    if ($resultado2){
                                        while ($filap = mysqli_fetch_assoc($resultado2)){
                                            $sql3 = "select b.respuesta, a.puntos 
                                                        from preguntas_respuestas a, respuestas b 
                                                        where 
                                                        a.id_respuesta = b.id and
                                                        a.id_pregunta = $filap[id] 
                                                        order by a.orden_respuesta asc";

                                            $sqlcom = "SELECT competencias.competencia 
                                                        from competencias 
                                                        LEFT JOIN preguntas on preguntas.id_competencia = competencias.id 
                                                        WHERE preguntas.id = $filap[id]";
                                            $resultadocom = mysqli_query($conexion, $sqlcom);
                                            $filacom = mysqli_fetch_assoc($resultadocom);
                                            $competencia = "";
                                            if(empty($filacom)){
                                                $competencia = "No hay competencia asociada a esta pregunta";
                                            }else{
                                                $competencia= $filacom['competencia'];
                                            }

                                            $sqll = "SELECT COUNT(id_pregunta) as contar from preguntas_respuestas WHERE id_pregunta = $filap[id] ";
                                            $resultadol = mysqli_query($conexion, $sqll);
                                            if ($resultadol){
                                                $filal = mysqli_fetch_assoc($resultadol);
                                                $contador = $filal['contar'];
                                            }

                                            if ($contador > 0){
                                                $resultado3 = mysqli_query($conexion, $sql3);

                                                $html_respuesta = "<ul>";
                                                if ($resultado3) {
                                                    while ($filar = mysqli_fetch_assoc($resultado3)) {
                                                        $html_respuesta.="<li>$filar[respuesta] ($filar[puntos])</li>";

                                                    }
                                                }
                                                $html_respuesta.= "</ul>";
                                            }else{

                                                $html_respuesta = "No hay respuesta asociada a esta pregunta";
                                            }

                                            echo "
                                        <tr>
                                        
                                        <td>
                                        <div>
                                        <h6>$competencia</h6>
                                        $filap[orden] .-  $filap[pregunta]  
                                        
                                        </div>
                                        <div>
                                        <small>$html_respuesta</small>
                                        </div>
                                        </td>
                                       
                                <td>
                                <button  title='Editar respuestas' type=\"button\" class=\"btn btn-light\" onclick='abrirModalRespuestas($filap[id])'>
                                <i class=\"fas fa-edit\"></i>
                                    </button>
                                   
                                    <a onclick='dell($filap[id],$idCuest)' class=\"btn btn-light\" title='Eliminar pregunta' >
                                        <i class=\"fa fa-trash\"></i>
                                    </a>
                                    
                                    <a onclick='dellResp($filap[id],$idCuest)' class=\"btn btn-light\" title='Eliminar respuestas' >
                                        <i class=\"fas fa-times-circle\"></i>
                                    </a>
                                  

                                </td>
                                </tr>
                                        ";

                                        }

                                    }


                                    ?>




                                </tr>


                                </tbody>
                            </form>
                        </table>
                    </div>
                    <!-- ******************************************************** -->

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




<!-- ***********MODAL RESPUESTAS************* -->

<div class="modal fade" id="modalRespuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selección de respuestas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="guardar_respuesta.php" method="post" id="form_respuesta">
                        <input type="hidden" name="idPregunta" id="idPregunta" value="">
                        <input type="hidden" name="idCuestionario" id="idCuestionario" value="<?php echo $cues?>">
                    <div class="row">
                        <div class="col">
                            <label>Comptencia</label>
                            <select class="form-control" name="competencia">
                                <option value="0">Seleccione una opción</option>

                                <?php
                                $sqlC = "select competencia, id from competencias";
                                $resultadoC = mysqli_query($conexion, $sqlC);
                                if ($resultadoC){
                                    while ($filaC = mysqli_fetch_assoc($resultadoC)){
                                        echo " <option value='$filaC[id]'>$filaC[competencia]</option>  ";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">


                        <table class="table mt-3">


                            <?php
                            $sql = "select respuesta, id from respuestas";
                            $resultado = mysqli_query($conexion, $sql);
                            if ($resultado){
                                while ($fila = mysqli_fetch_assoc($resultado)){
                                    echo "
                                                           
                    <tr>
                    
                    
                     <td>
                        <div class=\"form-check form-check-inline ml-3\">
                     <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"$fila[id]\" name='respuestas[]'>
                      <label class=\"form-check-label\" for=\"inlineCheckbox1\"></label>
                        </div>
                    
                    </td>
                    <td> $fila[respuesta] </td>
                    
  
                    <td> <input name='puntaje_$fila[id]' type='number' class='form-control mb-2 mr-sm-2 mb-sm-0' placeholder='puntaje'> </td>
                    <td> <input name='orden_$fila[id]'' type='number' class='form-control mb-2 mr-sm-2 mb-sm-0' placeholder='orden'> </td>
                    </tr>
                                                           
                                                ";
                                }
                            }
                            ?>

                        </table>

                        </div>

                    </div>
                    </form>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a  class="btn btn-primary" onclick="guardarRespuesta()">Guardar</a>
            </div>
        </div>
    </div>
</div>





<!-- Modal de preguntas -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Selección de Preguntas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="guardar_preguntas.php" method="post" id="form_preguntas">
                        <input type="hidden" name="idCuestionario" id="idCuestionario" value="<?php echo $cues?>">
                        <div class="row">
                            <div class="col">
                        <table>

                            <?php
                            $Contador = 0;
                            $sql = "select pregunta, id from preguntas where id_cuestionario is null";
                            $sqlLleno = "select COUNT(pregunta) as cuenta from preguntas where id_cuestionario is null";
                            $resultado = mysqli_query($conexion, $sql);
                            $resultadoLleno = mysqli_query($conexion, $sqlLleno);
                            if($resultadoLleno){
                                $filaLleno = mysqli_fetch_assoc($resultadoLleno);
                                $Contador = $filaLleno['cuenta'];
                            }
                            if ($resultado){
                                if($Contador>0){
                                    while ($fila = mysqli_fetch_assoc($resultado)){
                                        echo "
                                                           
                                                            <tr>
                                                             <td>
                                                            
                                                                <div class=\"form-check form-check-inline ml-3\">
                                                             <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=\"$fila[id]\" name='preguntas[]'>
                                                              <label class=\"form-check-label\" for=\"inlineCheckbox1\"></label>
                                                                </div>
                                                            
                                                            </td>
                                                            <td> $fila[pregunta] </td>
                                                            <td>
                                                            <td> <input name='ordenp_$fila[id]'' type='number' class='form-control mb-2 mr-sm-2 mb-sm-0' placeholder='orden'> </td>
                                                          </td>
                                                            </tr>
                                                           
                                                ";

                                    }
                                } else {
                                    echo "<h2>No hay preguntas</h2>";
                                }


                            }
                            ?>

                        </table>
                    </form>


                </div>
            </div>
        </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarPreguntas()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!-- ****************************** -->
</body>

</html>