<?php
ob_start();
require_once '../../../../config/global.php';
require_once("../../../../config/db.php");
require_once '../../../../config/config.php';
    $enable = "";
    $name = "";
    $lastname = "";
    $email = "";
    $department = "";
    $job = "";
    $submitted = false;
    $idEdited = "";

if(isset($_POST['delete'])){
    $deleteId =  $_POST["delete"];
    $status ="";

    $sql = "SELECT * from usuarios where id = $deleteId ";
            $result = $conexion->query($sql);
                                
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $status = $row["estado"];
                    if($status == "B"){
                        $sqlDelete = "UPDATE usuarios SET 
        estado = 'A'
        WHERE id = $deleteId ";

        if ($conexion->query($sqlDelete) === TRUE) {
            header("location: index.php?confirm=5");
            ob_flush();
        } else {
            echo "Error updating record: " . $conexion->error;
        }
                    }else{
                        $sqlDelete = "UPDATE usuarios SET 
                        estado = 'B'
                        WHERE id = $deleteId ";

                        if ($conexion->query($sqlDelete) === TRUE) {
                            header("location: index.php?confirm=6");
                            ob_flush();
                        } else {
                            echo "Error updating record: " . $conexion->error;
                        }
                    }
                }
            }
}

if(isset($_POST['edit'])){
    $idEdited =  $_POST['edit'];
    $submitted = true;
    $enable = "disabled";

    $sql = "SELECT usuarios.id, email, passwd, usuarios.estado ,usuarios.creacion, usuarios.actualizacion 
    FROM `usuarios` left join empleados on usuarios.id = empleados.id 
    where usuarios.id = $idEdited";
            $result = $conexion->query($sql);
                                
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $email = $row["email"];
                    $password = $row["passwd"];
                }
            }
    ?>
    <script>
        email.push("<?php echo $row["email"] ;?>");
        name.push("<?php echo $row["nombre"] ;?>");
        lastname.push("<?php echo $row["apellidos"] ;?>");
        employee.push(email);
        employee.push(name);
        employee.push(lastname);
        employees.push(employee);
        employee = [];
        email = [];
        name = [];
        lastname = [];
    </script>
    <?php

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
                    Catálogo: Usuarios
                </div>
                <div class="card-body">
                    <?php
                        if($idEdited){
                    ?>
                    <form method="POST" action="" onsubmit= "return checkedPassword()" class="formUser">
                    <?php 
                        }else{
                    ?>
                    <form method="POST" action="" onsubmit= "return checked()" class="formUser">
                    <?php
                        }
                    ?>
                    <div class="form-group">
                    <script>let employees = [];let email = [];
                                        let name = [];
                                        let lastname = [];
                                        let employee = [];</script>
                    <label for="names">Seleccione el usuario</label>
                    <?php
                    if($idEdited){
                    ?>
                    <select disabled class="form-control" name="user" id="email" >
                    <?php
                    }else{
                    ?>
                    <select class="form-control" name="user" id="email" >
                    <?php } ?>
                    <!-- <option selected disabled value="">Selecciona un empleado</option> -->
                                <?php
                                if($email || $email != ""){
                                ?>
                                    <option value="<?php echo $idEdited; ?>"><?php echo $email; ?></option>
                                <?php
                                } 
                                $sql = "SELECT email, empleados.id, nombre, apellidos FROM `empleados` where empleados.id not in (SELECT usuarios.id from usuarios)";

                                $result = $conexion->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        
                                        if($email){
                                ?>

                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["email"]; ?></option>
                                <?php
                                        }else{

                                            ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["email"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                        <script>
                                        email.push("<?php echo $row["email"] ;?>");
                                        name.push("<?php echo $row["nombre"] ;?>");
                                        lastname.push("<?php echo $row["apellidos"] ;?>");
                                        employee.push(email);
                                        employee.push(name);
                                        employee.push(lastname);
                                        employees.push(employee);
                                        employee = [];
                                        email = [];
                                        name = [];
                                        lastname = [];

                                        </script>
                                        <?php
                                    }
                                    ?>
                                    <script>
                                    </script>
                                    <?php
                                }else{
                                    echo "No hay resultados";
                                }
                                
                                ?>
                        </select>
                        </div>
                        <?php
                        if($idEdited == false){    
                        
                        ?>
                        <div class="form-group">
                        <label for="names">Nombre</label>
                        <label disabled class="form-control" type="text" name="name" id="nameSpace"></label>
                        <label for="lastnames">Apellido</label>
                        <label disabled class="form-control" type="text" name="lastname" id="lastnameSpace"></label>
                        </div>           
                        <?php
                        }if($idEdited){
                            $sql = "SELECT email, empleados.id, nombre, apellidos FROM `empleados` where empleados.id = $idEdited";
                            $result = $conexion->query($sql);
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {

                                        ?>
                                        <div class="form-group">
                                        <label for="names">Nombre</label>
                                        <label disabled class="form-control" type="text" name="name" id="nameSpace"><?php echo $row["nombre"]; ?></label>
                                        <label for="lastnames">Apellido</label>
                                        <label disabled class="form-control" type="text" name="lastname" id="lastnameSpace"><?php echo $row["apellidos"]; ?></label>
                                        </div>   
                                        <?php
                                    }
                                }

                        ?>
                             <div class="form-check">
                             <input type="checkbox" class="form-check-input" name="newpassword" id="newpassword" aria-describedby="newpasswordHelp">
                            <label class="form-check-label labeluser" for="gridCheck1">
                            Cambiar contraseña
                            </label>
                            </div>
                            <script src="newPassword.js"></script>
                        <?php
                            }else{
                        ?>

                        <div class="form-group">
                            <label for="names">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="nameHelp" value = <?php echo $name; ?>>
                        </div>
                        <div class="form-group">
                            <label for="names">Repite Contraseña</label>
                            <input type="password" class="form-control" name="rpassword" id="rpassword" aria-describedby="nameHelp" value = <?php echo $name; ?>>
                        </div>
                        <script src="check.js"></script>
                                <?php
                            }
                            ?>

                        <div class="form-group">
                        <?php
                            if($submitted){
                                ?>
                                <input type="text" hidden name="idEdited" value = '<?php echo $idEdited ?>'>
                                <?php
                        ?>
                        <button name="update" type="submit" class="btn btn-primary " value = "<?php echo $idEdited; ?>" >Actualizar</button>
                        <button name="back" id="back" type="button" class="btn btn-secondary">Regresar</button>
                        <?php
                            }else{
                        ?>
                        <button name="insert" type="submit" class="btn btn-primary ">Crear</button>
                        <button name="back" id="back" type="button" class="btn btn-secondary">Regresar</button>
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


<?php
    if(isset($_POST["update"])){

        $now = "";
        $lastId = $_POST["idEdited"];
        $iduser = $_POST["user"];

        if($_POST["newpassword"] == "on"){
            $password = $_POST["password"];
            $hashed  =  password_hash($password, 
                            PASSWORD_BCRYPT, 
                            $options);
            
            $sqlNow = "SELECT NOW()";
            $result = $conexion->query($sqlNow);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $now = $row["NOW()"];
                }
            }
    
                $sqlUpdate = "UPDATE usuarios SET 
                id=$iduser,
                actualizacion= '$now',
                passwd = '$hashed'
                WHERE id = $lastId";
    
            if ($conexion->query($sqlUpdate) === TRUE) {
                ?>
                    <script>
                        <form action="index.php" method="post" on >
                        
                        </form>
                    </script>
                <?php
                header("location: index.php?confirm=2");
                ob_flush();
            } else {
                echo "Error updating record: " . $conexion->error;
                header("location: index.php?confirm=4");
            }

        }else{
        $sqlNow = "SELECT NOW()";
        $result = $conexion->query($sqlNow);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $now = $row["NOW()"];
            }
        }

            $sqlUpdate = "UPDATE usuarios SET 
            id=$iduser,
            actualizacion= '$now'
            WHERE id = $iduser";

        if ($conexion->query($sqlUpdate) === TRUE) {
            header("location: index.php?confirm=2");
            ob_flush();
        } else {
            echo "Error updating record: " . $conexion->error;
            header("location: index.php?confirm=3");
            ob_flush();
        }
    }
    }
    if(isset($_POST["insert"])){

        $password = $_POST["password"];
        $id = $_POST["user"];

        $passwordHashed  =  password_hash($password, 
                            PASSWORD_BCRYPT, 
                            $options);

        $sqlNow = "SELECT NOW()";
        $result = $conexion->query($sqlNow);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $ahora = $row["NOW()"];
            }
        }

        $sql = "INSERT INTO usuarios
        VALUES ($id, '$passwordHashed',null,'A','$ahora',null)";

    if ($conexion->query($sql) === TRUE) {
        
        header("location: index.php?confirm=1");
        ob_flush();
    } else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
    header("location: index.php?confirm=3");
    ob_flush();
    }


    }

?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
document.getElementById("back").addEventListener("click",goBack);

function goBack(){
    console.log("ls");
    window.location.href = "index.php";
}
</script>
<script src="users.js"></script>
</body>

</html>