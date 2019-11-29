<?php

/*Lógica para autenticar usuarios e iniciar sesión*/
/*Si contrasena esta vacia no deja iniciar sesion por el md5(str)*/

require '../config/config.php';

echo $email = @$_POST['email'];
$password   = password_hash(@$_POST['pass'], 
                            PASSWORD_BCRYPT, 
                            $options);

/*
$sql =  "SELECT passwd
            FROM usuarios
            WHERE usuario = '{$email}';";

$res = $conexion->query($sql);
if($res) {
    $password1 = $res->fetch_assoc()['passwd'];

    if($password == $password1) {
        session_start();
        $_SESSION['usuario'] = $email;
        echo 'Bienvenido '.$email.'.';
        header("location: ./admin/catalogos/competencias/index.php");
    } else {
        echo 'Usuario o contraseña incorrecta.';
        header("location: ./index.php?error=Usuario o contraseña incorrecto.");
    }
}
*/

function login($email, $password, $redirect, $error) {
    require '../config/db.php';
    if($stmt = $conexion->prepare('SELECT passwd
                                   FROM usuarios
                                   WHERE id = (SELECT id 
                                               FROM empleados 
                                               WHERE email = ?)')) {
        $stmt->bind_param('s', $email);
        $res = $stmt->execute();
        $stmt->bind_result($passwd);
        $stmt->fetch();
        $stmt->close();
        $conexion->close();
        if($res) {
            if($password == $passwd) {
                session_start();
                session_regenerate_id(true);
                $_SESSION['usuario'] = $email;
                //echo 'Bienvenido '.$email.'.';
                header('location: '.$redirect);
            } else {
                //echo 'Usuario o contraseña incorrecta.';
                header('location: '.$error);
            }
        }
    }
}

if(isset($email)) {
    login($email, 
          $password, 
          './admin/catalogos/competencias/index.php',
          './index.php?error=2');
}

?>