<?php

/*Lógica para modificar contrasena*/

echo $email          = @$_POST['usuario'];
$token          = @$_POST['token'];
$contrasena     = @$_POST['pass'];
$contrasena1    = @$_POST['pass1'];

require '../config/db.php';

echo $sql =  "SELECT EXISTS(SELECT * 
                        FROM password_resets 
                        WHERE id = (SELECT id 
                                    FROM usuarios 
                                    WHERE usuario = '{$email}')
                        AND token = '{$token}'
                        AND expira > NOW());";

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
                //echo 'Contrasena actualizada.';
                $sql =  "UPDATE password_resets  
                        SET expira = NOW() - INTERVAL 1 YEAR,
                        WHERE id   = (SELECT id 
                                        FROM usuarios 
                                        WHERE usuario = '{$email}');";
                $res = $conexion->query($sql);

                header("location: logout.php");
            } else {
                echo 'Contrasena no actualizada.';
            }
        } else {
            echo 'Error contrasenas no coinciden.';
        }
    } else {
        echo 'Error token invalido.';
    }
}
?>