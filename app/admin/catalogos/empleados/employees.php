<?php
ob_start();
require_once '../../../../config/global.php';
require_once("../../../../config/db.php");

    $name = "";
    $lastname = "";
    $email = "";
    $department = "";
    $job = "";
    $submitted = false;
    $idEdited = "";

if(isset($_POST['delete'])){
    $deleteId =  $_POST["delete"];

    $sqlDelete = "UPDATE empleados SET 
        estado = 'B'
        WHERE id = $deleteId ";

        if ($conexion->query($sqlDelete) === TRUE) {
            header("location: index.php");
            ob_flush();
        } else {
            echo "Error updating record: " . $conexion->error;
        }
}

if(isset($_POST['edit'])){
    $idEdited =  $_POST['edit'];
    $submitted = true;
    $enable = "disabled";

    $sql = "SELECT E.id, num_empleado, nombre, apellidos, email, E.creacion, 
            actualizacion, departamento, puesto, E.estado 
            FROM empleados E left JOIN departamentos D on E.id_departamento = D.id 
            left JOIN puestos P on E.id_puesto = P.id where E.id = $idEdited";
            $result = $conexion->query($sql);
                                
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $name = $row["nombre"];
                    $lastname = $row["apellidos"];
                    $email = $row["email"];
                    $department = $row["departamento"];
                    $job = $row["puesto"];
                }
            }
}else{

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
</head>

<body id="page-top">

<?php getNavbar();
if(isset($_GET["error"])){
    $error = $_GET["error"];
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'El correo ya está en uso',
    });
    </script>
    <?php
}else{
    $error = "";
}
?>

<div id="wrapper">

    <?php getSidebar() ?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Catálogo: Empleados
                </div>
                <div class="card-body">
                    
                    <form method="POST" action="" onsubmit= "return checked()">
                        <div class="form-group">
                            <label for="names">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="name" aria-describedby="nameHelp" placeholder="Ingresa tu nombre" value = <?php echo $name; ?>>
                        </div>
                        <div class="form-group">
                            <label for="lastnames">Apellidos</label>
                            <input type="text" class="form-control" name="apellidos" id="lastname" aria-describedby="lastnameHelp" placeholder="Ingresa tus apellidos" value = <?php echo $lastname; ?>>
                        </div>
                        <div class="form-group">
                            <label for="emails">Correo Electrónico</label>
                            <?php
                            if($enable == "disabled"){
                            ?>
                            <input type="email" name="correo" disabled class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico" value = <?php echo $email; ?>>
                            <?php
                            }else{ 
                            ?>
                            <input type="email" name="correo" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico" value = <?php echo $email; ?>>
                            <?php
                            }
                            ?>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="departments">Departamento</label>
                            <select class="form-control" id="department" name="departamento" ?>>
                                <?php


                                $sql = "SELECT departamento FROM `departamentos` order by departamento";

                                $result = $conexion->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($row["departamento"] == $department){
                                ?>
                                <option selected value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                <?php
                                        }else{
                                            ?>
                                <option value="<?php echo $row['departamento']; ?>"><?php echo $row['departamento']; ?></option>
                                            <?php
                                        }
                                    }
                                }else{
                                    echo "No hay resultados";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jobs">Puesto</label>
                            <select class="form-control" name="puesto" id="job" >
                                <?php 
                                $sql = "SELECT puesto FROM `puestos` order by puesto";

                                $result = $conexion->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        if($row["puesto"] == $job){
                                ?>
                                <option selected value="<?php echo $row["puesto"]; ?>"><?php echo $row["puesto"]; ?></option>
                                <?php
                                        }else{

                                            ?>
                                <option value="<?php echo $row["puesto"]; ?>"><?php echo $row["puesto"]; ?></option>
                                            <?php
                                        }
                                    }
                                }else{
                                    echo "No hay resultados";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <?php
                            if($submitted){
                        ?>
                        <button name="update" type="submit" class="btn btn-primary" value = "<?php echo $idEdited; ?>" >Actualizar</button>
                        <?php
                            }else{
                        ?>
                        <button name="insert" type="submit" class="btn btn-primary">Crear</button>
                        <?php
                            }
                        ?>
                        </div>
                    </form>
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
<style>
    .fa-edit:hover{
        color: rgb(235, 166, 16);
    }
    .fa-trash-alt:hover{
        color:red;
    }
</style>
<script src="check.js"></script>

<?php
    if(isset($_POST["update"])){
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $departamento = $_POST["departamento"];
        $puesto = $_POST["puesto"];
        $id_departamento = "";
        $id_puesto = "";
        $idUpdated = $_POST["update"];
        $ahora = "";

        $sqlDepartment = "SELECT id FROM departamentos where departamento = '$departamento'";
            $result2 = $conexion->query($sqlDepartment);
                                
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    $id_departamento = $row["id"];
                    echo $id_departamento;
                }
            }
        $sqlJob = "SELECT id FROM puestos where puesto = '$puesto'";
            $result3 = $conexion->query($sqlJob);
                                
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    $id_puesto = $row["id"];
                }
            }

        $sqlNow = "SELECT NOW()";
            $result4 = $conexion->query($sqlNow);
                                
            if ($result4->num_rows > 0) {
                while($row = $result4->fetch_assoc()) {
                    $ahora = $row["NOW()"];
                }
            }
            echo $ahora;
            print_r($ahora);
            $sqlUpdate = "UPDATE empleados SET 
            nombre='$nombre',
            apellidos = '$apellidos',
            -- email = '$correo',
            id_departamento = $id_departamento,
            id_puesto = $id_puesto,
            actualizacion = '$ahora'
            WHERE id = $idUpdated ";

        if ($conexion->query($sqlUpdate) === TRUE) {
            header("location: index.php");
            ob_flush();
        } else {
            echo "Error updating record: " . $conexion->error;
        }
    }
    if(isset($_POST["insert"])){

        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $correo = $_POST["correo"];
        $departamento = $_POST["departamento"];
        $puesto = $_POST["puesto"];
        $id_departamento = "";
        $id_puesto = "";
        $ahora = "";
        $random = "";

        $sqlEmail = "SELECT email FROM empleados where email = '$correo'";
        $resultEmail = $conexion->query($sqlEmail);                
            if ($resultEmail->num_rows > 0) {
                echo "Ya está utilizado el correo";
                header("location: employees.php?error=2");
            }else{

        $sqlDepartment = "SELECT id FROM departamentos where departamento = '$departamento'";
        $result2 = $conexion->query($sqlDepartment);                
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {
                    $id_departamento = $row["id"];
                }
            }
        $sqlJob = "SELECT id FROM puestos where puesto = '$puesto'";
            $result3 = $conexion->query($sqlJob);
                                
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    $id_puesto = $row["id"];
                }
            }

        $sqlNow = "SELECT NOW()";
        $result = $conexion->query($sqlNow);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ahora = $row["NOW()"];
            }
        }

        $sqlRandom = "SELECT FLOOR(RAND()*(1000-100+1)+100) AS 'RANDOM'";
        $result = $conexion->query($sqlRandom);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $random = $row["RANDOM"];
            }
        }

        $sql = "INSERT INTO empleados
        VALUES (null, $random,'$nombre','$apellidos','$correo','$ahora',null,$id_departamento,$id_puesto,'A')";

    if ($conexion->query($sql) === TRUE) {
        header("location: index.php");
        ob_flush();
    } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
    }


    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>

</html>