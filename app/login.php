<?php

/*Lógica para autenticar usuarios e iniciar sesión*/
/*Si contrasena esta vacia no deja iniciar sesion por el md5(str)*/
$email      = @$_POST['email'];
$password   = md5(@$_POST['pass']);

include '../config/db.php';

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
    }
}

?>