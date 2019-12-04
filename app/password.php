<?php

$email          = @$_POST['usuario'];
$token          = @$_POST['token'];
$contrasena     = @$_POST['pass'];
$contrasena1    = @$_POST['pass1'];

require '../config/db.php';
require '../config/config.php';

/*
$sql =  "SELECT EXISTS(SELECT * 
                        FROM password_resets 
                        WHERE id = (SELECT id 
                                    FROM usuarios 
                                    WHERE usuario = '{$email}')
                        AND token = '{$token}'
                        AND expira > NOW()
                        AND status = 1);";

$res = $conexion->query($sql);

if($res){
    if($res->fetch_row()[0]){
        if($contrasena != '' && $contrasena == $contrasena1){
            $sql =  "UPDATE usuarios 
                        SET passwd      = md5('{$contrasena}'),
                        actualizacion   = NOW()
                        WHERE usuario   = '{$email}';";
            $res = $conexion->query($sql);
            if($res){
                //echo 'Contraseña actualizada.';
                $sql =  "UPDATE password_resets  
                            SET status = 0
                            WHERE id   = (SELECT id 
                                            FROM usuarios 
                                            WHERE usuario = '{$email}');";
                $res = $conexion->query($sql);

                if($res){
                    header("location: logout.php");
                }
            }
        } else {
            header('location: ./cambiar.php?email='
                            .$email.'&token='
                            .$token.'&error=Error contraseñas no coinciden.');
        }
    } else {
        header("location: ./index.php?error=Error token invalido.");
    }
}
*/

if($stmt = $conexion->prepare('SELECT EXISTS(SELECT * 
                                             FROM password_resets 
                                             WHERE id = (SELECT id 
                                                         FROM usuarios 
                                                         WHERE id = (SELECT id 
                                                                     FROM empleados 
                                                                     WHERE email = ?))
                                             AND token = ?
                                             AND expira > NOW()
                                             AND status = 1)')) {
    $stmt->bind_param('ss', $email, $token);
    $res = $stmt->execute();
    $stmt->bind_result($exists);
    $stmt->fetch();
    $stmt->close();
    if($res) {
        if($exists) {
            if(strlen($contrasena)) {
                if($contrasena != '' && $contrasena == $contrasena1) {
                    if($stmt = $conexion->prepare('UPDATE usuarios 
                                                   SET passwd        = ?,
                                                       actualizacion = NOW()
                                                   WHERE id = (SELECT id
                                                               FROM empleados
                                                               WHERE email = ?)')){
                        $stmt->bind_param('ss', 
                                          password_hash($contrasena, 
                                                  PASSWORD_BCRYPT, 
                                                  $options), 
                                          $email);
                        $res = $stmt->execute();
                        $stmt->close();
                        if($res) {
                            if($stmt = $conexion->prepare('UPDATE password_resets  
                                                           SET status = 0
                                                           WHERE id   = (SELECT id 
                                                                         FROM usuarios 
                                                                         WHERE id 

                                                                         = (SELECT id
                                                                            FROM empleados
                                                                            WHERE email = ?))')) {
                                $stmt->bind_param('s', $email);
                                $res = $stmt->execute();
                                $stmt->close();
                                if($res) {
                                    $conexion->close();
                                    header('location: index.php?'
                                           .'alert=1');
                                    exit();
                                }
                            }
                        }
                    }
                } else {
                    $conexion->close();
                    header('location: ./cambiar.php?email='
                           .$email.'&token='
                           .$token.'&error=3');
                    exit();
                }
            } else {
                $conexion->close();
                header('location: ./cambiar.php?email='
                       .$email.'&token='
                       .$token
                       .'&error=4'
                       );
                exit();
            }
        } else {
            $conexion->close();
            header('location: ./index.php?error=5');
            exit();
        }
    }
    $conexion->close();
}

?>