<?php

/*Lógica para autenticar usuarios e iniciar sesión*/
/*Si contrasena esta vacia no deja iniciar sesion por el md5(str)*/

require '../config/global.php';
echo getUrl();

require $_SERVER['DOCUMENT_ROOT'].'/'.PROYECTO.'/config/config.php';

$email = @$_POST['email'];
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

function login($email, $password) {
    require $_SERVER['DOCUMENT_ROOT'].'/'.PROYECTO.'/config/db.php';
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
        if($res) {
            if($password == $passwd) {
                session_start();
                session_regenerate_id(true);
                $cookie = session_id();
                if($stmt = $conexion->prepare('UPDATE usuarios 
                                               SET cookie = ?
                                               WHERE id = (SELECT id
                                                           FROM empleados
                                                           WHERE email = ?)')) {
                    $stmt->bind_param('ss', $cookie, $email);
                    $res = $stmt->execute();
                    $stmt->bind_result($exists);
                    $stmt->fetch();
                    $stmt->close();
                    $conexion->close();
                    if($res) {
                        return true;
                    }
                }
            } else {
                //echo 'Usuario o contraseña incorrecta.';
                return false;
            }
        }
    }
}

function logout($email) {
    require $_SERVER['DOCUMENT_ROOT'].'/'.PROYECTO.'/config/db.php';
    if($stmt = $conexion->prepare('UPDATE usuarios 
                                   SET cookie = NULL
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
            unsetCookie();
        }
    }    
}

function cookie($email, $cookie) {
    require $_SERVER['DOCUMENT_ROOT'].'/'.PROYECTO.'/config/db.php';
    if($stmt = $conexion->prepare('SELECT cookie
                                   FROM usuarios
                                   WHERE id = (SELECT id 
                                               FROM empleados 
                                               WHERE email = ?)')) {
        $stmt->bind_param('s', $email);
        $res = $stmt->execute();
        $stmt->bind_result($cookie1);
        $stmt->fetch();
        $stmt->close();
        $conexion->close();
        if($res) {
           if($cookie == $cookie1) {
                return true;
           } else {
                return false;
           }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function unsetCookie() {
    setcookie(session_name(), '', time()-3600, '/');
    session_unset();
    session_destroy();
}

function confirmar() {
    if(empty($_SESSION)) {
        session_start();
    }
    if(isset($_SESSION['usuario'])) {
        $email = $_SESSION['usuario'];
        $cookie = session_id();
        if(cookie($email, $cookie)) {
            return true;
        } else {
            unsetCookie();
            return false;
        }
    } else {
        unsetCookie();
        return false;
    }
}

if(isset($email)) {
    if(login($email, $password)) {
        if(empty($_SESSION)) {
            session_start();
        }
        $_SESSION['usuario'] = $email;
        //echo 'Bienvenido '.$email.'.';
        header('location: ./admin/catalogos/competencias/index.php');
        exit();
    } else {
        header('location: ./index.php?error=2');
        exit();
    }
}

?>
