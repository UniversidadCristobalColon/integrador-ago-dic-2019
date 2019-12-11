<?php
require_once '../../../../config/global.php';

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
    <?php 
    if(isset($_GET["confirm"])){
        if($_GET["confirm"] == 1){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se ha agregado un nuevo empleado',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
        if($_GET["confirm"] == 2){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se ha actualizado el empleado',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
        if($_GET["confirm"] == 3){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error al ingresar empleado',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
        if($_GET["confirm"] == 4){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Error al actualizar empleado',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
        if($_GET["confirm"] == 5){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se cambió a activo',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
        if($_GET["confirm"] == 6){
        ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Se cambió a inactivo',
            showConfirmButton: false,
            timer: 1500
        })
        </script>
        <?php
        }
}
    ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Catálogo: Empleados
                </div>
                <div class="card-body">
                <form action="employees.php" method="POST" id="employeeTable">
                    <button class="btn btn-primary mb-3" onclick="create()">Nuevo</button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">Número de empleado</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Departamento</th>
                                <th class="text-center">Puesto</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Actualizado en</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php
                                require_once("../../../../config/db.php");


                                $sql = "SELECT E.id, num_empleado, nombre, apellidos, email, E.creacion, 
                                actualizacion, departamento, puesto, E.estado 
                                FROM empleados E left JOIN departamentos D on E.id_departamento = D.id 
                                left JOIN puestos P on E.id_puesto = P.id ORDER BY E.estado";

                                $result = $conexion->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        //echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidos"]. "<br>";
                            ?>
                                <tr>
                                <td><?php  echo $row["num_empleado"] ?></td>
                                <td><?php  echo $row["nombre"]." ".$row["apellidos"] ?></td>
                                <td><?php  echo $row["email"] ?></td>
                                <td><?php  echo $row["departamento"] ?></td>
                                <td><?php  echo $row["puesto"] ?></td>
                                
                                
                                <?php
                                    if($row["estado"] == 'B'){
                                ?>
                                <td >Inactivo</td>
                                <td><?php  echo $row["actualizacion"] ?></td>
                                <td class="align-middle">
                                    <button style="border:none; background-color: rgba(255, 0, 0, 0);" type="submit" name = "edit" value="<?php echo $row['id']?>">
                                        <i class="fas fa-pencil-alt text-center mx-auto"></i>
                                    </button>
                                <?php
                                    }else{
                                ?>
                                <td >Activo</td>
                                <td ><?php  echo $row["actualizacion"] ?></td>
                                <td class = "align-middle">
                                    <button  style="border:none; background-color: rgba(255, 0, 0, 0);" type="submit" name = "edit" value="<?php echo $row['id']?>">
                                        <i style="cursor:pointer" class="fas fa-pencil-alt text-center mx-auto"></i>
                                    </button>

                                <?php
                                    }
                                ?>
                                    <button style="border:none; background-color: rgba(255, 0, 0, 0);" type="submit" name = "delete" value="<?php echo $row['id']?>">
                                        <i style="cursor:pointer" class="fas fa-exchange-alt text-center mx-auto"></i>
                                    </button>
                                </td>
                                </tr>

                            <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                            ?>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
                $sqlLast = "SELECT actualizacion FROM `empleados` order by actualizacion desc limit 1";
                $result = $conexion->query($sqlLast);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $last = $row["actualizacion"];
                ?>
                <div class="card-footer small text-muted">Última actualización <?php echo $last;?></div>
                <?php
                    }
                }
                ?>
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

<script>
function upload(e){
    edit = (e.children.edit);
    console.log(edit);
    document.getElementById('employeeTable').submit();
    // window.location.href = "employees.php";
}
</script>
<script type="text/javascript" src="index.js"></script>
<script type="text/javascript" src="create.js"></script>
<style>
    .fa-edit:hover{
        color: rgb(235, 166, 16);
    }
    .fa-trash-alt:hover{
        color:red;
    }
</style>
</body>

</html>
