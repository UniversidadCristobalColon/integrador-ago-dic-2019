<?php

/*Lógica para guardar los datos de un nuevo usuario*/

$email          = $_POST['usuario'];
$contrasena     = $_POST['pass'];
$contrasena1    = $_POST['pass1'];

include '../config/db.php';

$sql =  "SELECT EXISTS(SELECT *
                        FROM usuarios
                        WHERE usuario = '{$email}');";

$res = $conexion->query($sql);
if($res) {
    if($res->fetch_row()[0]){
        if($contrasena != '' && $contrasena == $contrasena1){
            $sql =  "UPDATE usuarios 
                        SET passwd      = md5('{$contrasena}'),
                        actualizacion   = NOW()
                        WHERE usuario   = '{$email}';";
            $res = $conexion->query($sql);
            if($res){
                //echo 'Usuario actualizado';
                header("location: logout.php");
            } else {
                echo 'Usuario no actualizado';
            }
        } else {
            echo 'Error contrasenas';
        }
    } else {
        echo 'Error email';
    }
}

?>