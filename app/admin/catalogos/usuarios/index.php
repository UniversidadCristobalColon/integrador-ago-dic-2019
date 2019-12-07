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
    <script src=""></script>
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
                    Catálogo: Usuarios
                </div>
                <div class="card-body">
                <form action="users.php" method="POST" id="usersTable">
                    <button class="btn btn-primary mb-3">Nuevo</button>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th class="text-center">Correo Electrónico</th>
                                <th class="text-center">Creado en</th>
                                <th class="text-center">Actualizado en</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            
                            </thead>
                            <tbody>
                            <?php
                                require_once("../../../../config/db.php");


                                $sql = "SELECT usuarios.id, email, usuarios.creacion, usuarios.actualizacion, usuarios.estado usuarios from usuarios left join empleados on empleados.id = usuarios.id";

                                $result = $conexion->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        //echo "id: " . $row["id"]. " - Name: " . $row["nombre"]. " " . $row["apellidos"]. "<br>";
                            ?>
                                <tr>
                                <td class="text-center"><?php  echo $row["email"] ?></td>
                                <td class="text-center"><?php  echo $row["creacion"] ?></td>
                                <td class="text-center"><?php  echo $row["actualizacion"] ?></td>
                                
                                <?php
                                    if($row["usuarios"] == 'B'){
                                ?>
                                <td class="text-center">Inactivo</td>
                                <td class="text-center align-middle">
                                    <button style="border:none; background-color: rgba(255, 0, 0, 0);" type="submit" name = "edit" value="<?php echo $row['id']?>">
                                        <i class="fas fa-pencil-alt text-center mx-auto"></i>
                                    </button>
                                <?php
                                    }else {
                                ?>
                                <td class="text-center">Activo</td>
                                <td class="text-center align-middle">
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
                                $conexion->close();

                            ?>
                            </form>
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


<style>
.table-responsive {
max-width: 100%;
margin: 0 auto;
}
#dataTable th, td {
white-space: nowrap;

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>
