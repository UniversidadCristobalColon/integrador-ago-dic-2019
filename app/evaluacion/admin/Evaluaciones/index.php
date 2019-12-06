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
        function eliminar(id){
            var respuesta=confirm('¿Está seguro de que desea eliminar este cuestionario?');
            if(respuesta===true){
                window.location='deshabilitar.php?id='+id;
            }
        }
    </script>

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
                    Catalogo: Evaluaciones
                </div>
                <div class="card-body">
                    <a href="nuevaEvaluacion.php"><button class="btn btn-primary mb-3">Nuevo</button></a>
                    <?php
                        if(!empty($_GET["error"])){
                            $error=$_GET["error"];
                            if($error==1){
                                echo
                                '<div class="alert alert-success" role="alert">
                                    El cuestionario ha sido eliminado
                                </div>';
                            }else if($error==2){
                                echo
                                '<div class="alert alert-danger" role="alert">
                                    El cuestionario no se puede eliminar porque ya ha sido utilizado en una evaluación.
                                </div>';
                            }
                        }?>
                    <div class="table-responsive">
                        <?php
                        $sql = "SELECT eval.id, p.periodo, d.departamento, eval.descripcion 
                                from evaluaciones eval 
                                left join periodos p 
                                on eval.id_periodo= p.id 
                                left join departamentos d 
                                on eval.id_departamento= d.id 
                                order by eval.creacion desc";
                        $resultado = $conexion -> query($sql);

                        if($resultado)    {
                        ?>
                        <form action="nuevaEvaluacion.php" method="post">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Periodo</th>
                                <th>Departamento</th>
                                <th>Descripción</th>
                                <th>Progreso</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            }
                            while($row = $resultado -> fetch_assoc()) { //con esto es para recorrer toda la tabla de mysql
                                ?>
                                <tr>
                                    <?php  $id = $row['id'] ;  ?>
                                    <td><?php echo $row['periodo'] ?></td>
                                    <td><?php echo $row['departamento'] ?></td>
                                    <td><?php echo $row['descripcion'] ?></td>
                                    <td>Aquí va la barra</td>
                                    <td>
                                        <button title="Editar registro" id="<?php  echo $row["id"]; ?>" type="submit" class="btn btn-xs btn-light" value="<?php  echo $row["id"]; ?>">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <button title="Eliminar registro"  type="button" onclick="eliminar(<?php  echo $row["id"]; ?>)" class="btn btn-xs btn-light" ">
                                        <i class="fa fa-trash" ></i>
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