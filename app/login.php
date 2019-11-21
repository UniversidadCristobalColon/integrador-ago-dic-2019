<?php

/*Lógica para autenticar usuarios e iniciar sesión*/
/*Si contrasena esta vacia no deja iniciar sesion por el md5(str)*/

$email      = @$_POST['email'];
$password   = md5(@$_POST['pass']);

require '../config/db.php';

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

if($stmt = $conexion->prepare('SELECT passwd
                                FROM usuarios
                                WHERE usuario = ?')) {
    $stmt->bind_param('s', $email);
    $res = $stmt->execute();
    $stmt->bind_result($passwd);
    $stmt->fetch();
    $stmt->close();
    $conexion->close();
    if($res) {
        if($password == $passwd) {
            session_start();
            $_SESSION['usuario'] = $email;
            //echo 'Bienvenido '.$email.'.';
            header("location: ./admin/catalogos/competencias/index.php");
        } else {
            //echo 'Usuario o contraseña incorrecta.';
            header("location: ./index.php?error=Usuario o contraseña incorrecto.");
        }
    }
}

?>