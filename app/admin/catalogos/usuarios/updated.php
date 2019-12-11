<?php
require_once("../../../../config/db.php");
require_once '../../../../config/config.php';
$newUser =  $_POST["user"];
$originUser = $_POST["iduser"];
$now = "";

$sqlNow = "SELECT NOW()";
$result = $conexion->query($sqlNow);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $now = $row["NOW()"];
    }
}

if(isset($_POST["newpassword"])){
    $password = $_POST["password"];
    $hashed  =  password_hash($password, 
                    PASSWORD_BCRYPT, 
                    $options);

    echo $hashed;
    $sqlUpdate = "UPDATE usuarios SET 
        id='$newUser',
        actualizacion= '$now',
        passwd = '$hashed'
        WHERE id = '$originUser'";

    if ($conexion->query($sqlUpdate) === TRUE) {
        header("location: index.php?confirm=2");
        ob_flush();
    } else {
        echo "Error updating record: " . $conexion->error;
        header("location: index.php?confirm=4");
    }

}else{
    if($newUser == $originUser){
        header("location: index.php?confirm=7");
        ob_flush();
    }else{

        $sqlUpdate = "UPDATE usuarios SET 
            id='$newUser',
            actualizacion= '$now'
            WHERE id = '$originUser'";

        if ($conexion->query($sqlUpdate) === TRUE) {
            header("location: index.php?confirm=2");
            ob_flush();
        } else {
            echo "Error updating record: " . $conexion->error;
            header("location: index.php?confirm=4");
        }
    }
}

?>